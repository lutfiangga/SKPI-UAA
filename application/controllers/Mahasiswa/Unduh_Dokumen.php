<?php if (!defined('BASEPATH')) exit('No direct script access allowed');
class Unduh_Dokumen extends CI_Controller
{
	private $view = "mahasiswa/pages/unduh_dokumen/";
	private $redirect = "Mahasiswa/Unduh_Dokumen";
	public function __construct()
	{
		parent::__construct();
		//protected routes
		checkRole('Mahasiswa');
		$this->load->model(array('M_spm', 'M_profile', 'M_dirKemahasiswaan', 'M_etiquette'));
	}
	public function index()
	{
		$role = $this->session->userdata('role');
		$img_user = $this->session->userdata('img_user');
		$foto = $img_user ? 'assets/static/img/photos/' . $role . '/' . $img_user : 'assets/static/img/user.png';
		$id_user = $this->session->userdata('id_user');
		$data = array(
			'judul' => "UNDUH DOKUMEN",
			'sub' => "Unduh Dokumen",
			'active_menu' => 'dokumen',
			'nama' => $this->session->userdata('nama'),
			'role' => $role,
			'id_user' => $id_user,
			'foto' => $foto,
			'SpmPoin' => $this->M_spm->getPoinByUser($id_user),
		);
		$this->template->load('layout/components/layout', $this->view . 'read', $data);
	}

	public function print()
	{
		$role = $this->session->userdata('role');
		$img_user = $this->session->userdata('img_user');
		$foto = $img_user ? 'assets/static/img/photos/' . $role . '/' . $img_user : 'assets/static/img/user.png';
		$id = $this->session->userdata('id_user');
		$data = array(
			'judul' => "SKPI MAHASISWA",
			'sub' => "SKPI Mahasiswa",
			'active_menu' => 'skpi',
			'nama' => $this->session->userdata('nama'),
			'role' => $role,
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
		$foto = $img_user ? 'assets/static/img/photos/' . $role . '/' . $img_user : 'assets/static/img/user.png';
		$id = $this->session->userdata('id_user');
		$data = array(
			'judul' => "SKPI MAHASISWA",
			'sub' => "SKPI Mahasiswa",
			'active_menu' => 'skpi',
			'nama' => $this->session->userdata('nama'),
			'role' => $role,
			'id_user' => $id,
			'foto' => $foto,
			'SpmPoin' => $this->M_spm->getPoinByUser($id),
			'etiketPoin' => $this->M_etiquette->getPoinByUser($id),
			'mhs' => $this->M_profile->getById($id),
			'direktur' => $this->M_dirKemahasiswaan->GetDirektur(),
			'spm' => $this->M_spm->GetByNim($id),
			'etiket' => $this->M_etiquette->GetByNim($id),
		);

		$this->load->library('pdfgenerator');
		$data['title'] = "Data Random";
		$file_pdf = $data['title'];
		$paper = 'A4';
		$orientation = "potrait";
		$html = $this->template->load('layout/components/layout_export', $this->view . 'pdf', $data, true);
		$this->pdfgenerator->generate($html, $file_pdf, $paper, $orientation);
	}
}