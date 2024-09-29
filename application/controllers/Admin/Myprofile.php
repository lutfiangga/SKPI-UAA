<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Myprofile extends CI_Controller
{
	private $view = "Admin/pages/profile/";
	private $redirect = "Admin/Myprofile/";

	public function __construct()
	{
		parent::__construct();
		//protected routes
		checkRole('Admin');
		//load model
		$this->load->model('M_profile');
		$this->load->model('M_user');
		$this->load->model('M_auth');
	}

	public function index()
	{
		$id = $this->session->userdata('id_user');
		$data = array(
			//'read' variabel yang akan dipanggil pada view read.php
			'judul' => "MY PROFILE",
			'sub' => "Profile",
			'active_menu' => 'myprofile',
			'id_user' => $id,
			// from tabel auth
			'nama' => $this->session->userdata('nama'),
			'email' => $this->session->userdata('email'),
			'role' => $this->session->userdata('role'),
			// from tabel user
			'alamat' => $this->session->userdata('alamat'),
			'foto' => 'assets/img/photos/' . $this->session->userdata('img_user'),
			'user' => $this->M_profile->getById($id),
		);

		$this->template->load('layout/components/layout', $this->view . 'read', $data);
	}

	public function edit()
	{
		$id = $this->session->userdata('id_user');
		$data = array(
			//'read' variabel yang akan dipanggil pada view read.php
			'judul' => "MY PROFILE",
			'sub' => "My Profile",
			'active_menu' => 'myprofile',
			'id_user' => $id,
			'username' => $this->session->userdata('username'),
			'password' => $this->session->userdata('password'),
			'nama' => $this->session->userdata('nama'),
			'foto' => 'assets/img/photos/' . $this->session->userdata('img_user'),
			'user' => $this->M_profile->getById($id),
			'edit' => $this->M_profile->edit($id),
		);

		$this->template->load('layout/template', $this->view . 'edit', $data);
	}

	public function update($id)
	{
		$config['upload_path'] = './assets/img/photos/';
		$config['allowed_types'] = 'jpg|jpeg|png';
		$config['max_size'] = 20000; // KB
		$config['file_name'] = 'user_' . time(); // Unique filename

		$this->load->library('upload', $config);

		$img_user = '';
		if ($this->upload->do_upload('img_user')) {
			$img_user_data = $this->upload->data();
			$img_user = $img_user_data['file_name'];
		} else {
			// Ambil dari input hidden atau dari data saat ini jika file tidak diunggah
			$img_user = $this->input->post('img_user_current');
		}

		$this->form_validation->set_rules('username', 'Username', 'required');

		// Ambil username dari database untuk memeriksa apakah ada perubahan
		$user = $this->M_user->getId($id);
		$username_db = $user->username;

		// Jika username tidak berubah, atur aturan validasi untuk mengabaikan is_unique
		if ($this->input->post('username') == $username_db) {
			$this->form_validation->set_rules('username', 'Username', 'required');
		} else {
			$this->form_validation->set_rules('username', 'Username', 'required|is_unique[user.username]');
		}

		if ($this->form_validation->run() == FALSE) {
			// Validasi gagal, simpan pesan error ke flashdata
			$this->session->set_flashdata('username_error', validation_errors());
			redirect($this->redirect . '/edit/' . $id); // Redirect kembali ke halaman edit
		} else {
			// Validasi berhasil, simpan data pengguna baru
			$data = array(
				'username' => $this->input->post('username'),
				'password' => $this->input->post('password'),
				'nama' => $this->input->post('nama'),
				'img_user' => $img_user,
			);

			$this->M_user->update($id, $data);

			// Set session data for user update
			$this->session->set_userdata('username', $this->input->post('username'));
			$this->session->set_userdata('password', $this->input->post('password'));
			$this->session->set_userdata('nama', $this->input->post('nama'));
			$this->session->set_userdata('img_user', $img_user);

			redirect($this->redirect, 'refresh');
		}
	}

	public function update_password()
	{
		$this->form_validation->set_rules('current_password', 'Current Password', 'required');
		$this->form_validation->set_rules('new_password', 'New Password', 'required|min_length[6]');
		$this->form_validation->set_rules('confirm_password', 'Confirm Password', 'required|matches[new_password]');

		$id_user = $this->session->userdata('id_user');
		$current_password = $this->input->post('current_password');
		$new_password = $this->input->post('new_password');

		// Get current password from DB (hashed)
		$user = $this->M_auth->getId($id_user);

		if ($this->form_validation->run() == FALSE) {
			// Jika validasi form gagal
			$this->session->set_flashdata('validation_error', validation_errors());
			redirect($this->redirect);
		} else {
			// Check if the current password is correct
			if (password_verify($current_password, $user->password)) {
				// Hash new password
				$hashed_password = password_hash($new_password, PASSWORD_ARGON2ID);

				// Update password in database
				$this->M_auth->update($id_user, ['password' => $hashed_password]);

				$this->session->set_flashdata('success', 'Password updated successfully.');
				redirect($this->redirect);
			} else {
				// Password lama tidak cocok
				$this->session->set_flashdata('error', 'Current password is incorrect.');
				redirect($this->redirect);
			}
		}
	}
}
