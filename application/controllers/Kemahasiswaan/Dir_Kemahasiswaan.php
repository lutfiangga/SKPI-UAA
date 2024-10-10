<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Dir_Kemahasiswaan extends CI_Controller
{
	private $view = "kemahasiswaan/pages/dir_kemahasiswaan/";
	private $redirect = "Kemahasiswaan/Dir_Kemahasiswaan";
	public function __construct()
	{
		parent::__construct();
		//protected routes
		checkRole('Kemahasiswaan');
		//load model
		$this->load->model('M_dirKemahasiswaan');
	}

	public function index()
	{
		$id = $this->session->userdata('id_user');
		$role = $this->session->userdata('role');
		$img_user = $this->session->userdata('img_user');
		$foto = $img_user ? 'assets/static/img/photos/' . strtolower($role) . '/' . $img_user : 'assets/static/img/user.png';
		$data = array(
			'judul' => "DATA DIREKTUR KEMAHASISWAAN",
			'sub' => "Data Direktur Kemahasiswaan",
			'active_menu' => 'dir_kemahasiswaan',
			'id_user' => $id,
			// from tabel user
			'nama' => $this->session->userdata('nama'),
			'foto' => $foto,
			'role' => $role,
			'direktur' => $this->M_dirKemahasiswaan->GetDirektur()->row(),
		);

		$this->template->load('layout/components/layout', $this->view . 'read', $data);
	}

	public function change_image($id)
	{
		cek_csrf();
		// Konfigurasi upload file
		$config['upload_path'] = './assets/static/img/photos/kemahasiswaan/';
		$config['allowed_types'] = 'jpg|jpeg|png|wepb|JPG|PNG|JPEG|WEPB';
		$config['max_size'] = 6000; // KB
		$config['file_name'] = 'direktur_kemahasiswaan_' . time();

		// Memuat library upload dengan konfigurasi
		$this->load->library('upload', $config);

		// Ambil data user dari database berdasarkan ID
		$user = $this->M_dirKemahasiswaan->GetDirektur()->row();

		// Menyimpan nama gambar lama
		$old_img = $user->foto; // Pastikan foto ada di tabel

		$foto = '';
		if ($this->upload->do_upload('foto')) {
			// File berhasil diupload
			$foto_data = $this->upload->data();
			$foto = $foto_data['file_name'];

			// Hapus gambar lama dari server jika ada
			if ($old_img) {
				$old_file_path = './assets/static/img/photos/kemahasiswaan/' . $old_img;
				if (file_exists($old_file_path)) {
					unlink($old_file_path); // Hapus file lama
				}
			}
		} else {
			// Jika file tidak diupload, gunakan gambar saat ini
			$foto = $this->input->post('foto_current');
		}

		// Update data user dengan gambar yang baru
		$data = array(
			'foto' => $foto,
		);
		$this->M_dirKemahasiswaan->update($id, $data);

		// Redirect ke halaman tertentu setelah proses selesai
		redirect($this->redirect, 'refresh');
	}
	public function change_signature($id)
	{
		cek_csrf();

		// Konfigurasi upload file
		$config['upload_path'] = './assets/static/img/photos/kemahasiswaan/signature/';
		$config['allowed_types'] = 'png|PNG';
		$config['max_size'] = 6000; // KB
		$config['file_name'] = 'signature_direktur_kemahasiswaan_' . time();

		// Memuat library upload dengan konfigurasi
		$this->load->library('upload', $config);

		// Ambil data user dari database berdasarkan ID
		$user = $this->M_dirKemahasiswaan->GetDirektur()->row();

		// Menyimpan nama gambar lama
		$old_signature = $user->signature; // Pastikan signature ada di tabel

		$signature = '';
		if ($this->upload->do_upload('signature')) {
			// File berhasil diupload
			$signature_data = $this->upload->data();
			$signature = $signature_data['file_name'];

			// Hapus gambar lama dari server jika ada
			if ($old_signature) {
				$old_file_path = './assets/static/img/photos/kemahasiswaan/signature/' . $old_signature;
				if (file_exists($old_file_path)) {
					unlink($old_file_path); // Hapus file lama
				}
			}
		} else {
			// Jika file tidak diupload, gunakan gambar saat ini
			$signature = $this->input->post('signature_current');
		}

		// Update data user dengan gambar yang baru
		$data = array(
			'signature' => $signature,
		);
		$this->M_dirKemahasiswaan->update($id, $data);

		// Redirect ke halaman tertentu setelah proses selesai
		redirect($this->redirect, 'refresh');
	}
	public function change_stamp($id)
	{
		cek_csrf();

		// Konfigurasi upload file
		$config['upload_path'] = './assets/static/img/photos/kemahasiswaan/stamp/';
		$config['allowed_types'] = 'png|PNG';
		$config['max_size'] = 6000; // KB
		$config['file_name'] = 'stamp_direktur_kemahasiswaan_' . time();

		// Memuat library upload dengan konfigurasi
		$this->load->library('upload', $config);

		// Ambil data user dari database berdasarkan ID
		$user = $this->M_dirKemahasiswaan->GetDirektur()->row();

		// Menyimpan nama gambar lama
		$old_stamp = $user->stamp; // Pastikan stamp ada di tabel

		$stamp = '';
		if ($this->upload->do_upload('stamp')) {
			// File berhasil diupload
			$stamp_data = $this->upload->data();
			$stamp = $stamp_data['file_name'];

			// Hapus gambar lama dari server jika ada
			if ($old_stamp) {
				$old_file_path = './assets/static/img/photos/kemahasiswaan/stamp/' . $old_stamp;
				if (file_exists($old_file_path)) {
					unlink($old_file_path); // Hapus file lama
				}
			}
		} else {
			// Jika file tidak diupload, gunakan gambar saat ini
			$stamp = $this->input->post('stamp_current');
		}

		// Update data user dengan gambar yang baru
		$data = array(
			'stamp' => $stamp,
		);
		$this->M_dirKemahasiswaan->update($id, $data);

		// Redirect ke halaman tertentu setelah proses selesai
		redirect($this->redirect, 'refresh');
	}
}
