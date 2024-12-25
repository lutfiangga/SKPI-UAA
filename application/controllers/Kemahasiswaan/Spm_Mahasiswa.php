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
		$this->load->model(array('M_spm', 'M_profile'));
	}
	function index()
	{
		$img_user = $this->session->userdata('img_user');
		$foto = $img_user && file_exists('assets/static/img/photos/staff/' . $img_user) ? 'assets/static/img/photos/staff/' . $img_user : 'assets/static/img/user.png';

		$data = array(
			'judul' => "SPM MAHASISWA",
			'sub' => "SPM Mahasiswa",
			'active_menu' => 'spm_mhs',
			'nama' => $this->session->userdata('nama'),
			'role' => $this->session->userdata('role'),
			'id_user' => $this->session->userdata('id_user'),
			'foto' => $foto,
			'read' => $this->M_spm->getSpmMhs(),
		);
		$this->template->load('layout/components/layout', $this->view . 'read', $data);
	}

	function detail($id)
	{
		$img_user = $this->session->userdata('img_user');
		$foto = $img_user && file_exists('assets/static/img/photos/staff/' . $img_user) ? 'assets/static/img/photos/staff/' . $img_user : 'assets/static/img/user.png';
		// $id = $this->uri->segment(4);

		$data = array(
			'judul' => "SPM MAHASISWA",
			'sub' => "SPM Mahasiswa",
			'active_menu' => 'spm_mhs',
			'nama' => $this->session->userdata('nama'),
			'role' => $this->session->userdata('role'),
			'id_user' => $this->session->userdata('id_user'),
			'foto' => $foto,
			'mhs' => $this->M_profile->getById($id),
			'spm' => $this->M_spm->getSpm($id),
		);
		$this->template->load('layout/components/layout', $this->view . 'detail', $data);
	}

	public function accept($id_spm, $id_akun)
	{
		$id_akun = $this->uri->segment(5);
		$data = array(
			'keterangan' => '',
			'status' => 'diterima',
		);

		$this->M_spm->update($id_spm, $data);
		redirect($this->redirect . '/detail/' . $id_akun);
	}
	public function decline()
	{
		cek_csrf();
		$id_akun = $this->uri->segment(5);
		$id = $this->security->xss_clean($this->input->post('id_spm'));
		$data = array(
			'keterangan' => $this->security->xss_clean($this->input->post('keterangan')),
			'status' => 'ditolak',
		);
		// echo $id_akun;

		$this->M_spm->update($id, $data);
		redirect($this->redirect . '/detail/' . $id_akun);
	}
}
