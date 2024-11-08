<?php
defined('BASEPATH') or exit('No direct script access allowed');
class Prodi extends CI_Controller
{
	private $view = "admin/pages/prodi/";
	private $redirect = "Admin/Prodi";
	public function __construct()
	{
		parent::__construct();
		$this->load->model(array('M_prodi', 'M_staff', 'M_akreditasi', 'M_fakultas'));
		checkRole('Admin');
	}

	function index()
	{
		$role = $this->session->userdata('role');
		$img_user = $this->session->userdata('img_user');
		$foto = $img_user ? 'assets/static/img/photos/staff/' . $img_user : 'assets/static/img/user.png';
		$data = array(
			'judul' => "DATA PROGRAM STUDI",
			'sub' => "Data Program Studi",
			'active_menu' => 'prodi',
			'id_user' => $this->session->userdata('id_user'),
			'role' => $role,
			'nama' => $this->session->userdata('nama'),
			'foto' => $foto,
			'read' => $this->M_prodi->GetAll(),
		);
		$this->template->load('layout/components/layout', $this->view . 'read', $data);
	}
	function create()
	{
		$role = $this->session->userdata('role');
		$img_user = $this->session->userdata('img_user');
		$foto = $img_user ? 'assets/static/img/photos/staff/' . $img_user : 'assets/static/img/user.png';
		$data = array(
			'judul' => "DATA PROGRAM STUDI",
			'sub' => "Data Program Studi",
			'active_menu' => 'prodi',
			'id_user' => $this->session->userdata('id_user'),
			'role' => $role,
			'nama' => $this->session->userdata('nama'),
			'foto' => $foto,
			'staff' => $this->M_staff->GetAllStaff(),
			'akred' => $this->M_akreditasi->GetAll(),
			'fakultas' => $this->M_fakultas->GetAll(),
		);
		$this->template->load('layout/components/layout', $this->view . 'create', $data);
	}
	function edit($id)
	{
		$role = $this->session->userdata('role');
		$img_user = $this->session->userdata('img_user');
		$foto = $img_user ? 'assets/static/img/photos/staff/' . $img_user : 'assets/static/img/user.png';
		$data = array(
			'judul' => "DATA PROGRAM STUDI",
			'sub' => "Data Program Studi",
			'active_menu' => 'prodi',
			'id_user' => $this->session->userdata('id_user'),
			'role' => $role,
			'nama' => $this->session->userdata('nama'),
			'foto' => $foto,
			'staff' => $this->M_staff->GetAllStaff(),
			'akred' => $this->M_akreditasi->GetAll(),
			'fakultas' => $this->M_fakultas->GetAll(),
			'edit' => $this->M_prodi->edit($id),
		);
		$this->template->load('layout/components/layout', $this->view . 'edit', $data);
	}

	public function save()
	{
		cek_csrf();
		$this->form_validation->set_rules(
			'id_prodi',
			'Kode Prodi',
			'required|is_unique[prodi.id_prodi]',
			[
				'required' => 'Kode Prodi Wajib diisi!',
				'is_unique' => 'Kode Prodi sudah terdaftar!'
			]
		);
		$this->form_validation->set_rules(
			'prodi',
			'Prodi',
			'required|is_unique[prodi.prodi]',
			[
				'required' => 'Prodi Wajib diisi!',
				'is_unique' => 'Prodi sudah terdaftar!'
			]
		);

		if ($this->form_validation->run() == FALSE) {
			$this->session->set_flashdata('create_error', validation_errors());
			redirect($this->redirect);
		} else {
			$data = array(
				'id_prodi' => $this->security->xss_clean($this->input->post('id_prodi')),
				'prodi' => $this->security->xss_clean($this->input->post('prodi')),
				'id_fakultas' => $this->security->xss_clean($this->input->post('id_fakultas')),
				'id_kaprodi' => $this->security->xss_clean($this->input->post('id_kaprodi')),
				'id_akreditasi' => $this->security->xss_clean($this->input->post('id_akreditasi')),
				'jenjang_lanjutan' => $this->security->xss_clean($this->input->post('jenjang_lanjutan')),
			);

			$this->M_prodi->save($data);
			$this->session->set_flashdata('create_success', 'Data berhasil diupdate');
			redirect($this->redirect, 'refresh');
		}
	}

	public function update()
	{
		cek_csrf();
		$id = $this->uri->segment(4);
		$this->form_validation->set_rules(
			'prodi',
			'Prodi',
			'required|is_unique[prodi.prodi]',
			[
				'required' => 'Prodi Wajib diisi!',
				'is_unique' => 'Prodi sudah terdaftar!'
			]
		);
		if ($this->form_validation->run() == FALSE) {
			$this->session->set_flashdata('update_error', validation_errors());
			redirect($this->redirect);
		} else {
			$data = array(
				'prodi' => $this->security->xss_clean($this->input->post('prodi')),
				'id_fakultas' => $this->security->xss_clean($this->input->post('id_fakultas')),
				'id_kaprodi' => $this->security->xss_clean($this->input->post('id_kaprodi')),
				'id_akreditasi' => $this->security->xss_clean($this->input->post('id_akreditasi')),
				'jenjang_lanjutan' => $this->security->xss_clean($this->input->post('jenjang_lanjutan')),
			);
			$this->M_prodi->update($id, $data);
			$this->session->set_flashdata('update_success', 'Data berhasil diupdate');
			redirect($this->redirect, 'refresh');
		}
	}

	public function delete()
	{
		cek_csrf();
		$id = $this->input->post('id_prodi');
		$data = array(
			'id_prodi' => $id
		);
		$this->M_prodi->delete($data);
		redirect($this->redirect, 'refresh');
	}
}