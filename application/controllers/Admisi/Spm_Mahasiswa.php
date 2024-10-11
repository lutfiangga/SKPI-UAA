<?php
defined('BASEPATH') or exit('No direct script access allowed');
class SPM_Mahasiswa extends CI_Controller
{
	private $view = "admisi/pages/spm_mhs/";
	private $redirect = "Admisi/Spm_Mahasiswa";
	public function __construct()
	{
		parent::__construct();
		//protected routes
		checkRole('Admisi');
		$this->load->model('M_syarat_wajib');
	}
	function index()
	{
		$role = $this->session->userdata('role');
		$img_user = $this->session->userdata('img_user');
		$foto = $img_user ? 'assets/static/img/photos/' . $role . '/' . $img_user : 'assets/static/img/user.png';
		$data = array(
			'judul' => "SPM MAHASISWA",
			'sub' => "SPM Mahasiswa",
			'active_menu' => 'spm_mhs',
			'nama' => $this->session->userdata('nama'),
			'role' => $role,
			'id_user' => $this->session->userdata('id_user'),
			'foto' => $foto,
			'read' => $this->M_syarat_wajib->getAll(),
		);
		$this->template->load('layout/components/layout', $this->view . 'read', $data);
	}

	public function accept($kd)
	{
		$data = array(
			'keterangan' => '',
			'status' => 'diterima',
		);

		$this->M_syarat_wajib->update($kd, $data);
		redirect($this->redirect);
	}
	public function decline($kd)
	{
		cek_csrf();
		$data = array(
			'keterangan' => $this->input->post('keterangan'),
			'status' => 'ditolak',
		);

		$this->M_syarat_wajib->update($kd, $data);
		redirect($this->redirect);
	}
}
