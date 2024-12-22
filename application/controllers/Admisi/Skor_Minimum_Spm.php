<?php
defined('BASEPATH') or exit('No direct script access allowed');
class Skor_Minimum_Spm extends CI_Controller
{
	private $view = "admisi/pages/skor_minimum_spm/";
	private $redirect = "Admisi/Skor_Minimum_Spm";
	public function __construct()
	{
		parent::__construct();
		//protected routes
		checkRole('Admisi');
		$this->load->model(array('M_skor_syarat_wajib', 'M_jenjang'));
	}
	function index()
	{
		$img_user = $this->session->userdata('img_user');
		$foto = $img_user ? 'assets/static/img/photos/staff/' . $img_user : 'assets/static/img/user.png';
		$data = array(
			'judul' => "SKOR MINIMUM SPM",
			'sub' => "Skor Minimum SPM",
			'active_menu' => 'skor_spm',
			'nama' => $this->session->userdata('nama'),
			'role' => $this->session->userdata('role'),
			'id_user' => $this->session->userdata('id_user'),
			'foto' => $foto,
			'read' => $this->M_skor_syarat_wajib->GetAll(),
		);
		$this->template->load('layout/components/layout', $this->view . 'read', $data);
	}

	function create()
	{
		$img_user = $this->session->userdata('img_user');
		$foto = $img_user ? 'assets/static/img/photos/staff/' . $img_user : 'assets/static/img/user.png';
		$data = array(
			'judul' => "SKOR MINIMUM SPM",
			'sub' => "Skor Minimum SPM",
			'active_menu' => 'skor_spm',
			'nama' => $this->session->userdata('nama'),
			'role' => $this->session->userdata('role'),
			'id_user' => $this->session->userdata('id_user'),
			'foto' => $foto,
			'jenjang' => $this->M_jenjang->GetAll(),
		);
		$this->template->load('layout/components/layout', $this->view . 'create', $data);
	}
	function edit($id)
	{
		$img_user = $this->session->userdata('img_user');
		$foto = $img_user ? 'assets/static/img/photos/staff/' . $img_user : 'assets/static/img/user.png';
		$data = array(
			'judul' => "SKOR MINIMUM SPM",
			'sub' => "Skor Minimum SPM",
			'active_menu' => 'skor_spm',
			'nama' => $this->session->userdata('nama'),
			'role' => $this->session->userdata('role'),
			'id_user' => $this->session->userdata('id_user'),
			'foto' => $foto,
			'edit' => $this->M_skor_syarat_wajib->edit($id),
			'jenjang' => $this->M_jenjang->GetAll(),
		);
		$this->template->load('layout/components/layout', $this->view . 'edit', $data);
	}
	public function save()
	{
		cek_csrf();
		$this->form_validation->set_rules('id_jenjang', 'Jenjang', 'required', ['required' => 'Jenjang Wajib diisi!']);
		$this->form_validation->set_rules('angkatan', 'Angkatan', 'required', ['required' => 'Angkatan Wajib diisi!']);
		$this->form_validation->set_rules('parameter', 'Parameter', 'required', ['required' => 'Parameter Wajib diisi!']);
		$this->form_validation->set_rules('skor', 'Skor', 'required', ['required' => 'Skor Wajib diisi!']);

		if ($this->form_validation->run() == FALSE) {
			$this->session->set_flashdata('create_error', validation_errors());
			redirect($this->redirect . '/create');
		} else {
			$data = array(
				'id_skor' => generate_uuid_v7(),
				'id_jenjang' => $this->security->xss_clean($this->input->post('id_jenjang')),
				'parameter' => $this->security->xss_clean($this->input->post('parameter')),
				'angkatan' => $this->security->xss_clean($this->input->post('angkatan')),
				'skor' => $this->security->xss_clean($this->input->post('skor')),
			);
			$this->M_skor_syarat_wajib->save($data);
			$this->session->set_flashdata('create_success', 'Data berhasil ditambahkan!');
			redirect($this->redirect, 'refresh');
		}
	}

	public function update($id)
	{
		cek_csrf();
		$data = array(
			'id_jenjang' => $this->security->xss_clean($this->input->post('id_jenjang')),
			'parameter' => $this->security->xss_clean($this->input->post('parameter')),
			'angkatan' => $this->security->xss_clean($this->input->post('angkatan')),
			'skor' => $this->security->xss_clean($this->input->post('skor')),
		);
		$this->M_skor_syarat_wajib->update($id, $data);
		$this->session->set_flashdata('update_success', 'Data berhasil diupdate!');
		redirect($this->redirect, 'refresh');
	}
	public function delete()
	{
		cek_csrf();
		$id = $this->security->xss_clean($this->input->post('id_skor'));
		$data = array(
			'id_skor' => $id
		);
		$this->M_skor_syarat_wajib->delete($data);
		$this->session->set_flashdata('delete_success', 'Data berhasil dihapus!');
		redirect($this->redirect, 'refresh');
	}
}
