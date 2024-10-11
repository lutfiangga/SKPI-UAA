<?php
defined('BASEPATH') or exit('No direct script access allowed');
class Spm_wajib extends CI_Controller
{
	private $view = "mahasiswa/pages/spm_wajib/";
	private $redirect = "Mahasiswa/Spm_wajib";
	public function __construct()
	{
		parent::__construct();
		//protected routes
		checkRole('Mahasiswa');
		$this->load->model(array('M_syarat_wajib', 'M_kategori_spm_wajib'));
	}

	function index()
	{
		$role = $this->session->userdata('role');
		$img_user = $this->session->userdata('img_user');
		$foto = $img_user ? 'assets/static/img/photos/' . $role . '/' . $img_user : 'assets/static/img/user.png';
		$id = $this->session->userdata('id_user');
		$read = $this->M_syarat_wajib->GetByNim($id);
		$data = array(
			'judul' => "SPM WAJIB",
			'sub' => "SPM Wajib",
			'active_menu' => 'spm_wajib',
			'nama' => $this->session->userdata('nama'),
			'role' => $role,
			'id_user' => $id,
			'foto' => $foto,
			'read' => $read,
			'kategori' => $this->M_kategori_spm_wajib->GetKategori(),
		);
		$this->template->load('layout/components/layout', $this->view . 'read', $data);
	}

	public function save()
	{
		cek_csrf();

		$nim = $this->session->userdata('id_user');

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

		$last_id = $this->M_syarat_wajib->getLastId(); // get last id
		// jika id tidak ditemukan, id diisi 1
		$id = ($last_id == null) ? 1 : $last_id + 1;

		$data = array(
			'id_syarat_wajib' => $id,
			'nim' => $nim,
			'id_syarat_wajib_kategori' => $this->input->post('id_syarat_wajib_kategori'),
			'url' => $this->input->post('url'),
			'status' => 'pending',
			'tanggal' => date('Y-m-d'),
		);

		if ($file !== null) {
			$data['file'] = $file;
		}

		$this->M_syarat_wajib->save($data);
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

		// Ambil id_syarat_wajib_kategori
		$id_kategori = $this->input->post('id_syarat_wajib_kategori');
		$kategori = $this->M_kategori_spm_wajib->getId($id_kategori);

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
			'id_syarat_wajib_kategori' => $id_kategori,
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

		redirect($this->redirect, 'refresh');
	}
}
