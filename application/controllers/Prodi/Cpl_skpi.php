<?php
defined('BASEPATH') or exit('No direct script access allowed');
class Cpl_skpi extends CI_Controller
{
	private $view = "prodi/pages/cpl_skpi/";
	private $redirect = "Prodi/Cpl_skpi";
	public function __construct()
	{
		parent::__construct();
		//protected routes
		checkRole('Prodi');
		$this->load->model(array('M_cpl', 'M_prodi', 'M_kategori_cpl'));
	}
	function index()
	{
		$role = $this->session->userdata('role');
		$img_user = $this->session->userdata('img_user');
		$foto = $img_user ? 'assets/static/img/photos/staff/' . $img_user : 'assets/static/img/user.png';
		$data = array(
			'judul' => "CPL SKPI",
			'sub' => "CPL Skpi",
			'active_menu' => 'cpl',
			// from tabel auth
			'nama' => $this->session->userdata('nama'),
			'role' => $role,
			// from tabel user
			'id_user' => $this->session->userdata('id_user'),
			'foto' => $foto,
			'read' => $this->M_cpl->GetAll(),
		);
		$this->template->load('layout/components/layout', $this->view . 'read', $data);
	}
	function create()
	{
		$role = $this->session->userdata('role');
		$img_user = $this->session->userdata('img_user');
		$foto = $img_user ? 'assets/static/img/photos/staff/' . $img_user : 'assets/static/img/user.png';
		$data = array(
			'judul' => "CPL SKPI",
			'sub' => "CPL Skpi",
			'active_menu' => 'cpl',
			// from tabel auth
			'nama' => $this->session->userdata('nama'),
			'role' => $role,
			// from tabel user
			'id_user' => $this->session->userdata('id_user'),
			'foto' => $foto,
			'read' => $this->M_cpl->GetAll(),
			'prodi' => $this->M_prodi->GetAll(),
			'cpl' => $this->M_kategori_cpl->GetAll(),
		);
		$this->template->load('layout/components/layout', $this->view . 'create', $data);
	}

	public function save()
	{
		cek_csrf();
		$data = array(
			'id_cpl' => $this->security->xss_clean($this->input->post('id_cpl')),
			'id_prodi' => $this->security->xss_clean($this->input->post('id_prodi')),
			'id_kategori_cpl' => $this->security->xss_clean($this->input->post('id_kategori_cpl')),
			'konten' => $this->security->xss_clean($this->input->post('konten')),
		);
		$this->M_cpl->save($data);
		redirect($this->redirect, 'refresh');
	}

	function edit()
	{
		$id = $this->uri->segment(4);
		$role = $this->session->userdata('role');
		$img_user = $this->session->userdata('img_user');
		$foto = $img_user ? 'assets/static/img/photos/staff/' . $img_user : 'assets/static/img/user.png';
		$data = array(
			'judul' => "CPL SKPI",
			'sub' => "CPL Skpi",
			'active_menu' => 'cpl',
			// from tabel auth
			'nama' => $this->session->userdata('nama'),
			'role' => $role,
			// from tabel user
			'id_user' => $this->session->userdata('id_user'),
			'foto' => $foto,
			'read' => $this->M_cpl->GetAll(),
			'prodi' => $this->M_prodi->GetAll(),
			'edit' => $this->M_cpl->edit($id),
			'cpl' => $this->M_kategori_cpl->GetAll(),
		);
		$this->template->load('layout/components/layout', $this->view . 'edit', $data);
	}
	public function update()
	{
		cek_csrf();
		$id = $this->uri->segment(4);
		$data = array(
			'id_prodi' => $this->security->xss_clean($this->input->post('id_prodi')),
			'id_kategori_cpl' => $this->security->xss_clean($this->input->post('id_kategori_cpl')),
			'konten' => $this->security->xss_clean($this->input->post('konten')),
		);
		$this->M_cpl->update($id, $data);
		redirect($this->redirect, 'refresh');
	}

	public function delete()
	{
		cek_csrf();
		$id = $this->input->post('id_cpl');
		$data = array(
			'id_cpl' => $id
		);
		$this->M_cpl->delete($data);
		redirect($this->redirect, 'refresh');
	}
}
