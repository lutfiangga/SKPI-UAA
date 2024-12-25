<?php
defined('BASEPATH') or exit('No direct script access allowed');
class Etiquette_Mahasiswa extends CI_Controller
{
	private $view = "mahasiswa/pages/etiquette_mhs/";
	private $redirect = "Mahasiswa/Etiquette_Mahasiswa";
	public function __construct()
	{
		parent::__construct();
		//protected routes
		checkRole('Mahasiswa');
		$this->load->model(array('M_etiquette', 'M_mahasiswa'));
	}
	function index()
	{
		$img_user = $this->session->userdata('img_user');
		$foto = $img_user && file_exists('assets/static/img/photos/mahasiswa/' . $img_user) ? 'assets/static/img/photos/mahasiswa/' . $img_user : 'assets/static/img/user.png';
		$id = $this->session->userdata('id_user');
		$data = array(
			'judul' => "Etiquette MAHASISWA",
			'sub' => "Etiquette Mahasiswa",
			'active_menu' => 'etiquette_mhs',
			'role' => $this->session->userdata('role'),
			'nama' => $this->session->userdata('nama'),
			'id_user' => $id,
			'foto' => $foto,
			'read' => $this->M_etiquette->GetByNim($id),
		);
		$this->template->load('layout/components/layout', $this->view . 'read', $data);
	}
}
