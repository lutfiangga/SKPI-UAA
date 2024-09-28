<?php
defined('BASEPATH') or exit('No direct script access allowed');
class Auth extends CI_Controller
{
	private $redirect = "Auth";
	private $view = "auth/pages/";
	public function __construct()
	{
		parent::__construct();
		//Load model
		$this->load->model('M_auth');
	}

	public function index()
	{
		$this->session->sess_destroy();
		$data = array(
			'judul' => "Login",
			'login' => ''
		);
		$this->template->load('auth/layout/layout', $this->view . 'login', $data);
	}

	public function login()
	{
		$email = $this->input->post('email');
		$pwd = $this->input->post('password');

		// Ceklogin
		$data = $this->M_auth->CekLogin('email', $email);

		if ($data) {
			// Periksa apakah password verify berhasil
			if (password_verify($pwd, $data['password'])) {
				// Set session data berdasarkan peran pengguna
				$array = array(
					'id_user' => $data['id_user'],
					'nama' => $data['nama'],
					'email' => $data['email'],
					'role' => $data['role'],
					'Admin' => strtolower($data['role']) == 'admin' ? 1 : 0,
					'Dosen' => strtolower($data['role']) == 'dosen' ? 1 : 0,
					'Mahasiswa' => strtolower($data['role']) == 'mahasiswa' ? 1 : 0,
					'Akademik' => strtolower($data['role']) == 'akademik' ? 1 : 0,
					'Kemahasiswaan' => strtolower($data['role']) == 'kemahasiswaan' ? 1 : 0,
				);

				// Set session dan cek apakah berhasil
				$this->session->set_userdata($array);

				// Flashdata untuk notifikasi
				$this->session->set_flashdata('success', 'Anda berhasil login!');

				// Redirect berdasarkan role
				if ($data['role'] == 'admin') {
					redirect('Admin/Dashboard', 'refresh');
				} else if ($data['role'] == 'akademik') {
					redirect('Akademik/Dashboard', 'refresh');
				} else if ($data['role'] == 'mahasiswa') {
					redirect('Mahasiswa/Dashboard', 'refresh');
				} else if ($data['role'] == 'dosen') {
					redirect('Dosen/Dashboard', 'refresh');
				} else if ($data['role'] == 'kemahasiswaaan') {
					redirect('Kemahasiswaan/Dashboard', 'refresh');
				}
			} else {
				// Jika password tidak cocok
				echo "Password salah!<br>";
				$this->session->set_flashdata('error', 'Username atau password salah!');
				redirect('auth/login', 'refresh');
			}
		} else {
			// Jika data user tidak ditemukan
			echo "Pengguna tidak ditemukan!<br>";
			$this->session->set_flashdata('error', 'Username atau password tidak ditemukan!');
			redirect('auth/login', 'refresh');
		}
	}

	public function logout()
	{
		// Hancurkan sesi
		$this->session->sess_destroy();

		// Set pesan alert menggunakan flashdata
		$this->session->set_flashdata('logout_message', 'Anda telah keluar!');

		// Redirect ke halaman Index
		redirect($this->redirect, 'refresh');
	}
}
