<?php
defined('BASEPATH') or exit('No direct script access allowed');
class Prodi extends CI_Controller
{
	private $view = "admin/pages/account/prodi/";
	private $redirect = "Admin/Account/Prodi";
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
		$role = $this->session->userdata('role');
		$img_user = $this->session->userdata('img_user');
		$foto = $img_user ? 'assets/static/img/photos/staff/' . $img_user : 'assets/static/img/user.png';
		$data = array(
			'judul' => "AKUN PRODI",
			'sub' => "Akun Prodi",
			'active_menu' => 'prodi',
			'id_user' => $this->session->userdata('id_user'),
			'role' => $role,
			'nama' => $this->session->userdata('nama'),
			'foto' => $foto,
			'read' => $this->M_auth->GetProdi(),
			'staff' => $this->M_staff->GetAllStaff(),
		);
		$this->template->load('layout/components/layout', $this->view . 'read', $data);
	}
	function create()
	{
		$role = $this->session->userdata('role');
		$img_user = $this->session->userdata('img_user');
		$foto = $img_user ? 'assets/static/img/photos/staff/' . $img_user : 'assets/static/img/user.png';
		$data = array(
			'judul' => "AKUN PRODI",
			'sub' => "Akun Prodi",
			'active_menu' => 'prodi',
			'id_user' => $this->session->userdata('id_user'),
			'role' => $role,
			'nama' => $this->session->userdata('nama'),
			'foto' => $foto,
			'staff' => $this->M_staff->GetAllStaff(),
		);
		$this->template->load('layout/components/layout', $this->view . 'create', $data);
	}
	function edit($id)
	{
		$role = $this->session->userdata('role');
		$img_user = $this->session->userdata('img_user');
		$foto = $img_user ? 'assets/static/img/photos/staff/' . $img_user : 'assets/static/img/user.png';
		$data = array(
			'judul' => "AKUN PRODI",
			'sub' => "Akun Prodi",
			'active_menu' => 'prodi',
			'id_user' => $this->session->userdata('id_user'),
			'role' => $role,
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
			redirect($this->redirect);
		} else {
			$last_id = $this->M_auth->getLastId(); //get last id
			// jika id tidak ditemukan, id diisi 1
			$id = ($last_id == null) ? 1 : $last_id + 1;
			$data = array(
				'id_akun' => $id,
				'id_user' => $this->security->xss_clean($this->input->post('id_user')),
				'username' => $this->security->xss_clean($this->input->post('username')),
				'password' => !empty($this->security->xss_clean($this->input->post('password'))) ? password_hash($this->input->post('password'), PASSWORD_ARGON2ID) : NULL,
				'role' => 'prodi'
			);

			$this->M_auth->save($data);
			redirect($this->redirect, 'refresh');
		}
	}

	public function update()
	{
		cek_csrf();
		$id = $this->uri->segment(5);

		// Ambil data username lama dari database
		$user = $this->M_auth->edit($id);
		$old_username = $user ? $user['username'] : '';

		// Cek apakah username baru sama dengan username lama
		$new_username = $this->input->post('username');
		$updated_username = ($new_username === $old_username);

		// Set aturan validasi username hanya jika username berbeda
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
			redirect($this->redirect);
		} else {
			$data = array(
				'id_user' => $this->security->xss_clean($this->input->post('id_user')),
				// Hanya update username jika berbeda
				'username' => $updated_username ? $old_username : $this->security->xss_clean($new_username),
				'password' => !empty($this->security->xss_clean($this->input->post('password'))) ? password_hash($this->input->post('password'), PASSWORD_ARGON2ID) : NULL,
				'role' => $this->security->xss_clean($this->input->post('role')),
			);

			// Lakukan update data
			$this->M_auth->updateAccount($id, $data);
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
		redirect($this->redirect, 'refresh');
	}
}
