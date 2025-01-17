<?php if (!defined('BASEPATH')) exit('No direct script access allowed');
class Dashboard extends CI_Controller
{
	private $view = "mahasiswa/pages/dashboard/";
	private $redirect = "Mahasiswa/Dashboard";
	public function __construct()
	{
		parent::__construct();
		//protected routes
		checkRole('Mahasiswa');
		$this->load->model(array('M_spm', 'M_etiquette'));
	}
	public function index()
	{
		$img_user = $this->session->userdata('img_user');
		$foto = $img_user && file_exists('assets/static/img/photos/mahasiswa/' . $img_user) ? 'assets/static/img/photos/mahasiswa/' . $img_user : 'assets/static/img/user.png';
		$id = $this->session->userdata('id_akun');
		$nim = $this->session->userdata('id_user');
		$data = array(
			'judul' => "DASHBOARD",
			'sub' => "Dashboard",
			'active_menu' => 'home',
			'nama' => $this->session->userdata('nama'),
			'role' => $this->session->userdata('role'),
			'id_user' => $nim,
			'foto' => $foto,
			'SpmPoin' => $this->M_spm->getPoinByUser($id),
			'spm' => $this->M_spm->GetByNim($id),
			'spmMhs' => $this->M_spm->GetTotalByNim($id),
			'declinedSpm' => $this->M_spm->getPoinDecline($id),
			'etiquettePoin' => $this->M_etiquette->getPoinByUser($nim),
		);
		$this->template->load('layout/components/layout', $this->view . 'read', $data);
	}
}
