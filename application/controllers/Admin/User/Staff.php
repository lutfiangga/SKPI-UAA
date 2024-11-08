<?php
defined('BASEPATH') or exit('No direct script access allowed');
class Staff extends CI_Controller
{
	private $view = "admin/pages/user/staff/";
	private $redirect = "Admin/User/Staff";
	public function __construct()
	{
		parent::__construct();
		// IsAdmin();
		$this->load->model(array('M_staff', 'M_prodi'));
		$this->load->helper('text');
		checkRole('Admin');
	}

	function index()
	{
		$role = $this->session->userdata('role');
		$img_user = $this->session->userdata('img_user');
		$foto = $img_user ? 'assets/static/img/photos/staff/' . $img_user : 'assets/static/img/user.png';
		$data = array(
			'judul' => "DATA PEGAWAI",
			'sub' => "Data Pegawai",
			'active_menu' => 'usr_staff',
			'id_user' => $this->session->userdata('id_user'),
			'role' => $role,
			'nama' => $this->session->userdata('nama'),
			'foto' => $foto,
			'read' => $this->M_staff->GetAllStaff(),
		);
		$this->template->load('layout/components/layout', $this->view . 'read', $data);
	}

	public function create()
	{
		$role = $this->session->userdata('role');
		$img_user = $this->session->userdata('img_user');
		$foto = $img_user ? 'assets/static/img/photos/staff/' . $img_user : 'assets/static/img/user.png';
		$data = array(
			'judul' => "DATA PEGAWAI",
			'sub' => "Data Pegawai",
			'active_menu' => 'usr_staff',
			'id_user' => $this->session->userdata('id_user'),
			'role' => $role,
			'nama' => $this->session->userdata('nama'),
			'foto' => $foto,
		);
		$this->template->load('layout/components/layout', $this->view . 'create', $data);
	}

	public function save()
	{
		cek_csrf();
		$this->form_validation->set_rules(
			'id_staff',
			'ID Staff',
			'required|is_unique[staff.id_staff]',
			[
				'required' => 'NIP/NIDN Wajib diisi!.',
				'is_unique' => 'NIP/NIDN sudah terdaftar!'
			]
		);


		if ($this->form_validation->run() == FALSE) {
			$this->session->set_flashdata('create_error', validation_errors());
			redirect($this->redirect . '/create');
		} else {

			$data = array(
				'id_staff' => $this->security->xss_clean($this->input->post('id_staff')),
				'nama' => $this->security->xss_clean($this->input->post('nama')),
				'jenis_kelamin' => $this->security->xss_clean($this->input->post('jenis_kelamin')),
				'tgl_lahir' => !empty($this->input->post('tgl_lahir')) ? $this->input->post('tgl_lahir') : NULL,
				'email' => !empty($this->security->xss_clean($this->input->post('email'))) ? $this->security->xss_clean($this->input->post('email')) : NULL,
				'phone' => !empty($this->security->xss_clean($this->input->post('phone'))) ? $this->security->xss_clean($this->input->post('phone')) : NULL,
				'jabatan' => !empty($this->security->xss_clean($this->input->post('jabatan'))) ? $this->security->xss_clean($this->input->post('jabatan')) : NULL,
			);

			$this->M_staff->save($data);
			redirect($this->redirect, 'refresh');
		}
	}

	public function edit()
	{
		$id = $this->uri->segment(5);

		$role = $this->session->userdata('role');
		$img_user = $this->session->userdata('img_user');
		$foto = $img_user ? 'assets/static/img/photos/staff/' . $img_user : 'assets/static/img/user.png';
		$data = array(
			'judul' => "DATA PEGAWAI",
			'sub' => "Data Pegawai",
			'active_menu' => 'usr_staff',
			'id_user' => $this->session->userdata('id_user'),
			'role' => $role,
			'nama' => $this->session->userdata('nama'),
			'foto' => $foto,
			'edit' => $this->M_staff->edit($id),
		);
		$this->template->load('layout/components/layout', $this->view . 'edit', $data);
	}
	public function update($id)
	{
		cek_csrf();
		$id = $this->uri->segment(5);
		$data = array(
			'nama' => $this->security->xss_clean($this->input->post('nama')),
			'jenis_kelamin' => $this->security->xss_clean($this->input->post('jenis_kelamin')),
			'tgl_lahir' => !empty($this->input->post('tgl_lahir')) ? $this->input->post('tgl_lahir') : NULL,
			'email' => !empty($this->security->xss_clean($this->input->post('email'))) ? $this->security->xss_clean($this->input->post('email')) : NULL,
			'phone' => !empty($this->security->xss_clean($this->input->post('phone'))) ? $this->security->xss_clean($this->input->post('phone')) : NULL,
			'jabatan' => !empty($this->security->xss_clean($this->input->post('jabatan'))) ? $this->security->xss_clean($this->input->post('jabatan')) : NULL,
		);

		$this->M_staff->update($id, $data);
		redirect($this->redirect, 'refresh');
	}

	public function delete()
	{
		cek_csrf();
		$id = $this->input->post('id_staff');
		$data = array(
			'id_staff' => $id
		);
		$this->M_staff->delete($data);
		redirect($this->redirect, 'refresh');
	}
}
