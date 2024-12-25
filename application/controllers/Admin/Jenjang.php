<?php
defined('BASEPATH') or exit('No direct script access allowed');
class Jenjang extends CI_Controller
{
	private $view = "admin/pages/jenjang/";
	private $redirect = "Admin/jenjang";
	public function __construct()
	{
		parent::__construct();
		$this->load->model('M_jenjang');
		checkRole('Admin');
	}

	function index()
	{
		$img_user = $this->session->userdata('img_user');
		$foto = $img_user && file_exists('assets/static/img/photos/staff/' . $img_user) ? 'assets/static/img/photos/staff/' . $img_user : 'assets/static/img/user.png';
		$data = array(
			'judul' => "DATA JENJANG",
			'sub' => "Data Jenjang",
			'active_menu' => 'jenjang',
			'id_user' => $this->session->userdata('id_user'),
			'role' => $this->session->userdata('role'),
			'nama' => $this->session->userdata('nama'),
			'foto' => $foto,
			'read' => $this->M_jenjang->GetAll(),
		);
		$this->template->load('layout/components/layout', $this->view . 'read', $data);
	}
	function create()
	{
		$img_user = $this->session->userdata('img_user');
		$foto = $img_user && file_exists('assets/static/img/photos/staff/' . $img_user) ? 'assets/static/img/photos/staff/' . $img_user : 'assets/static/img/user.png';
		$data = array(
			'judul' => "DATA JENJANG",
			'sub' => "Data Jenjang",
			'active_menu' => 'jenjang',
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
			'judul' => "DATA JENJANG",
			'sub' => "Data Jenjang",
			'active_menu' => 'jenjang',
			'id_user' => $this->session->userdata('id_user'),
			'role' => $this->session->userdata('role'),
			'nama' => $this->session->userdata('nama'),
			'foto' => $foto,
			'edit' => $this->M_jenjang->edit($id),
		);
		$this->template->load('layout/components/layout', $this->view . 'edit', $data);
	}

	public function save()
	{
		cek_csrf();
		$this->form_validation->set_rules(
			'jenjang',
			'Jenjang',
			'required|is_unique[jenjang.tingkat_jenjang]',
			[
				'required' => 'Tingkat janjang Wajib diisi!',
				'is_unique' => 'Tingkat janjang sudah terdaftar!'
			]
		);

		if ($this->form_validation->run() == FALSE) {
			$this->session->set_flashdata('create_error', validation_errors());
			redirect($this->redirect);
		} else {
			$data = array(
				'id_jenjang' => generate_uuid_v7(),
				'jenjang' => $this->security->xss_clean($this->input->post('jenjang')),
				'tingkat_jenjang' => $this->security->xss_clean($this->input->post('tingkat_jenjang')),
				'jenjang_lanjutan' => $this->security->xss_clean($this->input->post('jenjang_lanjutan')),
				'syarat_penerimaan' => $this->security->xss_clean($this->input->post('syarat_penerimaan')),
				'jenjang_kualifikasi' => $this->security->xss_clean($this->input->post('jenjang_kualifikasi')),
			);

			$this->M_jenjang->save($data);
			$this->session->set_flashdata('create_success', 'Data berhasil ditambahkan!');
			redirect($this->redirect, 'refresh');
		}
	}

	public function update()
	{
		cek_csrf();
		$id = $this->uri->segment(4);
		$this->form_validation->set_rules(
			'jenjang',
			'Jenjang',
			'required|is_unique[jenjang.tingkat_jenjang]',
			[
				'required' => 'Tingkat janjang Wajib diisi!',
				'is_unique' => 'Tingkat janjang sudah terdaftar!'
			]
		);
		if ($this->form_validation->run() == FALSE) {
			$this->session->set_flashdata('update_error', validation_errors());
			redirect($this->redirect);
		} else {
			$data = array(
				'jenjang' => $this->security->xss_clean($this->input->post('jenjang')),
				'tingkat_jenjang' => $this->security->xss_clean($this->input->post('tingkat_jenjang')),
				'jenjang_lanjutan' => $this->security->xss_clean($this->input->post('jenjang_lanjutan')),
				'syarat_penerimaan' => $this->security->xss_clean($this->input->post('syarat_penerimaan')),
				'jenjang_kualifikasi' => $this->security->xss_clean($this->input->post('jenjang_kualifikasi')),
			);
			$this->M_jenjang->update($id, $data);
			$this->session->set_flashdata('update_success', 'Data berhasil diupdate');
			redirect($this->redirect, 'refresh');
		}
	}

	public function delete()
	{
		cek_csrf();
		$id = $this->input->post('id_jenjang');
		$data = array(
			'id_jenjang' => $id
		);
		$this->M_jenjang->delete($data);
		$this->session->set_flashdata('delete_success', 'Data berhasil dihapus!');
		redirect($this->redirect, 'refresh');
	}
}
