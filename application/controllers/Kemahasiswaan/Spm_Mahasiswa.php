<?php
defined('BASEPATH') or exit('No direct script access allowed');
class SPM_Mahasiswa extends CI_Controller
{
	private $view = "kemahasiswaan/pages/spm_mhs/";
	private $redirect = "Kemahasiswaan/Spm_Mahasiswa";
	public function __construct()
	{
		parent::__construct();
		//protected routes
		checkRole('Kemahasiswaan');
		$this->load->model('M_spm');
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
			// from tabel auth
			'nama' => $this->session->userdata('nama'),
			'role' => $role,
			// from tabel user
			'id_user' => $this->session->userdata('id_user'),
			'foto' => $foto,
			'read' => $this->M_spm->getAll(),
		);
		$this->template->load('layout/components/layout', $this->view . 'read', $data);
	}

	public function accept($kd)
	{
		$data = array(
			'keterangan' => '',
			'status' => 'diterima',
		);

		$this->M_spm->update($kd, $data);
		redirect($this->redirect);
	}
	public function decline($kd)
	{
		cek_csrf();
		$data = array(
			'keterangan' => $this->input->post('keterangan'),
			'status' => 'ditolak',
		);

		$this->M_spm->update($kd, $data);
		redirect($this->redirect);
	}
}
