<?php
defined('BASEPATH') or exit('No direct script access allowed');
class Akreditasi extends CI_Controller
{
	private $view = "admin/pages/akreditasi/";
	private $redirect = "Admin/Akreditasi";
	public function __construct()
	{
		parent::__construct();
		// IsAdmin();
		$this->load->model('M_akreditasi');
		checkRole('Admin');
	}

	function index()
	{
		$img_user = $this->session->userdata('img_user');
		$foto = $img_user && file_exists('assets/static/img/photos/staff/' . $img_user) ? 'assets/static/img/photos/staff/' . $img_user : 'assets/static/img/user.png';
		$data = array(
			'judul' => "DATA AKREDITASI",
			'sub' => "Data Akreditasi",
			'active_menu' => 'akreditasi',
			'id_user' => $this->session->userdata('id_user'),
			'role' => $this->session->userdata('role'),
			'nama' => $this->session->userdata('nama'),
			'foto' => $foto,
			'read' => $this->M_akreditasi->GetAll(),
		);
		$this->template->load('layout/components/layout', $this->view . 'read', $data);
	}
	function create()
	{
		$img_user = $this->session->userdata('img_user');
		$foto = $img_user && file_exists('assets/static/img/photos/staff/' . $img_user) ? 'assets/static/img/photos/staff/' . $img_user : 'assets/static/img/user.png';
		$data = array(
			'judul' => "DATA AKREDITASI",
			'sub' => "Data Akreditasi",
			'active_menu' => 'akreditasi',
			'id_user' => $this->session->userdata('id_user'),
			'role' => $this->session->userdata('role'),
			'nama' => $this->session->userdata('nama'),
			'foto' => $foto,
		);
		$this->template->load('layout/components/layout', $this->view . 'create', $data);
	}
	function edit($id)
	{
		$img_user = $this->session->userdata('img_user');
		$foto = $img_user && file_exists('assets/static/img/photos/staff/' . $img_user) ? 'assets/static/img/photos/staff/' . $img_user : 'assets/static/img/user.png';
		$data = array(
			'judul' => "DATA AKREDITASI",
			'sub' => "Data Akreditasi",
			'active_menu' => 'akreditasi',
			'id_user' => $this->session->userdata('id_user'),
			'role' => $this->session->userdata('role'),
			'nama' => $this->session->userdata('nama'),
			'foto' => $foto,
			'edit' => $this->M_akreditasi->edit($id),
		);
		$this->template->load('layout/components/layout', $this->view . 'edit', $data);
	}
	public function save()
	{
		cek_csrf();
		$this->form_validation->set_rules(
			'akreditasi',
			'Akreditasi',
			'required|is_unique[akreditasi.akreditasi]',
			[
				'required' => 'Akreditasi Wajib diisi!',
				'is_unique' => 'Akreditasi sudah terdaftar!'
			]
		);

		if ($this->form_validation->run() == FALSE) {
			$this->session->set_flashdata('create_error', validation_errors());
			redirect($this->redirect);
		} else {
			$data = array(
				'id_akreditasi' => generate_uuid_v7(),
				'akreditasi' => $this->security->xss_clean($this->input->post('akreditasi')),
			);

			$this->M_akreditasi->save($data);
			$this->session->set_flashdata('create_success', 'Data berhasil ditambahkan!');
			redirect($this->redirect, 'refresh');
		}
	}

	public function update()
	{
		cek_csrf();
		$id = $this->uri->segment(4);

		$data = array(
			'akreditasi' => $this->security->xss_clean($this->input->post('akreditasi')),
		);
		$this->M_akreditasi->update($id, $data);
		$this->session->set_flashdata('update_success', 'Data berhasil diupdate!');
		redirect($this->redirect, 'refresh');
	}

	public function delete()
	{
		cek_csrf();
		$id = $this->input->post('id_akreditasi');
		$data = array(
			'id_akreditasi' => $id
		);
		$this->M_akreditasi->delete($data);
		$this->session->set_flashdata('delete_success', 'Data berhasil dihapus!');
		redirect($this->redirect, 'refresh');
	}
}
