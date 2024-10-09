<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Myprofile extends CI_Controller
{
	private $view = "admisi/pages/profile/";
	private $redirect = "Admisi/Myprofile";
	public function __construct()
	{
		parent::__construct();
		//protected routes
		checkRole('Admisi');
		//load model
		$this->load->model(array('M_profile', 'M_auth'));
	}

	public function index()
	{
		$id = $this->session->userdata('id_user');
		$role = $this->session->userdata('role');
		$img_user = $this->session->userdata('img_user');
		$foto = $img_user ? 'assets/static/img/photos/' . strtolower($role) . '/' . $img_user : 'assets/static/img/user.png';
		$data = array(
			'judul' => "MY PROFILE",
			'sub' => "Profile",
			'active_menu' => 'myprofile',
			'id_user' => $id,
			// from tabel user
			'nama' => $this->session->userdata('nama'),
			'foto' => $foto,
			'role' => $role,
			'profile' => $this->M_profile->getById($id),
		);

		$this->template->load('layout/components/layout', $this->view . 'read', $data);
	}

	public function change_profile_picture($id)
	{
		cek_csrf();
		$role = $this->session->userdata('role');
		$id_user = $this->session->userdata('id_user');

		// Konfigurasi upload file
		$config['upload_path'] = './assets/static/img/photos/admisi/';
		$config['allowed_types'] = 'jpg|jpeg|png|wepb|JPG|PNG|JPEG|WEPB';
		$config['max_size'] = 6000; // KB
		$config['file_name'] = $role . '_' . $id_user . '_' . time();
		// Memuat library upload dengan konfigurasi
		$this->load->library('upload', $config);

		$img_user = '';
		if ($this->upload->do_upload('img_user')) {
			// File berhasil diupload
			$img_user_data = $this->upload->data();
			$img_user = $img_user_data['file_name'];
		} else {
			// Jika file tidak diupload, gunakan gambar saat ini
			$img_user = $this->input->post('img_user_current');
		}

		// Ambil data user dari database berdasarkan ID
		$user = $this->M_profile->getById($id);

		// Update data user dengan gambar yang baru
		$data = array(
			'img_user' => $img_user,
		);
		$this->M_profile->update($id, $data);

		// Update session dengan gambar yang baru
		$this->session->set_userdata('img_user', $img_user);

		// Redirect ke halaman tertentu setelah proses selesai
		redirect($this->redirect, 'refresh');
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
			cek_csrf();
			// Check if the current password is correct
			if (empty($user->password)) {
				if ($current_password === $user->id_user) {
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
			} else if (password_verify($current_password, $user->password)) {
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
