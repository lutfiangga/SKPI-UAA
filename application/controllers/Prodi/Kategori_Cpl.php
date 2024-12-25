<?php
defined('BASEPATH') or exit('No direct script access allowed');
class Kategori_Cpl extends CI_Controller
{
	private $view = "prodi/pages/kategori_cpl/";
	private $redirect = "Prodi/Kategori_Cpl";
	public function __construct()
	{
		parent::__construct();
		//protected routes
		checkRole('Prodi');
		$this->load->model('M_kategori_cpl');
	}
	function index()
	{

		$img_user = $this->session->userdata('img_user');
		$foto = $img_user && file_exists('assets/static/img/photos/staff/' . $img_user) ? 'assets/static/img/photos/staff/' . $img_user : 'assets/static/img/user.png';
		$data = array(
			'judul' => "KATEGORI CPL",
			'sub' => "Kategori CPL",
			'active_menu' => 'kategori_cpl',
			'nama' => $this->session->userdata('nama'),
			'role' => $this->session->userdata('role'),
			'id_user' => $this->session->userdata('id_user'),
			'foto' => $foto,
			'read' => $this->M_kategori_cpl->getAll(),
		);
		$this->template->load('layout/components/layout', $this->view . 'read', $data);
	}
	function create()
	{

		$img_user = $this->session->userdata('img_user');
		$foto = $img_user && file_exists('assets/static/img/photos/staff/' . $img_user) ? 'assets/static/img/photos/staff/' . $img_user : 'assets/static/img/user.png';
		$data = array(
			'judul' => "KATEGORI CPL",
			'sub' => "Kategori CPL",
			'active_menu' => 'kategori_cpl',
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
			'judul' => "KATEGORI CPL",
			'sub' => "Kategori CPL",
			'active_menu' => 'kategori_cpl',
			'nama' => $this->session->userdata('nama'),
			'role' => $this->session->userdata('role'),
			'id_user' => $this->session->userdata('id_user'),
			'foto' => $foto,
			'edit' => $this->M_kategori_cpl->edit($id),
		);
		$this->template->load('layout/components/layout', $this->view . 'edit', $data);
	}
	public function save()
	{
		cek_csrf();
		$this->form_validation->set_rules(
			'kategori',
			'Kategori CPL',
			'required|is_unique[kategori_cpl.kategori]',
			[
				'required' => 'Kategori CPL Wajib diisi!',
				'is_unique' => 'Kategori CPL sudah terdaftar!'
			]
		);

		if ($this->form_validation->run() == FALSE) {
			$this->session->set_flashdata('create_error', validation_errors());
			redirect($this->redirect . '/create');
		} else {
			$data = array(
				'id_kategori_cpl' => generate_uuid_v7(),
				'kategori' => $this->security->xss_clean($this->input->post('kategori')),
			);
			$this->M_kategori_cpl->save($data);
			$this->session->set_flashdata('create_success', 'Data berhasil ditambahkan!');
			redirect($this->redirect, 'refresh');
		}
	}

	public function update()
	{
		cek_csrf();
		$id = $this->uri->segment(4);
		$this->form_validation->set_rules(
			'kategori',
			'Kategori CPL',
			'required|is_unique[kategori_cpl.kategori]',
			[
				'required' => 'Kategori CPL Wajib diisi!',
				'is_unique' => 'Kategori CPL sudah terdaftar!'
			]
		);

		if ($this->form_validation->run() == FALSE) {
			$this->session->set_flashdata('update_error', validation_errors());
			redirect($this->redirect . '/edit');
		} else {
			$data = array(
				'kategori' => $this->security->xss_clean($this->input->post('kategori')),
			);
			$this->M_kategori_cpl->update($id, $data);
			$this->session->set_flashdata('update_success', 'Data berhasil diupdate!');
			redirect($this->redirect, 'refresh');
		}
	}
	public function delete()
	{
		cek_csrf();
		$id = $this->input->post('id_kategori_cpl');
		$data = array(
			'id_kategori_cpl' => $id
		);
		$this->M_kategori_cpl->delete($data);
		$this->session->set_flashdata('delete_success', 'Data berhasil dihapus!');
		redirect($this->redirect, 'refresh');
	}
}
