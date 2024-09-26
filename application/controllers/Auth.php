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
		$user = $this->input->post('email');
		$pwd = $this->input->post('password');  // plain text password input by the user
		$data = $this->M_auth->CekLogin('user', 'email', $user);

		// Check if the user exists and the password is correct
		if ($data && password_verify($pwd, $data['password']) && $data['email'] == $user) {
			if ($data['role'] == 'Admin') { // Admin role
				$array = array(
					'id_user' => $data['id_user'],
					'nama' => $data['nama'],
					'email' => $data['email'],
					'img_user' => $data['img_user'],
					'role' => $data['role'],
					'IsAdmin' => 1
				);
				$this->session->set_userdata($array);
				$this->session->set_flashdata('success', 'Anda berhasil login!');
				redirect('Admin/Home', 'refresh');
			} else if ($data['role'] == 'Staff') { // Staff role
				$array = array(
					'id_user' => $data['id_user'],
					'nama' => $data['nama'],
					'email' => $data['email'],
					'img_user' => $data['img_user'],
					'role' => $data['role'],
					'IsStaff' => 1
				);
				$this->session->set_userdata($array);
				$this->session->set_flashdata('success', 'Anda berhasil login!');
				redirect('Staff/Home', 'refresh');
			}
		} else { // If login fails
			$this->session->set_flashdata('error', 'Username atau password salah!');
			redirect($this->redirect, 'refresh');
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
