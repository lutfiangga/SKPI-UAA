<?php
defined('BASEPATH') or exit('No direct script access allowed');
class Kategori_Spm_Mahasiswa extends CI_Controller
{
	private $view = "kemahasiswaan/pages/kategori_spm/";
	private $redirect = "Kemahasiswaan/Kategori_Spm_Mahasiswa";
	public function __construct()
	{
		parent::__construct();
		//protected routes
		checkRole('Kemahasiswaan');
		$this->load->model('M_kategori_spm');
	}
	function index()
	{
		$role = $this->session->userdata('role');
		$img_user = $this->session->userdata('img_user');
		$foto = $img_user ? 'assets/static/img/photos/' . $role . '/' . $img_user : 'assets/static/img/user.png';
		$id = $this->input->post('id_kategori');
		$data = array(
			'judul' => "KATEGORI SPM",
			'sub' => "Kategori SPM",
			'active_menu' => 'kategori_spm',
			'nama' => $this->session->userdata('nama'),
			'role' => $role,
			'id_user' => $this->session->userdata('id_user'),
			'foto' => $foto,
			'read' => $this->M_kategori_spm->getAll(),
			'edit' => $this->M_kategori_spm->edit($id),
		);
		$this->template->load('layout/components/layout', $this->view . 'read', $data);
	}
	public function save()
	{
		cek_csrf();

		$last_id = $this->M_kategori_spm->getLastId(); // get last id
		// jika id tidak ditemukan, id diisi 1
		$id = ($last_id == null) ? 1 : $last_id + 1;
		$data = array(
			'id_kategori' => $id,
			'nama_kategori' => $this->input->post('nama_kategori'),
			'poin' => $this->input->post('poin'),
			'type' => $this->input->post('type'),
		);
		$this->M_kategori_spm->save($data);
		redirect($this->redirect, 'refresh');
	}

	public function update()
	{
		cek_csrf();
		$id = $this->input->post('id_kategori');
		$data = array(
			'nama_kategori' => $this->input->post('nama_kategori'),
			'poin' => $this->input->post('poin'),
			'type' => $this->input->post('type'),
		);
		$this->M_kategori_spm->update($id, $data);
		redirect($this->redirect, 'refresh');
	}
	public function delete()
	{
		cek_csrf();
		$id = $this->input->post('id_kategori');
		$data = array(
			'id_kategori' => $id
		);
		$this->M_kategori_spm->delete($data);
		redirect($this->redirect, 'refresh');
	}
}
