<?php if (!defined('BASEPATH')) exit('No direct script access allowed');
class Dashboard extends CI_Controller
{
	private $view = "admin/pages/dashboard/";
	private $redirect = "Admin/Dashboard";
	public function __construct()
	{
		parent::__construct();
		//protected routes
		checkUserRole('Akademik');
	}
	public function index()
	{
		$data = array(
			'judul' => "BERANDA",
			'sub' => "Beranda",
			'active_menu' => 'home',
			'id_user' => $this->session->userdata('id_user'),
			'nama' => $this->session->userdata('nama'),
			'username' => $this->session->userdata('username'),
			'email' => $this->session->userdata('email'),
			'password' => $this->session->userdata('password'),
			'foto' => $this->session->userdata('img_user'),
		);
		$this->template->load('admin/layout/layout', $this->view . 'read', $data);

		// echo $this->session->userdata('alamat');
	}
}
