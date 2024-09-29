<?php if (!defined('BASEPATH')) exit('No direct script access allowed');
class Dashboard extends CI_Controller
{
	private $view = "admin/pages/dashboard/";
	private $redirect = "Admin/Dashboard";
	public function __construct()
	{
		parent::__construct();
		//protected routes
		checkRole('Admin');
	}
	public function index()
	{
		$data = array(
			'judul' => "BERANDA",
			'sub' => "Beranda",
			'active_menu' => 'home',
			'id_user' => $this->session->userdata('id_user'),
			'role' => $this->session->userdata('role'),
			'nama' => $this->session->userdata('nama'),
			'email' => $this->session->userdata('email'),
			'foto' => $this->session->userdata('img_user'),
		);
		$this->template->load('layout/components/layout', $this->view . 'read', $data);

		// echo $this->session->userdata('alamat');
	}
}
