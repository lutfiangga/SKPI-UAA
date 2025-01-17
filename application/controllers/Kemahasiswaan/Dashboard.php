<?php if (!defined('BASEPATH')) exit('No direct script access allowed');
class Dashboard extends CI_Controller
{
	private $view = "kemahasiswaan/pages/dashboard/";
	private $redirect = "Kemahasiswaan/Dashboard";
	public function __construct()
	{
		parent::__construct();
		//protected routes
		checkRole('Kemahasiswaan');
		$this->load->model(array('M_spm'));
	}
	public function index()
	{
		$img_user = $this->session->userdata('img_user');
		$foto = $img_user && file_exists('assets/static/img/photos/staff/' . $img_user) ? 'assets/static/img/photos/staff/' . $img_user : 'assets/static/img/user.png';
		$data = array(
			'judul' => "DASHBOARD",
			'sub' => "Dashboard",
			'active_menu' => 'home',
			'nama' => $this->session->userdata('nama'),
			'role' => $this->session->userdata('role'),
			'id_user' => $this->session->userdata('id_user'),
			'foto' => $foto,
			'spm' => $this->M_spm->countNotPending(),
			'countAcc' => $this->M_spm->countAccepted(),
			'countDecl' => $this->M_spm->countDeclined(),
			'countPend' => $this->M_spm->countPending(),
		);
		$this->template->load('layout/components/layout', $this->view . 'read', $data);
	}
}
