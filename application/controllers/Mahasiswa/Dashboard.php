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
		$role = $this->session->userdata('role');
		$img_user = $this->session->userdata('img_user');
		$foto = $img_user ? 'assets/static/img/photos/' . $role . '/' . $img_user : 'assets/static/img/user.png';
		$id_user = $this->session->userdata('id_user');
		$data = array(
			'judul' => "DASHBOARD",
			'sub' => "Dashboard",
			'active_menu' => 'home',
			'nama' => $this->session->userdata('nama'),
			'role' => $role,
			'id_user' => $id_user,
			'foto' => $foto,
			'SpmPoin' => $this->M_spm->getPoinByUser($id_user),
			'spm' => $this->M_spm->GetByNim($id_user),
			'declinedSpm' => $this->M_spm->getPoinDecline($id_user),
			'etiquettePoin' => $this->M_etiquette->getPoinByUser($id_user),
		);
		$this->template->load('layout/components/layout', $this->view . 'read', $data);
	}
}
