<?php
defined('BASEPATH') or exit('No direct script access allowed');
class Kategori_Spm_Mahasiswa extends CI_Controller
{
	private $view = "admisi/pages/kategori_spm_wajib/";
	private $redirect = "Admisi/Kategori_Spm_Mahasiswa";
	public function __construct()
	{
		parent::__construct();
		//protected routes
		checkRole('Admisi');
		$this->load->model('M_kategori_syarat_wajib');
	}
	function index()
	{
		$role = $this->session->userdata('role');
		$img_user = $this->session->userdata('img_user');
		$foto = $img_user ? 'assets/static/img/photos/staff/' . $img_user : 'assets/static/img/user.png';
		$id = $this->input->post('id_kategori_syarat_wajib');
		$data = array(
			'judul' => "KATEGORI SPM WAJIB",
			'sub' => "Kategori SPM Wajib",
			'active_menu' => 'kategori_spm',
			'nama' => $this->session->userdata('nama'),
			'role' => $role,
			'id_user' => $this->session->userdata('id_user'),
			'foto' => $foto,
			'read' => $this->M_kategori_syarat_wajib->getAll(),
			'edit' => $this->M_kategori_syarat_wajib->edit($id),
		);
		$this->template->load('layout/components/layout', $this->view . 'read', $data);
	}
	public function save()
	{
		cek_csrf();

		$last_id = $this->M_kategori_syarat_wajib->getLastId();

		// jika tidak ditemukan, id diisi 1
		if ($last_id == null) {
			$id = 1;
		} else {
			// jika ditemukan, tambahkan 1 pada id terakhir
			$id = $last_id + 1;
		}
		$data = array(
			'id_kategori_syarat_wajib' => $id,
			'kategori' => $this->input->post('kategori'),
			'poin' => $this->input->post('poin'),
			'type' => $this->input->post('type'),
		);
		$this->M_kategori_syarat_wajib->save($data);
		redirect($this->redirect, 'refresh');
	}

	public function update()
	{
		cek_csrf();
		$id = $this->input->post('id_kategori_syarat_wajib');
		$data = array(
			'kategori' => $this->input->post('kategori'),
			'poin' => $this->input->post('poin'),
			'type' => $this->input->post('type'),
		);
		$this->M_kategori_syarat_wajib->update($id, $data);
		redirect($this->redirect, 'refresh');
	}
	public function delete()
	{
		cek_csrf();
		$id = $this->input->post('id_kategori_syarat_wajib');
		$data = array(
			//data akan dihapus sesuai uri->segment(3) yang dipilih
			'id_kategori_syarat_wajib' => $id
		);
		$this->M_kategori_syarat_wajib->delete($data);
		redirect($this->redirect, 'refresh');
	}
}
