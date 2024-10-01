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
		if ($this->session->userdata('id_user')) {
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
			'email',
			'Email',
			'required|valid_email',
			array('required' => 'Email wajib diisi.', 'valid_email' => 'Format email tidak valid.')
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
			$email = $this->input->post('email');
			$pwd = $this->input->post('password');

			// Cek login
			$data = $this->M_auth->CekLogin('email', $email);

			if ($data) {
				if (password_verify($pwd, $data['password'])) {
					// Set session data berdasarkan peran pengguna
					$array = array(
						'id_user' => $data['id_user'],
						'nama' => $data['nama'],
						'role' => $data['role'],
						'img_user' => $data['img_user'],
						'Admin' => strtolower($data['role']) == 'admin' ? 1 : 0,
						'Dosen' => strtolower($data['role']) == 'dosen' ? 1 : 0,
						'Mahasiswa' => strtolower($data['role']) == 'mahasiswa' ? 1 : 0,
						'Akademik' => strtolower($data['role']) == 'akademik' ? 1 : 0,
						'Kemahasiswaan' => strtolower($data['role']) == 'kemahasiswaan' ? 1 : 0,
					);
					$this->session->set_userdata($array);
					$this->session->set_flashdata('success', 'Anda berhasil login!');

					// Redirect berdasarkan role
					switch ($data['role']) {
						case 'admin':
							redirect('Admin/Dashboard', 'refresh');
							break;
						case 'akademik':
							redirect('Akademik/Dashboard', 'refresh');
							break;
						case 'mahasiswa':
							redirect('Mahasiswa/Dashboard', 'refresh');
							break;
						case 'dosen':
							redirect('Dosen/Dashboard', 'refresh');
							break;
						case 'kemahasiswaan':
							redirect('Kemahasiswaan/Dashboard', 'refresh');
							break;
					}
				} else {
					// Jika password salah
					$this->session->set_flashdata('auth_error', 'Password salah!');
					redirect('auth', 'refresh');
				}
			} else {
				// Jika email tidak ditemukan
				$this->session->set_flashdata('auth_error', 'Email tidak ditemukan!');
				redirect('auth', 'refresh');
			}
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
