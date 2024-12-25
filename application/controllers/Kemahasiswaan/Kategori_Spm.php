<?php
defined('BASEPATH') or exit('No direct script access allowed');
class Kategori_Spm extends CI_Controller
{
	private $view = "kemahasiswaan/pages/kategori_spm/";
	private $redirect = "Kemahasiswaan/Kategori_Spm";
	public function __construct()
	{
		parent::__construct();
		//protected routes
		checkRole('Kemahasiswaan');
		$this->load->model('M_kategori_spm');
	}
	function index()
	{
		
		$img_user = $this->session->userdata('img_user');
		$foto = $img_user && file_exists('assets/static/img/photos/staff/' . $img_user) ? 'assets/static/img/photos/staff/' . $img_user : 'assets/static/img/user.png';
		$data = array(
			'judul' => "KATEGORI SPM",
			'sub' => "Kategori SPM",
			'active_menu' => 'kategori_spm',
			'nama' => $this->session->userdata('nama'),
			'role' => $this->session->userdata('role'),
			'id_user' => $this->session->userdata('id_user'),
			'foto' => $foto,
			'read' => $this->M_kategori_spm->getAll(),
		);
		$this->template->load('layout/components/layout', $this->view . 'read', $data);
	}

	function create()
	{
		
		$img_user = $this->session->userdata('img_user');
		$foto = $img_user && file_exists('assets/static/img/photos/staff/' . $img_user) ? 'assets/static/img/photos/staff/' . $img_user : 'assets/static/img/user.png';
		$data = array(
			'judul' => "KATEGORI SPM",
			'sub' => "Kategori SPM",
			'active_menu' => 'kategori_spm',
			'nama' => $this->session->userdata('nama'),
			'role' => $this->session->userdata('role'),
			'id_user' => $this->session->userdata('id_user'),
			'foto' => $foto,
		);
		$this->template->load('layout/components/layout', $this->view . 'create', $data);
	}
	function edit($id)
	{
		
		$img_user = $this->session->userdata('img_user');
		$foto = $img_user && file_exists('assets/static/img/photos/staff/' . $img_user) ? 'assets/static/img/photos/staff/' . $img_user : 'assets/static/img/user.png';
		$data = array(
			'judul' => "KATEGORI SPM",
			'sub' => "Kategori SPM",
			'active_menu' => 'kategori_spm',
			'nama' => $this->session->userdata('nama'),
			'role' => $this->session->userdata('role'),
			'id_user' => $this->session->userdata('id_user'),
			'foto' => $foto,
			'edit' => $this->M_kategori_spm->edit($id),
		);
		$this->template->load('layout/components/layout', $this->view . 'edit', $data);
	}
	public function save()
	{
		cek_csrf();
		$data = array(
			'id_kategori_spm' => generate_uuid_v7(),
			'kategori' => $this->security->xss_clean($this->input->post('kategori')),
		);
		$this->M_kategori_spm->save($data);
		$this->session->set_flashdata('create_success', 'Data berhasil ditambahkan!');
		redirect($this->redirect, 'refresh');
	}

	public function update($id)
	{
		cek_csrf();
		$data = array(
			'kategori' => $this->security->xss_clean($this->input->post('kategori')),
		);
		$this->M_kategori_spm->update($id, $data);
		$this->session->set_flashdata('update_success', 'Data berhasil diupdate!');
		redirect($this->redirect, 'refresh');
	}
	public function delete()
	{
		cek_csrf();
		$data = array(
			'id_kategori_spm' => $id
		);
		$this->M_kategori_spm->delete($data);
		$this->session->set_flashdata('delete_success', 'Data berhasil dihapus!');
		redirect($this->redirect, 'refresh');
	}
}
