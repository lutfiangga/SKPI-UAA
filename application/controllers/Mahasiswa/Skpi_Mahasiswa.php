<?php if (!defined('BASEPATH')) exit('No direct script access allowed');
class Skpi_Mahasiswa extends CI_Controller
{
	private $view = "mahasiswa/pages/skpi_mahasiswa/";
	private $redirect = "Mahasiswa/Skpi_Mahasiswa";
	public function __construct()
	{
		parent::__construct();
		//protected routes
		checkRole('Mahasiswa');
		$this->load->model(array('M_spm', 'M_profile', 'M_dirKemahasiswaan', 'M_etiquette', 'M_mahasiswa', 'M_cpl', 'M_kategori_cpl'));
	}
	public function index()
	{
		$role = $this->session->userdata('role');
		$img_user = $this->session->userdata('img_user');
		$foto = $img_user && file_exists('assets/static/img/photos/mahasiswa/' . $img_user) ? 'assets/static/img/photos/mahasiswa/' . $img_user : 'assets/static/img/user.png';
		$id = $this->session->userdata('id_akun');
		$data = array(
			'judul' => "SKPI MAHASISWA",
			'sub' => "SKPI Mahasiswa",
			'active_menu' => 'skpi',
			'nama' => $this->session->userdata('nama'),
		'role' => $this->session->userdata('role'),
			'id_user' => $$this->session->userdata('id_user'),
			'foto' => $foto,
			'SpmPoin' => $this->M_spm->getPoinByUser($id),
		);
		$this->template->load('layout/components/layout', $this->view . 'read', $data);
	}

	public function print()
	{
		$role = $this->session->userdata('role');
		$img_user = $this->session->userdata('img_user');
		$foto = $img_user && file_exists('assets/static/img/photos/mahasiswa/' . $img_user) ? 'assets/static/img/photos/mahasiswa/' . $img_user : 'assets/static/img/user.png';
		$id = $this->session->userdata('id_user');
		$data = array(
			'judul' => "SKPI MAHASISWA",
			'sub' => "SKPI Mahasiswa",
			'active_menu' => 'skpi',
			'nama' => $this->session->userdata('nama'),
		'role' => $this->session->userdata('role'),
			'id_user' => $id,
			'foto' => $foto,
			'SpmPoin' => $this->M_spm->getPoinByUser($id),
			'etiketPoin' => $this->M_etiquette->getPoinByUser($id),
			'mhs' => $this->M_profile->getById($id),
			'direktur' => $this->M_dirKemahasiswaan->GetDirektur(),
			'spm' => $this->M_spm->GetByNim($id),
			'etiket' => $this->M_etiquette->GetByNim($id),
		);
		$this->template->load('layout/components/layout_export', $this->view . 'print', $data);
	}
	public function export_pdf()
	{
		$role = $this->session->userdata('role');
		$img_user = $this->session->userdata('img_user');
		$foto = $img_user && file_exists('assets/static/img/photos/mahasiswa/' . $img_user) ? 'assets/static/img/photos/mahasiswa/' . $img_user : 'assets/static/img/user.png';
		$id = $this->session->userdata('id_akun');
		$id_user = $this->session->userdata('id_user');
		$data = array(
			'judul' => "SKPI MAHASISWA",
			'sub' => "SKPI Mahasiswa",
			'active_menu' => 'skpi',
			'nama' => $this->session->userdata('nama'),
		'role' => $this->session->userdata('role'),
			'id_user' => $id,
			'foto' => $foto,
			'SpmPoin' => $this->M_spm->getPoinByUser($id),
			'etiketPoin' => $this->M_etiquette->getPoinByUser($id),
			'mhs' => $this->M_profile->getById($id),
			'direktur' => $this->M_dirKemahasiswaan->GetDirektur(),
			'cpl' => $this->M_cpl->GetAll(),
			'spm' => $this->M_spm->GetByNim($id),
			'etiket' => $this->M_etiquette->GetByNim($id),
			'skpi' => $this->M_mahasiswa->getSKPI($id_user),
			'kategori_cpl' => $this->M_kategori_cpl->GetAll(),
		);
		// echo "<pre>";
		// var_dump($data['cpl']); // Menampilkan data di Controller
		// echo "</pre>";
		$this->template->load('layout/components/layout_export', $this->view . 'pdf', $data);
	}
}
