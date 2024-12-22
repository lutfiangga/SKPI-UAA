<?php if (!defined('BASEPATH')) exit('No direct script access allowed');
class Skpi_Mahasiswa extends CI_Controller
{
	private $view = "admin/pages/skpi_mahasiswa/";
	private $redirect = "Admin/Skpi_Mahasiswa";
	public function __construct()
	{
		parent::__construct();
		//protected routes
		checkRole('Admin');
		$this->load->model(array('M_spm', 'M_auth', 'M_profile','M_prodi', 'M_skor_syarat_wajib', 'M_skor_spm', 'M_dirKemahasiswaan', 'M_etiquette', 'M_mahasiswa', 'M_cpl', 'M_kategori_cpl'));
	}
	public function index()
	{
		$tahun_masuk = $this->security->xss_clean($this->input->get('tahun_masuk'));
		$tahun_lulus = $this->security->xss_clean($this->input->get('tahun_lulus'));
		$prodi = $this->security->xss_clean($this->input->get('id_prodi'));

		if ($tahun_masuk || $tahun_lulus || $prodi) {
			$read = $this->M_auth->getFilteredSkpiMhs($tahun_masuk, $tahun_lulus, $prodi);
		} else {
			$read = $this->M_auth->getSkpiMhs();
		}

		$img_user = $this->session->userdata('img_user');
		$foto = $img_user ? 'assets/static/img/photos/staff/' . $img_user : 'assets/static/img/user.png';
		$data = array(
			'judul' => "SKPI MAHASISWA",
			'sub' => "SKPI Mahasiswa",
			'active_menu' => 'skpi',
			'nama' => $this->session->userdata('nama'),
			'role' => $this->session->userdata('role'),
			'foto' => $foto,
			'tahun_masuk' => $tahun_masuk,
			'tahun_lulus' => $tahun_lulus,
			'prodi' => $prodi,
			'listProdi' => $this->M_prodi->GetAll(),
			'read' => $read,
		);
		$this->template->load('layout/components/layout', $this->view . 'read', $data);
	}


	public function pdf($nim, $id_akun)
	{
		$role = $this->session->userdata('role');
		$img_user = $this->session->userdata('img_user');
		$foto = $img_user ? 'assets/static/img/photos/' . $role . '/' . $img_user : 'assets/static/img/user.png';
		$id_akun = $this->uri->segment(5);
		$nim = $this->uri->segment(4);
		$data = array(
			'judul' => "SKPI MAHASISWA",
			'sub' => "SKPI Mahasiswa",
			'active_menu' => 'skpi',
			'nama' => $this->session->userdata('nama'),
			'role' => $role,
			'id_user' => $nim,
			'foto' => $foto,
			'SpmPoin' => $this->M_spm->getPoinByUser($id_akun),
			'mhs' => $this->M_profile->getById($id_akun),
			'direktur' => $this->M_dirKemahasiswaan->GetDirektur(),
			'cpl' => $this->M_cpl->GetAll(),
			'spm' => $this->M_spm->GetByNim($id_akun),
			'etiket' => $this->M_etiquette->GetByNim($nim),
			'skpi' => $this->M_mahasiswa->getSKPI($nim),
			'kategori_cpl' => $this->M_kategori_cpl->GetAll(),
		);
		// echo "<pre>";
		// var_dump($data['cpl']); // Menampilkan data di Controller
		// echo "</pre>";
		$this->template->load('layout/components/layout_export', $this->view . 'pdf', $data);
	}
	public function read()
	{
		$role = $this->session->userdata('role');
		$img_user = $this->session->userdata('img_user');
		$foto = $img_user ? 'assets/static/img/photos/' . $role . '/' . $img_user : 'assets/static/img/user.png';
		$allMhs = $this->M_mahasiswa->getAll();
		$mhs = $this->M_mahasiswa->getid($allMhs['nim']);

		$data = array(
			'judul' => "SKPI MAHASISWA",
			'sub' => "SKPI Mahasiswa",
			'active_menu' => 'skpi',
			'nama' => $this->session->userdata('nama'),
			'role' => $role,
			'id_user' => $id,
			'foto' => $foto,
			'read' => $foto,
			'skorSyaratWajib' => $this->M_skor_syarat_wajib->skorMinimum($mhs['tahun_masuk'], $mhs['id_jenjang']),
			'skorMinSpm' => $this->M_skor_spm->skorMinimum($mhs['tahun_masuk'], $mhs['id_jenjang']),
		);
		// echo "<pre>";
		// var_dump($data['cpl']); // Menampilkan data di Controller
		// echo "</pre>";
		$this->template->load('layout/components/layout_export', $this->view . 'pdf', $data);
	}
}
