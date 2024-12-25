<?php
defined('BASEPATH') or exit('No direct script access allowed');
class Admin extends CI_Controller
{
	private $view = "admin/pages/account/admin/";
	private $redirect = "Admin/Account/Admin";
	public function __construct()
	{
		parent::__construct();
		// IsAdmin();
		$this->load->model(array('M_auth', 'M_staff', 'M_prodi'));
		$this->load->helper('text');
		checkRole('Admin');
	}

	function index()
	{
		$img_user = $this->session->userdata('img_user');
			$foto = $img_user && file_exists('assets/static/img/photos/staff/' . $img_user) ? 'assets/static/img/photos/staff/' . $img_user : 'assets/static/img/user.png';
		$data = array(
			'judul' => "AKUN ADMIN",
			'sub' => "Akun Admin",
			'active_menu' => 'admin',
			'id_user' => $this->session->userdata('id_user'),
			'role' => $this->session->userdata('role'),
			'nama' => $this->session->userdata('nama'),
			'foto' => $foto,
			'read' => $this->M_auth->GetAdmin(),
		);
		$this->template->load('layout/components/layout', $this->view . 'read', $data);
	}
	function create()
	{
		$img_user = $this->session->userdata('img_user');
			$foto = $img_user && file_exists('assets/static/img/photos/staff/' . $img_user) ? 'assets/static/img/photos/staff/' . $img_user : 'assets/static/img/user.png';
		$data = array(
			'judul' => "AKUN ADMIN",
			'sub' => "Akun Admin",
			'active_menu' => 'admin',
			'id_user' => $this->session->userdata('id_user'),
			'role' => $this->session->userdata('role'),
			'nama' => $this->session->userdata('nama'),
			'foto' => $foto,
			'staff' => $this->M_staff->GetAllStaff(),
		);
		$this->template->load('layout/components/layout', $this->view . 'create', $data);
	}
	function edit($id)
	{
		$img_user = $this->session->userdata('img_user');
			$foto = $img_user && file_exists('assets/static/img/photos/staff/' . $img_user) ? 'assets/static/img/photos/staff/' . $img_user : 'assets/static/img/user.png';
		$data = array(
			'judul' => "AKUN ADMIN",
			'sub' => "Akun Admin",
			'active_menu' => 'admin',
			'id_user' => $this->session->userdata('id_user'),
			'role' => $this->session->userdata('role'),
			'nama' => $this->session->userdata('nama'),
			'foto' => $foto,
			'edit' => $this->M_auth->edit($id),
			'staff' => $this->M_staff->GetAllStaff(),
		);
		$this->template->load('layout/components/layout', $this->view . 'edit', $data);
	}

	public function save()
	{
		cek_csrf();
		$this->form_validation->set_rules(
			'username',
			'Username',
			'required|is_unique[akun_user.username]',
			[
				'required' => 'Username Wajib diisi!',
				'is_unique' => 'Username sudah terdaftar!'
			]
		);

		if ($this->form_validation->run() == FALSE) {
			$this->session->set_flashdata('create_error', validation_errors());
			redirect($this->redirect . '/create');
		} else {
			$password = $this->security->xss_clean($this->input->post('password'));
			$data = array(
				'id_akun' => generate_uuid_v7(),
				'id_user' => $this->security->xss_clean($this->input->post('id_user')),
				'username' => $this->security->xss_clean($this->input->post('username')),
				'password' => !empty($password) ? password_hash($password, PASSWORD_ARGON2ID) : NULL,
				'role' => 'admin'
			);

			$this->M_auth->save($data);
			$this->session->set_flashdata('create_success', 'Data berhasil ditambahkan!');
			redirect($this->redirect, 'refresh');
		}
	}

	public function update()
	{
		cek_csrf();
		$id = $this->uri->segment(5);

		// Ambil data user lama dari database
		$user = $this->M_auth->edit($id);
		$old_username = $user ? $user['username'] : '';
		$old_password = $user ? $user['password'] : '';

		$new_username = $this->input->post('username');
		$updated_username = ($new_username === $old_username);

		if (!$updated_username) {
			$this->form_validation->set_rules(
				'username',
				'Username',
				'required|is_unique[akun_user.username]',
				[
					'required' => 'Username Wajib diisi!',
					'is_unique' => 'Username sudah terdaftar!'
				]
			);
		} else {
			$this->form_validation->set_rules(
				'username',
				'Username',
				'required',
				['required' => 'Username Wajib diisi!']
			);
		}

		if ($this->form_validation->run() == FALSE) {
			$this->session->set_flashdata('update_error', validation_errors());
			redirect($this->redirect . '/edit');
		} else {
			$new_password = $this->security->xss_clean($this->input->post('password'));
			$password = !empty($new_password) ? password_hash($new_password, PASSWORD_ARGON2ID) : $old_password;

			$data = array(
				'id_user' => $this->security->xss_clean($this->input->post('id_user')),
				'username' => $updated_username ? $old_username : $this->security->xss_clean($new_username),
				'password' => $password,
				'role' => $this->security->xss_clean($this->input->post('role')),
			);

			$this->M_auth->updateAccount($id, $data);
			$this->session->set_flashdata('update_success', 'Data berhasil diupdate!');
			redirect($this->redirect, 'refresh');
		}
	}

	public function delete()
	{
		cek_csrf();
		$id = $this->input->post('id_akun');
		$data = array(
			'id_akun' => $id
		);
		$this->M_auth->delete($data);
		$this->session->set_flashdata('delete_success', 'Data berhasil dihapus!');
		redirect($this->redirect, 'refresh');
	}
}
