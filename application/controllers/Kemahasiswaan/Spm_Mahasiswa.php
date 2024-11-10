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
		$foto = $img_user ? 'assets/static/img/photos/staff/' . $img_user : 'assets/static/img/user.png';
		$data = array(
			'judul' => "SPM MAHASISWA",
			'sub' => "SPM Mahasiswa",
			'active_menu' => 'spm_mhs',
			'nama' => $this->session->userdata('nama'),
			'role' => $role,
			'id_user' => $this->session->userdata('id_user'),
			'foto' => $foto,
			'read' => $this->M_spm->getAll(),
		);
		$this->template->load('layout/components/layout', $this->view . 'read', $data);
	}

	public function accept($id)
	{
		$data = array(
			'keterangan' => '',
			'status' => 'diterima',
		);

		$this->M_spm->update($id, $data);
		redirect($this->redirect);
	}
	public function decline()
	{
		cek_csrf();
		$id = $this->input->post('id_spm');
		$data = array(
			'keterangan' => $this->security->xss_clean($this->input->post('keterangan')),
			'status' => 'ditolak',
		);

		$this->M_spm->update($id, $data);
		redirect($this->redirect);
	}
}
