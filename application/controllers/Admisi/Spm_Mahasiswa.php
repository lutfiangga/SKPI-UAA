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
		$this->load->model(array('M_syarat_wajib', 'M_profile'));
	}
	function index()
	{
		$img_user = $this->session->userdata('img_user');
		$foto = $img_user ? 'assets/static/img/photos/staff/' . $img_user : 'assets/static/img/user.png';

		$data = array(
			'judul' => "SPM MAHASISWA",
			'sub' => "SPM Mahasiswa",
			'active_menu' => 'spm_mhs',
			'nama' => $this->session->userdata('nama'),
			'role' => $this->session->userdata('role'),
			'id_user' => $this->session->userdata('id_user'),
			'foto' => $foto,
			'read' => $this->M_syarat_wajib->getSpm(),
		);
		// echo ($role);
		$this->template->load('layout/components/layout', $this->view . 'read', $data);
	}
	function detail($id)
	{
		$img_user = $this->session->userdata('img_user');
		$foto = $img_user ? 'assets/static/img/photos/staff/' . $img_user : 'assets/static/img/user.png';
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
			'spm' => $this->M_syarat_wajib->GetSyaratWajibMhs($id),
		);
		// $detail = $this->M_syarat_wajib->GetSyaratWajibMhs($id);
		// echo($detail['id_akun']);
		$this->template->load('layout/components/layout', $this->view . 'detail', $data);
	}

	public function accept($id)
	{
		$data = array(
			'keterangan' => '',
			'status' => 'diterima',
		);

		$this->M_syarat_wajib->update($id, $data);
		redirect($this->redirect);
	}
	public function decline()
	{
		cek_csrf();
		$id = $this->input->post('id_syarat_wajib');
		$data = array(
			'keterangan' => $this->input->post('keterangan'),
			'status' => 'ditolak',
		);

		$this->M_syarat_wajib->update($id, $data);
		redirect($this->redirect);
	}
}
