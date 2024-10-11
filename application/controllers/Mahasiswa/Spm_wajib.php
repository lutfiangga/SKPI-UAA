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
			// from tabel auth
			'nama' => $this->session->userdata('nama'),
			'role' => $role,
			// from tabel user
			'id_user' => $id,
			'foto' => $foto,
			'read' => $read,
			'kategori' => $this->M_kategori_spm_wajib->GetAll(),
		);
		$this->template->load('layout/components/layout', $this->view . 'read', $data);
	}

	public function save()
	{
		cek_csrf();

		$nim = $this->session->userdata('id_user');
		// Konfigurasi upload file
		$config['upload_path'] = './assets/static/spm/img/syarat_wajib/';
		$config['allowed_types'] = 'jpg|jpeg|png|wepb|JPG|PNG|JPEG|WEPB';
		$config['max_size'] = 6000; // KB
		$config['file_name'] = $nim . '_' . time();
		// Memuat library upload dengan konfigurasi
		$this->load->library('upload', $config);

		$file = '';
		if ($this->upload->do_upload('file')) {
			// File berhasil diupload
			$file_data = $this->upload->data();
			$file = $file_data['file_name'];
		} else {
			// Jika file tidak diupload, gunakan gambar saat ini
			$file = $this->input->post('file_current');
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
			'file' => $file,
		);
		$this->M_syarat_wajib->save($data);
		redirect($this->redirect, 'refresh');
	}

	public function update()
	{
		cek_csrf();
		// get usser session
		$id = $this->input->post('id_syarat_wajib');
		$nim = $this->session->userdata('id_user');
		$spm = $this->M_syarat_wajib->edit($id);
		// Konfigurasi upload file
		$config['upload_path'] = './assets/static/spm/img/syarat_wajib/';
		$config['allowed_types'] = 'jpg|jpeg|png|wepb|JPG|PNG|JPEG|WEPB';
		$config['max_size'] = 6000; // KB
		$config['file_name'] = $nim . '_' . time();

		$this->load->library('upload', $config); // Load library dan config

		if ($this->upload->do_upload('file')) {
			$file_data = $this->upload->data();
			$file = $file_data['file_name'];

			// Hapus file lama
			if (!empty($spm['file']) && file_exists('./assets/static/spm/img/syarat_wajib/' . $spm['file'])) {
				unlink('./assets/static/spm/img/syarat_wajib/' . $spm['file']);
			}
		}

		$data = array(
			'id_syarat_wajib_kategori' => $this->input->post('id_syarat_wajib_kategori'),
			'url' => $this->input->post('url'),
			'file' => $file,
		);
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
