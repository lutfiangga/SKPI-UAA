<?php if (!defined('BASEPATH')) exit('No direct script access allowed');
class Dashboard extends CI_Controller
{
	private $view = "admisi/pages/dashboard/";
	private $redirect = "Admisi/Dashboard";
	public function __construct()
	{
		parent::__construct();
		//protected routes
		checkRole('Admisi');
		$this->load->model(array('M_syarat_wajib'));
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
			'spm' => $this->M_syarat_wajib->countNotPending(),
			'countAcc' => $this->M_syarat_wajib->countAccepted(),
			'countDecl' => $this->M_syarat_wajib->countDeclined(),
			'countPend' => $this->M_syarat_wajib->countPending(),
		);
		$this->template->load('layout/components/layout', $this->view . 'read', $data);
	}
}
