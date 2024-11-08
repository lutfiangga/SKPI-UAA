<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Myprofile extends CI_Controller
{
	private $view = "etiquette/pages/profile/";
	private $redirect = "Etiquette/Myprofile";
	public function __construct()
	{
		parent::__construct();
		//protected routes
		checkRole('Etiquette');
		//load model
		$this->load->model(array('M_profile', 'M_auth'));
	}

	public function index()
	{
		$id = $this->session->userdata('id_user');
		$role = $this->session->userdata('role');
		$img_user = $this->session->userdata('img_user');
		$foto = $img_user ? 'assets/static/img/photos/staff/' . $img_user : 'assets/static/img/user.png';
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
		$config['upload_path'] = './assets/static/img/photos/eticket/';
		$config['allowed_types'] = 'jpg|jpeg|png|wepb|JPG|PNG|JPEG|WEPB';
		$config['max_size'] = 6000; // KB
		$config['file_name'] = $role . '_' . $id_user . '_' . time();
		$this->load->library('upload', $config); // Load library dan config

		$user = $this->M_profile->getById($id); //get user by id
		$img_user = $user['img_user']; // default image

		if ($this->upload->do_upload('img_user')) {
			$img_user_data = $this->upload->data();
			$img_user = $img_user_data['file_name'];

			// delete old image
			if (!empty($user['img_user']) && file_exists('./assets/static/img/photos/eticket/' . $user['img_user'])) {
				unlink('./assets/static/img/photos/eticket/' . $user['img_user']);
			}
		}

		$data = array(
			'img_user' => $img_user,
		);
		$this->M_profile->update($id, $data);
		$this->session->set_userdata('img_user', $img_user);
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

		$user = $this->M_auth->getId($id_user);

		if ($this->form_validation->run() == FALSE) {
			// Jika validasi form gagal
			$this->session->set_flashdata('validation_error', validation_errors());
			redirect($this->redirect);
		} else {
			cek_csrf();
			if (empty($user->password)) {
				if ($current_password === $user->id_user) {
					$hashed_password = password_hash($new_password, PASSWORD_ARGON2ID);
					// Update password
					$this->M_auth->update($id_user, ['password' => $hashed_password]);
					$this->session->set_flashdata('success', 'Password updated successfully.');
					redirect($this->redirect);
				} else {
					// Password lama tidak cocok
					$this->session->set_flashdata('error', 'Current password is incorrect.');
					redirect($this->redirect);
				}
			} else if (password_verify($current_password, $user->password)) {
				$hashed_password = password_hash($new_password, PASSWORD_ARGON2ID);
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