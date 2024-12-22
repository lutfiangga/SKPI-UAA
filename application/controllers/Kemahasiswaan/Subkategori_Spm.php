<?php
defined('BASEPATH') or exit('No direct script access allowed');
class Subkategori_Spm extends CI_Controller
{
	private $view = "kemahasiswaan/pages/subkategori_spm/";
	private $redirect = "Kemahasiswaan/Subkategori_Spm";
	public function __construct()
	{
		parent::__construct();
		//protected routes
		checkRole('Kemahasiswaan');
		$this->load->model(array('M_subkategori_spm', 'M_kategori_spm'));
	}
	function index()
	{
		$img_user = $this->session->userdata('img_user');
		$foto = $img_user ? 'assets/static/img/photos/staff/' . $img_user : 'assets/static/img/user.png';
		$data = array(
			'judul' => "SUBKATEGORI SPM",
			'sub' => "Subkategori SPM",
			'active_menu' => 'subkategori_spm',
			'nama' => $this->session->userdata('nama'),
			'role' => $this->session->userdata('role'),
			'id_user' => $this->session->userdata('id_user'),
			'foto' => $foto,
			'read' => $this->M_subkategori_spm->GetAll(),
		);
		$this->template->load('layout/components/layout', $this->view . 'read', $data);
	}

	function create()
	{
		$img_user = $this->session->userdata('img_user');
		$foto = $img_user ? 'assets/static/img/photos/staff/' . $img_user : 'assets/static/img/user.png';
		$data = array(
			'judul' => "SUBKATEGORI SPM",
			'sub' => "Subkategori SPM",
			'active_menu' => 'subkategori_spm',
			'nama' => $this->session->userdata('nama'),
			'role' => $this->session->userdata('role'),
			'id_user' => $this->session->userdata('id_user'),
			'foto' => $foto,
			'kategori' => $this->M_kategori_spm->GetAll(),
		);
		$this->template->load('layout/components/layout', $this->view . 'create', $data);
	}
	function edit($id)
	{
		$img_user = $this->session->userdata('img_user');
		$foto = $img_user ? 'assets/static/img/photos/staff/' . $img_user : 'assets/static/img/user.png';
		$data = array(
			'judul' => "SUBKATEGORI SPM",
			'sub' => "Subkategori SPM",
			'active_menu' => 'subkategori_spm',
			'nama' => $this->session->userdata('nama'),
			'role' => $this->session->userdata('role'),
			'id_user' => $this->session->userdata('id_user'),
			'foto' => $foto,
			'kategori' => $this->M_kategori_spm->getAll(),
			'edit' => $this->M_subkategori_spm->edit($id),
		);
		$this->template->load('layout/components/layout', $this->view . 'edit', $data);
	}
	public function save()
	{
		cek_csrf();
		$data = array(
			'id_subkategori_spm' => generate_uuid_v7(),
			'id_kategori_spm' => $this->security->xss_clean($this->input->post('id_kategori_spm')),
			'subkategori' => $this->security->xss_clean($this->input->post('subkategori')),
			'poin' => $this->security->xss_clean($this->input->post('poin')),
		);
		$this->M_subkategori_spm->save($data);
		$this->session->set_flashdata('create_success', 'Data berhasil ditambahkan!');
		redirect($this->redirect, 'refresh');
	}

	public function update($id)
	{
		cek_csrf();
		$data = array(
			'id_kategori_spm' => $this->security->xss_clean($this->input->post('id_kategori_spm')),
			'subkategori' => $this->security->xss_clean($this->input->post('subkategori')),
			'poin' => $this->security->xss_clean($this->input->post('poin')),
		);
		$this->M_subkategori_spm->update($id, $data);
		$this->session->set_flashdata('update_success', 'Data berhasil diupdate!');
		redirect($this->redirect, 'refresh');
	}
	public function delete()
	{
		cek_csrf();
		$id = $this->input->post('id_subkategori_spm');
		$data = array(
			'id_subkategori_spm' => $id
		);
		$this->M_subkategori_spm->delete($data);
		$this->session->set_flashdata('delete_success', 'Data berhasil dihapus!');
		redirect($this->redirect, 'refresh');
	}
}
