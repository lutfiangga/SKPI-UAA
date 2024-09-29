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
	}
	public function index()
	{
		$data = array(
			'judul' => "DASHBOARD",
			'sub' => "Dashboard",
			'active_menu' => 'home',
			// from tabel auth
			'nama' => $this->session->userdata('nama'),
			'email' => $this->session->userdata('email'),
			'role' => $this->session->userdata('role'),
			// from tabel user
			'id_user' => $this->session->userdata('id_user'),
			'alamat' => $this->session->userdata('alamat'),
			'foto' => $this->session->userdata('img_user'),
		);
		$this->template->load('layout/components/layout', $this->view . 'read', $data);

		// echo $this->session->userdata('nama');
	}
}
