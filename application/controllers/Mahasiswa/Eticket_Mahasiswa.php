<?php
defined('BASEPATH') or exit('No direct script access allowed');
class Eticket_Mahasiswa extends CI_Controller
{
	private $view = "mahasiswa/pages/eticket_mhs/";
	private $redirect = "Mahasiswa/Eticket_Mahasiswa";
	public function __construct()
	{
		parent::__construct();
		//protected routes
		checkRole('Mahasiswa');
		$this->load->model(array('M_eticket', 'M_mahasiswa'));
	}
	function index()
	{
		$role = $this->session->userdata('role');
		$img_user = $this->session->userdata('img_user');
		$foto = $img_user ? 'assets/static/img/photos/' . $role . '/' . $img_user : 'assets/static/img/user.png';
		$id = $this->session->userdata('id_user');
		$read = $this->M_eticket->GetByNim($id);
		$data = array(
			'judul' => "Eticket MAHASISWA",
			'sub' => "Eticket Mahasiswa",
			'active_menu' => 'eticket_mhs',
			'role' => $role,
			'nama' => $this->session->userdata('nama'),
			'id_user' => $id,
			'foto' => $foto,
			'read' => $read,
		);
		$this->template->load('layout/components/layout', $this->view . 'read', $data);
	}
}
