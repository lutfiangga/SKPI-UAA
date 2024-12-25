<?php
defined('BASEPATH') or exit('No direct script access allowed');
class Item_Cpl extends CI_Controller
{
	private $view = "prodi/pages/item_cpl/";
	private $redirect = "Prodi/Item_Cpl";
	public function __construct()
	{
		parent::__construct();
		//protected routes
		checkRole('Prodi');
		$this->load->model(array('M_cpl', 'M_prodi', 'M_kategori_cpl'));
	}
	function index()
	{
		
		$img_user = $this->session->userdata('img_user');
		$foto = $img_user && file_exists('assets/static/img/photos/staff/' . $img_user) ? 'assets/static/img/photos/staff/' . $img_user : 'assets/static/img/user.png';
		$data = array(
			'judul' => "ITEM CPL",
			'sub' => "Item CPL",
			'active_menu' => 'item_cpl',
			'nama' => $this->session->userdata('nama'),
			'role' => $this->session->userdata('role'),
			'id_user' => $this->session->userdata('id_user'),
			'foto' => $foto,
			'read' => $this->M_cpl->GetAll(),
		);
		$this->template->load('layout/components/layout', $this->view . 'read', $data);
	}
	function create()
	{
		
		$img_user = $this->session->userdata('img_user');
		$foto = $img_user && file_exists('assets/static/img/photos/staff/' . $img_user) ? 'assets/static/img/photos/staff/' . $img_user : 'assets/static/img/user.png';
		$data = array(
			'judul' => "ITEM CPL",
			'sub' => "Item CPL",
			'active_menu' => 'item_cpl',
			'nama' => $this->session->userdata('nama'),
			'role' => $this->session->userdata('role'),
			'id_user' => $this->session->userdata('id_user'),
			'foto' => $foto,
			'read' => $this->M_cpl->GetAll(),
			'prodi' => $this->M_prodi->GetAll(),
			'cpl' => $this->M_kategori_cpl->GetAll(),
		);
		$this->template->load('layout/components/layout', $this->view . 'create', $data);
	}

	public function saved()
	{
		cek_csrf();
		$data = array(
			'id_cpl' => generate_uuid_v7(),
			'id_prodi' => $this->security->xss_clean($this->input->post('id_prodi')),
			'id_kategori_cpl' => $this->security->xss_clean($this->input->post('id_kategori_cpl')),
			'konten' => $this->security->xss_clean($this->input->post('konten')),
		);
		$this->M_cpl->save($data);
		$this->session->set_flashdata('create_success', 'Data berhasil ditambahkan!');
		redirect($this->redirect, 'refresh');
	}

	public function save()
	{
		cek_csrf();

		// Ambil data dari input form
		$id_prodi = $this->security->xss_clean($this->input->post('id_prodi'));
		$id_kategori_cpl = $this->security->xss_clean($this->input->post('id_kategori_cpl'));
		$konten = $this->security->xss_clean($this->input->post('konten'));

		// Looping untuk menyimpan setiap item
		$data = [];
		for ($i = 0; $i < count($konten); $i++) {
			$data[] = array(
				'id_cpl' => generate_uuid_v7(),
				'id_prodi' => $id_prodi,
				'id_kategori_cpl' => $id_kategori_cpl,
				'konten' => $konten[$i],
			);
		}

		$this->M_cpl->save_batch($data);
		$this->session->set_flashdata('create_success', 'Data berhasil ditambahkan!');
		redirect($this->redirect, 'refresh');
	}

	function edit()
	{
		$id = $this->uri->segment(4);
		
		$img_user = $this->session->userdata('img_user');
		$foto = $img_user && file_exists('assets/static/img/photos/staff/' . $img_user) ? 'assets/static/img/photos/staff/' . $img_user : 'assets/static/img/user.png';
		$data = array(
			'judul' => "ITEM CPL",
			'sub' => "Item CPL",
			'active_menu' => 'item_cpl',
			'nama' => $this->session->userdata('nama'),
			'role' => $this->session->userdata('role'),
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
		$this->session->set_flashdata('update_success', 'Data berhasil diupdate!');
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
		$this->session->set_flashdata('delete_success', 'Data berhasil dihapus!');
		redirect($this->redirect, 'refresh');
	}
}
