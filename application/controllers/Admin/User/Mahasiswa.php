<?php
defined('BASEPATH') or exit('No direct script access allowed');
class Mahasiswa extends CI_Controller
{
	private $view = "admin/pages/user/mahasiswa/";
	private $redirect = "Admin/User/Mahasiswa";
	public function __construct()
	{
		parent::__construct();
		// IsAdmin();
		$this->load->model(array('M_mahasiswa', 'M_prodi'));
		$this->load->helper('text');
		checkRole('Admin');
	}

	function index()
	{
		$role = $this->session->userdata('role');
		$img_user = $this->session->userdata('img_user');
		$foto = $img_user ? 'assets/static/img/photos/staff/' . $img_user : 'assets/static/img/user.png';
		$data = array(
			'judul' => "DATA MAHASISWA",
			'sub' => "Data Mahasiswa",
			'active_menu' => 'usr_mhs',
			'id_user' => $this->session->userdata('id_user'),
			'role' => $role,
			'nama' => $this->session->userdata('nama'),
			'foto' => $foto,
			'mahasiswa' => $this->M_mahasiswa->GetAllMhs(),
		);
		$this->template->load('layout/components/layout', $this->view . 'read', $data);
	}

	public function create()
	{
		$role = $this->session->userdata('role');
		$img_user = $this->session->userdata('img_user');
		$foto = $img_user ? 'assets/static/img/photos/staff/' . $img_user : 'assets/static/img/user.png';
		$data = array(
			'judul' => "DATA MAHASISWA",
			'sub' => "Data Mahasiswa",
			'active_menu' => 'usr_mhs',
			'id_user' => $this->session->userdata('id_user'),
			'role' => $role,
			'nama' => $this->session->userdata('nama'),
			'foto' => $foto,
			'prodi' => $this->M_prodi->getAll(),
		);
		$this->template->load('layout/components/layout', $this->view . 'create', $data);
	}

	public function save()
	{
		cek_csrf();
		$this->form_validation->set_rules(
			'nim',
			'NIM',
			'required|is_unique[mahasiswa.nim]',
			[
				'required' => 'NIM Wajib diisi!.',
				'is_unique' => 'NIM sudah terdaftar!'
			]
		);

		if ($this->form_validation->run() == FALSE) {
			$this->session->set_flashdata('create_error', validation_errors());
			redirect($this->redirect . '/create');
		} else {

			$data = array(
				'nim' => $this->security->xss_clean($this->input->post('nim')),
				'id_prodi' => $this->security->xss_clean($this->input->post('id_prodi')),
				'nama' => $this->security->xss_clean($this->input->post('nama')),
				'jenis_kelamin' => $this->security->xss_clean($this->input->post('jenis_kelamin')),
				'tgl_lahir' => !empty($this->input->post('tgl_lahir')) ? $this->input->post('tgl_lahir') : NULL,
				'email' => !empty($this->security->xss_clean($this->input->post('email'))) ? $this->security->xss_clean($this->input->post('email')) : NULL,
				'phone' => !empty($this->security->xss_clean($this->input->post('phone'))) ? $this->security->xss_clean($this->input->post('phone')) : NULL,
				'tahun_masuk' => $this->security->xss_clean($this->input->post('tahun_masuk')),
				'status_mahasiswa' => $this->security->xss_clean($this->input->post('status_mahasiswa')),
				'semester_diakui' => $this->security->xss_clean($this->input->post('semester_diakui')),
				'periode' => $this->security->xss_clean($this->input->post('periode')),
			);

			$this->M_mahasiswa->save($data);
			redirect($this->redirect, 'refresh');
		}
	}


	public function edit()
	{
		$id = $this->uri->segment(5);

		$role = $this->session->userdata('role');
		$img_user = $this->session->userdata('img_user');
		$foto = $img_user ? 'assets/static/img/photos/staff/' . $img_user : 'assets/static/img/user.png';
		$data = array(
			'judul' => "DATA MAHASISWA",
			'sub' => "Data Mahasiswa",
			'active_menu' => 'usr_mhs',
			'id_user' => $this->session->userdata('id_user'),
			'role' => $role,
			'nama' => $this->session->userdata('nama'),
			'foto' => $foto,
			'prodi' => $this->M_prodi->getAll(),
			'edit' => $this->M_mahasiswa->edit($id),
		);
		$this->template->load('layout/components/layout', $this->view . 'edit', $data);
	}
	public function update($id)
	{
		cek_csrf();
		$id = $this->uri->segment(5);
		$data = array(
			'id_prodi' => $this->security->xss_clean($this->input->post('id_prodi')),
			'nama' => $this->security->xss_clean($this->input->post('nama')),
			'jenis_kelamin' => $this->security->xss_clean($this->input->post('jenis_kelamin')),
			'tgl_lahir' => !empty($this->input->post('tgl_lahir')) ? $this->input->post('tgl_lahir') : NULL,
			'email' => !empty($this->security->xss_clean($this->input->post('email'))) ? $this->security->xss_clean($this->input->post('email')) : NULL,
			'phone' => !empty($this->security->xss_clean($this->input->post('phone'))) ? $this->security->xss_clean($this->input->post('phone')) : NULL,
			'tahun_masuk' => $this->security->xss_clean($this->input->post('tahun_masuk')),
			'tahun_lulus' => $this->security->xss_clean($this->input->post('tahun_lulus')),
			'status_mahasiswa' => $this->security->xss_clean($this->input->post('status_mahasiswa')),
			'semester_diakui' => $this->security->xss_clean($this->input->post('semester_diakui')),
			'periode' => $this->security->xss_clean($this->input->post('periode')),
		);

		$this->M_mahasiswa->update($id, $data);
		redirect($this->redirect, 'refresh');
	}

	public function delete()
	{
		cek_csrf();
		$id = $this->input->post('nim');
		$data = array(
			'nim' => $id
		);
		$this->M_mahasiswa->delete($data);
		redirect($this->redirect, 'refresh');
	}
}