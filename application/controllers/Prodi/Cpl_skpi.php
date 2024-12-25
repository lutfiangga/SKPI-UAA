<?php
defined('BASEPATH') or exit('No direct script access allowed');
class Cpl_Skpi extends CI_Controller
{
	private $view = "prodi/pages/cpl_skpi/";
	private $redirect = "Prodi/Cpl_Skpi";
	public function __construct()
	{
		parent::__construct();
		//protected routes
		checkRole('Prodi');
		$this->load->model(array('M_cpl', 'M_prodi', 'M_kategori_cpl'));
	}
	function index()
	{
		
		$img_user = $this->session->userdata('img_user');
		$foto = $img_user && file_exists('assets/static/img/photos/staff/' . $img_user) ? 'assets/static/img/photos/staff/' . $img_user : 'assets/static/img/user.png';
		$data = array(
			'judul' => "CPL SKPI PRODI",
			'sub' => "CPL SKPI Prodi",
			'active_menu' => 'cpl',
			'nama' => $this->session->userdata('nama'),
			'role' => $this->session->userdata('role'),
			'id_user' => $this->session->userdata('id_user'),
			'foto' => $foto,
			'cpl' => $this->M_cpl->GetAll(),
			'read' => $this->M_prodi->GetAll(),
		);
		$this->template->load('layout/components/layout', $this->view . 'read', $data);
	}

	function detail($id)
	{
		
		$img_user = $this->session->userdata('img_user');
		$foto = $img_user && file_exists('assets/static/img/photos/staff/' . $img_user) ? 'assets/static/img/photos/staff/' . $img_user : 'assets/static/img/user.png';
		$data = array(
			'judul' => "CPL SKPI PRODI",
			'sub' => "CPL SKPI Prodi",
			'active_menu' => 'cpl',
			'nama' => $this->session->userdata('nama'),
			'role' => $this->session->userdata('role'),
			'id_user' => $this->session->userdata('id_user'),
			'foto' => $foto,
			'read' => $this->M_cpl->GetAll(),
			'prodi' => $this->M_prodi->getId($id),
			'detail' => $this->M_cpl->detail($id),
			'cpl' => $this->M_kategori_cpl->GetAll(),
		);
		$this->template->load('layout/components/layout', $this->view . 'detail', $data);
	}
	
}
