<?php
defined('BASEPATH') or exit('No direct script access allowed');
class Periode_Spm extends CI_Controller
{
	private $view = "kemahasiswaan/pages/periode_spm/";
	private $redirect = "Kemahasiswaan/Periode_Spm";
	public function __construct()
	{
		parent::__construct();
		//protected routes
		checkRole('Kemahasiswaan');
		$this->load->model('M_periode_spm');
	}
	function index()
	{
		$img_user = $this->session->userdata('img_user');
		$foto = $img_user && file_exists('assets/static/img/photos/staff/' . $img_user) ? 'assets/static/img/photos/staff/' . $img_user : 'assets/static/img/user.png';
		$data = array(
			'judul' => "PERIODE SPM",
			'sub' => "Periode SPM",
			'active_menu' => 'periode_spm',
			'nama' => $this->session->userdata('nama'),
			'role' => $this->session->userdata('role'),
			'id_user' => $this->session->userdata('id_user'),
			'foto' => $foto,
			'read' => $this->M_periode_spm->GetAll(),
		);
		$this->template->load('layout/components/layout', $this->view . 'read', $data);
	}

	function create()
	{
		$img_user = $this->session->userdata('img_user');
		$foto = $img_user && file_exists('assets/static/img/photos/staff/' . $img_user) ? 'assets/static/img/photos/staff/' . $img_user : 'assets/static/img/user.png';
		$data = array(
			'judul' => "PERIODE SPM",
			'sub' => "Periode SPM",
			'active_menu' => 'periode_spm',
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
			'judul' => "PERIODE SPM",
			'sub' => "Periode SPM",
			'active_menu' => 'periode_spm',
			'nama' => $this->session->userdata('nama'),
			'role' => $this->session->userdata('role'),
			'id_user' => $this->session->userdata('id_user'),
			'foto' => $foto,
			'edit' => $this->M_periode_spm->edit($id),
		);
		$this->template->load('layout/components/layout', $this->view . 'edit', $data);
	}
	public function save()
	{
		cek_csrf();
		$this->form_validation->set_rules('periode', 'Periode', 'required', ['required' => 'Periode Wajib diisi!']);
		$this->form_validation->set_rules('periode_kegiatan', 'Periode Kegiatan', 'required', ['required' => 'Angkatan Wajib diisi!']);

		if ($this->form_validation->run() == FALSE) {
			$this->session->set_flashdata('create_error', validation_errors());
			redirect($this->redirect . '/create');
		} else {
			$data = array(
				'id_periode' => generate_uuid_v7(),
				'periode' => $this->security->xss_clean($this->input->post('periode')),
				'periode_kegiatan' => $this->security->xss_clean($this->input->post('periode_kegiatan')),
			);
			$this->M_periode_spm->save($data);
			$this->session->set_flashdata('create_success', 'Data berhasil ditambahkan!');
			redirect($this->redirect, 'refresh');
		}
	}

	public function update($id)
	{
		cek_csrf();
		$data = array(
			'periode' => $this->security->xss_clean($this->input->post('periode')),
			'periode_kegiatan' => $this->security->xss_clean($this->input->post('periode_kegiatan')),
		);
		$this->M_periode_spm->update($id, $data);
		$this->session->set_flashdata('update_success', 'Data berhasil diupdate!');
		redirect($this->redirect, 'refresh');
	}
	public function delete()
	{
		cek_csrf();
		$id = $this->security->xss_clean($this->input->post('id_periode'));
		$data = array(
			'id_periode' => $id
		);
		$this->M_periode_spm->delete($data);
		$this->session->set_flashdata('delete_success', 'Data berhasil dihapus!');
		redirect($this->redirect, 'refresh');
	}
}
