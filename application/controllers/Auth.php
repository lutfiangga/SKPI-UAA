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
		// Cek apakah user sudah login dan jika iya, hancurkan session
		if ($this->session->userdata('id_akun')) {
			$this->session->sess_destroy();
			redirect('auth/logout');
		}
		$data = array(
			'judul' => "Login",
			'login' => ''
		);
		$this->template->load('auth/layout/layout', $this->view . 'login', $data);
	}

	public function login()
	{
		// Aturan validasi
		$this->form_validation->set_rules(
			'username',
			'Username',
			'required',
			array('required' => 'Username wajib diisi.')
		);
		$this->form_validation->set_rules(
			'password',
			'Password',
			'required',
			array('required' => 'Password wajib diisi.')
		);
		// Jalankan validasi
		if ($this->form_validation->run() == FALSE) {
			// Jika validasi gagal (input kosong atau format salah)
			$this->session->set_flashdata('validation_error', validation_errors());
			redirect('auth', 'refresh');
		} else {
			cek_csrf();
			$username = $this->security->xss_clean($this->input->post('username'));
			$pwd = $this->security->xss_clean($this->input->post('password'));

			// Cek login
			$data = $this->M_auth->CekLogin('username', $username);
			// Jika password di database kosong, gunakan id_user sebagai password
			if (empty($data['password'])) {
				if ($pwd === $data['id_user']) {
					// Set session data berdasarkan peran pengguna
					$this->set_session($data);
					$this->session->set_flashdata('success', 'Anda berhasil login!');

					// echo $this->db->last_query();
					// echo 'Role: ' . $data['role'];
					$this->role_redirect($data['role']); // Redirect berdasarkan role
				} else {
					$this->session->set_flashdata('auth_error', 'Password salah!');
					// echo $this->db->last_query();
					// echo 'Role: ' . $data['role'];
					// echo 'password: ' . $pwd;
					redirect('auth', 'refresh');
				}
			} else if ($data) {
				if (password_verify($pwd, $data['password'])) {
					// Set session data berdasarkan peran pengguna
					$this->set_session($data);
					$this->session->set_flashdata('success', 'Anda berhasil login!');
					// echo $this->db->last_query();
					// echo 'Role: ' . $data['role'];
					$this->role_redirect($data['role']); // Redirect berdasarkan role
				} else {
					// Jika password salah
					$this->session->set_flashdata('auth_error', 'Password salah!');
					// echo $this->db->last_query();
					// echo 'Role: ' . $data['role'];
					redirect('auth', 'refresh');
				}
			} else {
				// Jika email tidak ditemukan
				$this->session->set_flashdata('auth_error', 'Email tidak ditemukan!');
				// echo $this->db->last_query();
				// echo 'Role: ' . $data['role'];
				redirect('auth', 'refresh');
			}
		}
	}

	// Helper untuk set session data
	private function set_session($data)
	{
		$array = array(
			'id_user' => $data['id_user'],
			'nama' => $data['nama'],
			'role' => $data['role'],
			'img_user' => $data['img_user'],
			'Admin' => strtolower($data['role']) == 'admin' ? 1 : 0,
			'Kemahasiswaan' => strtolower($data['role']) == 'kemahasiswaan' ? 1 : 0,
			'Admisi' => strtolower($data['role']) == 'admisi' ? 1 : 0,
			'Etiquette' => strtolower($data['role']) == 'etiquette' ? 1 : 0,
			'Mahasiswa' => strtolower($data['role']) == 'mahasiswa' ? 1 : 0,
			'Prodi' => strtolower($data['role']) == 'prodi' ? 1 : 0,
		);

		$this->session->set_userdata($array);
	}

	// Helper untuk redirect berdasarkan role
	private function role_redirect($role)
	{

		switch ($role) {
			case 'admin':
				redirect('Admin/Dashboard', 'refresh');
				break;
			case 'admisi':
				redirect('Admisi/Dashboard', 'refresh');
				break;
			case 'mahasiswa':
				redirect('Mahasiswa/Dashboard', 'refresh');
				break;
			case 'etiquette':
				redirect('Etiquette/Dashboard', 'refresh');
				break;
			case 'kemahasiswaan':
				redirect('Kemahasiswaan/Dashboard', 'refresh');
				break;
			case 'prodi':
				redirect('Prodi/Dashboard', 'refresh');
				break;
			default:
				redirect('auth', 'refresh');
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
