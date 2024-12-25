<?php
defined('BASEPATH') or exit('No direct script access allowed');
class Mahasiswa extends CI_Controller
{
	private $view = "admin/pages/user/mahasiswa/";
	private $redirect = "Admin/User/Mahasiswa";
	public function __construct()
	{
		parent::__construct();
		$this->load->model(array('M_mahasiswa', 'M_prodi'));
		$this->load->helper('text');
		checkRole('Admin');
	}

	function index()
	{
		
		$img_user = $this->session->userdata('img_user');
			$foto = $img_user && file_exists('assets/static/img/photos/staff/' . $img_user) ? 'assets/static/img/photos/staff/' . $img_user : 'assets/static/img/user.png';
		$data = array(
			'judul' => "DATA MAHASISWA",
			'sub' => "Data Mahasiswa",
			'active_menu' => 'usr_mhs',
			'id_user' => $this->session->userdata('id_user'),
			'role' => $this->session->userdata('role'),
			'nama' => $this->session->userdata('nama'),
			'foto' => $foto,
			'mahasiswa' => $this->M_mahasiswa->GetAllMhs(),
		);
		$this->template->load('layout/components/layout', $this->view . 'read', $data);
	}

	public function create()
	{
		
		$img_user = $this->session->userdata('img_user');
			$foto = $img_user && file_exists('assets/static/img/photos/staff/' . $img_user) ? 'assets/static/img/photos/staff/' . $img_user : 'assets/static/img/user.png';
		$data = array(
			'judul' => "DATA MAHASISWA",
			'sub' => "Data Mahasiswa",
			'active_menu' => 'usr_mhs',
			'id_user' => $this->session->userdata('id_user'),
			'role' => $this->session->userdata('role'),
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
				'nomor_ijazah' => !empty($this->security->xss_clean($this->input->post('nomor_ijazah'))) ? $this->security->xss_clean($this->input->post('nomor_ijazah')) : NULL,
				'tempat_lahir' => !empty($this->security->xss_clean($this->input->post('tempat_lahir'))) ? $this->security->xss_clean($this->input->post('tempat_lahir')) : NULL,
			);

			$this->M_mahasiswa->save($data);
			$this->session->set_flashdata('create_success', 'Data berhasil ditambahkan!');
			redirect($this->redirect, 'refresh');
		}
	}


	public function edit()
	{
		$id = $this->uri->segment(5);

		
		$img_user = $this->session->userdata('img_user');
			$foto = $img_user && file_exists('assets/static/img/photos/staff/' . $img_user) ? 'assets/static/img/photos/staff/' . $img_user : 'assets/static/img/user.png';
		$data = array(
			'judul' => "DATA MAHASISWA",
			'sub' => "Data Mahasiswa",
			'active_menu' => 'usr_mhs',
			'id_user' => $this->session->userdata('id_user'),
			'role' => $this->session->userdata('role'),
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
			'nomor_ijazah' => !empty($this->security->xss_clean($this->input->post('nomor_ijazah'))) ? $this->security->xss_clean($this->input->post('nomor_ijazah')) : NULL,
			'tempat_lahir' => !empty($this->security->xss_clean($this->input->post('tempat_lahir'))) ? $this->security->xss_clean($this->input->post('tempat_lahir')) : NULL,
		);

		$this->M_mahasiswa->update($id, $data);
		$this->session->set_flashdata('update_success', 'Data berhasil diupdate!');
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
		$this->session->set_flashdata('delete_success', 'Data berhasil dihapus!');
		redirect($this->redirect, 'refresh');
	}
}
