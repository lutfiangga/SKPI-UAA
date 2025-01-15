<?php
defined('BASEPATH') or exit('No direct script access allowed');
class Syarat_wajib extends CI_Controller
{
	private $view = "mahasiswa/pages/syarat_wajib/";
	private $redirect = "Mahasiswa/Syarat_wajib";
	public function __construct()
	{
		parent::__construct();
		//protected routes
		checkRole('Mahasiswa');
		$this->load->model(array('M_syarat_wajib', 'M_kategori_syarat_wajib', 'M_profile'));
	}

	function index()
	{
		
		$img_user = $this->session->userdata('img_user');
		$foto = $img_user && file_exists('assets/static/img/photos/mahasiswa/' . $img_user) ? 'assets/static/img/photos/mahasiswa/' . $img_user : 'assets/static/img/user.png';
		$id = $this->session->userdata('id_akun');
		$data = array(
			'judul' => "SYARAT WAJIB",
			'sub' => "Syarat Wajib",
			'active_menu' => 'syarat_wajib',
			'nama' => $this->session->userdata('nama'),
			'role' => $this->session->userdata('role'),
			'id_user' => $this->session->userdata('id_user'),
			'id_akun' => $id,
			'foto' => $foto,
			'read' => $this->M_syarat_wajib->GetSyaratWajibMhs($id),
			'kategori' => $this->M_kategori_syarat_wajib->GetKategori(),
		);
		$this->template->load('layout/components/layout', $this->view . 'read', $data);
	}

	public function save()
	{
		cek_csrf();

		$nim = $this->session->userdata('id_user');
		$id_akun = $this->session->userdata('id_akun');

		// Konfigurasi upload file
		$config['upload_path'] = './assets/static/spm/img/syarat_wajib/';
		$config['allowed_types'] = 'jpg|jpeg|png|webp|JPG|PNG|JPEG|WEBP';
		$config['max_size'] = 6000; // KB
		$config['file_name'] = $nim . '_' . time();

		$this->load->library('upload', $config);

		$file = null; // default value file

		if ($this->upload->do_upload('file')) {
			$file_data = $this->upload->data();
			$file = $file_data['file_name'];
		}

		$data = array(
			'id_syarat_wajib' => generate_uuid_v7(),
			'id_akun' => $id_akun,
			'id_kategori_syarat_wajib' => $this->input->post('id_kategori_syarat_wajib'),
			'url' => $this->input->post('url'),
			'status' => 'pending',
			'tanggal' => date('Y-m-d'),
		);

		if ($file !== null) {
			$data['file'] = $file;
		}

		$this->M_syarat_wajib->save($data);
		$this->session->set_flashdata('create_success', 'Data berhasil ditambahkan!');
		redirect($this->redirect, 'refresh');
	}

	public function update()
	{
		cek_csrf();

		// Get user session
		$id = $this->input->post('id_syarat_wajib');
		$nim = $this->session->userdata('id_user');
		$spm = $this->M_syarat_wajib->edit($id);

		// Konfigurasi upload file
		$config['upload_path'] = './assets/static/spm/img/syarat_wajib/';
		$config['allowed_types'] = 'jpg|jpeg|png|webp|JPG|PNG|JPEG|WEBP';
		$config['max_size'] = 6000; // KB
		$config['file_name'] = $nim . '_' . time();

		$this->load->library('upload', $config); // Load library dan config

		// Ambil id_kategori_syarat_wajib
		$id_kategori = $this->input->post('id_kategori_syarat_wajib');
		$kategori = $this->M_kategori_syarat_wajib->getId($id_kategori);

		$file = null; // default value

		if ($this->upload->do_upload('file')) {
			$file_data = $this->upload->data();
			$file = $file_data['file_name'];
			// hapus file lama
			if (!empty($kategori) && $kategori['type'] == 'file') {
				if (!empty($spm['file']) && file_exists('./assets/static/spm/img/syarat_wajib/' . $spm['file'])) {
					unlink('./assets/static/spm/img/syarat_wajib/' . $spm['file']);
				}
			}
		} else {
			if (!empty($kategori) && $kategori['type'] == 'file') {
				$file = $spm['file'];
			}
		}

		$data = array(
			'id_kategori_syarat_wajib' => $id_kategori,
			'url' => $this->input->post('url'),
		);

		if ($file !== null) {
			$data['file'] = $file;
		} else {
			// Jika tipe kategori bukan file, periksa apakah ada file
			if (!empty($kategori) && $kategori['type'] !== 'file') {
				if (!empty($spm['file']) && file_exists('./assets/static/spm/img/syarat_wajib/' . $spm['file'])) {
					unlink('./assets/static/spm/img/syarat_wajib/' . $spm['file']);
				}
				$data['file'] = null; // Set file menjadi null
			}
		}

		$this->M_syarat_wajib->update($id, $data);
		$this->session->set_flashdata('update_success', 'Data berhasil diupdate!');
		redirect($this->redirect, 'refresh');
	}

