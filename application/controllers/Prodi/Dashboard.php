<?php if (!defined('BASEPATH')) exit('No direct script access allowed');
class Dashboard extends CI_Controller
{
	private $view = "prodi/pages/dashboard/";
	private $redirect = "Prodi/Dashboard";
	public function __construct()
	{
		parent::__construct();
		//protected routes
		checkRole('Prodi');
	}
	public function index()
	{
		$role = $this->session->userdata('role');
		$img_user = $this->session->userdata('img_user');
		$foto = $img_user ? 'assets/static/img/photos/staff/' . $img_user : 'assets/static/img/user.png';
		$data = array(
			'judul' => "DASHBOARD",
			'sub' => "Dashboard",
			'active_menu' => 'home',
			'nama' => $this->session->userdata('nama'),
			'role' => $role,
			'id_user' => $this->session->userdata('id_user'),
			'foto' => $foto,
		);
		$this->template->load('layout/components/layout', $this->view . 'read', $data);
	}
}
