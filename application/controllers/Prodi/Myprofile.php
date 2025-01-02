<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Myprofile extends CI_Controller
{
	private $view = "prodi/pages/profile/";
	private $redirect = "Prodi/Myprofile";
	public function __construct()
	{
		parent::__construct();
		//protected routes
		checkRole('Prodi');
		//load model
		$this->load->model(array('M_profile', 'M_auth', 'M_staff'));
	}

	public function index()
	{
		$id = $this->session->userdata('id_akun');
		$img_user = $this->session->userdata('img_user');
		$foto = $img_user && file_exists('assets/static/img/photos/staff/' . $img_user) ? 'assets/static/img/photos/staff/' . $img_user : 'assets/static/img/user.png';
		$data = array(
			'judul' => "MY PROFILE",
			'sub' => "Profile",
			'active_menu' => 'myprofile',
			'id_user' => $this->session->userdata('id_user'),
			'nama' => $this->session->userdata('nama'),
			'foto' => $foto,
			'role' => $this->session->userdata('role'),
			'profile' => $this->M_profile->getById($id),
		);

		$this->template->load('layout/components/layout', $this->view . 'read', $data);
	}
	public function update()
	{
		cek_csrf();
		$id = $this->session->userdata('id_user');

		$nama = $this->security->xss_clean($this->input->post('nama'));
		$data = array(
			'nama' => $nama,
			'tgl_lahir' => !empty($this->input->post('tgl_lahir')) ? $this->input->post('tgl_lahir') : NULL,
			'jenis_kelamin' => !empty($this->input->post('jenis_kelamin')) ? $this->input->post('jenis_kelamin') : NULL,
			'email' => !empty($this->security->xss_clean($this->input->post('email'))) ? $this->security->xss_clean($this->input->post('email')) : NULL,
			'phone' => !empty($this->security->xss_clean($this->input->post('phone'))) ? $this->security->xss_clean($this->input->post('phone')) : NULL,
			'jabatan' => !empty($this->security->xss_clean($this->input->post('jabatan'))) ? $this->security->xss_clean($this->input->post('jabatan')) : NULL,
		);

		$this->M_staff->update($id, $data);
		$this->session->set_userdata('nama', $nama);
		$this->session->set_flashdata('update_profile_success', 'Data berhasil diupdate');
		redirect($this->redirect, 'refresh');
	}
	public function change_profile_picture($id)
	{
		cek_csrf();
		$role = $this->session->userdata('role');
		$id_user = $this->session->userdata('id_user');
		$id = $this->session->userdata('id_akun');

		// Konfigurasi upload file
		$config['upload_path'] = './assets/static/img/photos/staff/';
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
			if (!empty($user['img_user']) && file_exists('./assets/static/img/photos/staff/' . $user['img_user'])) {
				unlink('./assets/static/img/photos/staff/' . $user['img_user']);
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
		$this->form_validation->set_rules('new_password', 'New Password', 'required|min_length[6]|regex_match[/^(?=.*[a-z])(?=.*[A-Z])(?=.*\d)[a-zA-Z\d]{6,}$/]|callback_password_check', [
			'required' => 'Password baru harus diisi',
			'min_length' => 'Password minimal 6 karakter',
			'regex_match' => 'Password harus mengandung huruf besar, huruf kecil, dan angka'
		]);
		$this->form_validation->set_rules('confirm_password', 'Confirm Password', 'required|matches[new_password]', [
			'required' => 'Konfirmasi password harus diisi',
			'matches' => 'Konfirmasi password tidak cocok'
		]);

		$id_akun = trim($this->session->userdata('id_akun'));
		$id_user = trim($this->session->userdata('id_user'));
		$current_password = trim($this->security->xss_clean($this->input->post('current_password')));
		$new_password = trim($this->security->xss_clean($this->input->post('new_password')));

		$user = $this->M_auth->getId($id_akun);

		if ($this->form_validation->run() == FALSE) {
			$this->session->set_flashdata('validation_error', validation_errors());
			redirect($this->redirect);
		} else {
			cek_csrf();

			$md5_current = md5($current_password);
			$md5_id = md5($id_user);

			if (empty($user->password)) {
				if ($md5_current === $md5_id) {
					$hashed_password = md5($new_password);
					$this->M_auth->updateAccount($id_user, ['password' => $hashed_password]);
					$this->session->set_flashdata('success', 'Password berhasil diperbarui!');
					redirect($this->redirect);
				} else {
					$this->session->set_flashdata('error', 'Current password salah!');
					redirect($this->redirect);
				}
			} else {
				if ($md5_current === $user->password) {
					$hashed_password = md5($new_password);
					$this->M_auth->updateAccount($id_user, ['password' => $hashed_password]);
					$this->session->set_flashdata('success', 'Password berhasil diperbarui!');
					redirect($this->redirect);
				} else {
					$this->session->set_flashdata('error', 'Current password salah!');
					redirect($this->redirect);
				}
			}
		}
	}

	public function password_check($str)
	{
		$id_user = trim($this->session->userdata('id_user'));
		$id_akun = trim($this->session->userdata('id_akun'));
		$user = $this->M_auth->getId($id_akun);
		$current_password = trim($this->security->xss_clean($this->input->post('current_password')));

		if (empty($user->password)) {
			if (md5($str) === md5($id_user)) {
				$this->form_validation->set_message('password_check', 'Password baru tidak boleh sama dengan password lama!');
				return FALSE;
			}
		} else {
			if (md5($str) === $user->password) {
				$this->form_validation->set_message('password_check', 'Password baru tidak boleh sama dengan password lama!');
				return FALSE;
			}
		}
		return TRUE;
	}
}