	public function delete()
	{
		cek_csrf();
		$id = $this->input->post('id_syarat_wajib');

		$bukti = $this->M_syarat_wajib->edit($id); // get data by id
		if ($bukti) {
			$file = $bukti['file'];

			// Hapus data dari database
			$data = array('id_syarat_wajib' => $id);
			$this->M_syarat_wajib->delete($data);

			// Hapus file dari server
			if ($file) {
				$filePath = './assets/static/spm/img/syarat_wajib/' . $file;
				if (file_exists($filePath)) {
					unlink($filePath);
				}
			}
		}
		$this->session->set_flashdata('delete_success', 'Data berhasil dihapus!');
		redirect($this->redirect, 'refresh');
	}

	public function print()
	{
		
		$img_user = $this->session->userdata('img_user');
		$foto = $img_user && file_exists('assets/static/img/photos/mahasiswa/' . $img_user) ? 'assets/static/img/photos/mahasiswa/' . $img_user : 'assets/static/img/user.png';
		$id = $this->session->userdata('id_user');
		$data = array(
			'judul' => "SYARAT WAJIB",
			'sub' => "Syarat Wajib",
			'active_menu' => 'syarat_wajib',
			'nama' => $this->session->userdata('nama'),
			'role' => $this->session->userdata('role'),
			'id_user' => $id,
			'foto' => $foto,
			'SpmPoin' => $this->M_syarat_wajib->getPoinByUser($id),
			'mhs' => $this->M_profile->getById($id),
			'direktur' => $this->M_dirAdmisi->GetDirektur(),
			'spm' => $this->M_syarat_wajib->GetByNim($id),
			'syaratSkor' => $this->M_syarat_wajib->getPoinByUser($id),
		);
		$this->template->load('layout/components/layout_export', $this->view . 'print', $data);
	}

	public function export_pdf()
	{
		
		$img_user = $this->session->userdata('img_user');
		$foto = $img_user && file_exists('assets/static/img/photos/mahasiswa/' . $img_user) ? 'assets/static/img/photos/mahasiswa/' . $img_user : 'assets/static/img/user.png';
		$id = $this->session->userdata('id_akun');
		$id_user = $this->session->userdata('id_user');
		$data = array(
			'judul' => "SYARAT WAJIB",
			'sub' => "Syarat Wajib",
			'active_menu' => 'syarat_wajib',
			'nama' => $this->session->userdata('nama'),
			'role' => $this->session->userdata('role'),
			'id_user' => $id_user,
			'foto' => $foto,
			'SpmPoin' => $this->M_syarat_wajib->getPoinByUser($id),
			'mhs' => $this->M_profile->getById($id),
			'direktur' => $this->M_dirAdmisi->GetDirektur(),
			'spm' => $this->M_syarat_wajib->GetByNim($id),
			'syaratSkor' => $this->M_syarat_wajib->getPoinByUser($id),
		);
		$this->template->load('layout/components/layout_export', $this->view . 'pdf', $data);
	}
}
