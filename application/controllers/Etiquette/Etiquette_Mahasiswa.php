<?php
defined('BASEPATH') or exit('No direct script access allowed');
class Etiquette_Mahasiswa extends CI_Controller
{
	private $view = "etiquette/pages/etiquette_mhs/";
	private $redirect = "Etiquette/Etiquette_Mahasiswa";
	public function __construct()
	{
		parent::__construct();
		//protected routes
		checkRole('Etiquette');
		$this->load->model(array('M_etiquette', 'M_mahasiswa'));
	}
	function index()
	{
		
		$img_user = $this->session->userdata('img_user');
		$foto = $img_user && file_exists('assets/static/img/photos/staff/' . $img_user) ? 'assets/static/img/photos/staff/' . $img_user : 'assets/static/img/user.png';
		$data = array(
			'judul' => "Etiquette MAHASISWA",
			'sub' => "Etiquette Mahasiswa",
			'active_menu' => 'etiquette_mhs',
			'nama' => $this->session->userdata('nama'),
			'role' => $this->session->userdata('role'),
			'id_user' => $this->session->userdata('id_user'),
			'foto' => $foto,
			'read' => $this->M_etiquette->GetEtiquette(),
		);
		$this->template->load('layout/components/layout', $this->view . 'read', $data);
	}
	function detail($id)
	{
		
		$img_user = $this->session->userdata('img_user');
		$foto = $img_user && file_exists('assets/static/img/photos/staff/' . $img_user) ? 'assets/static/img/photos/staff/' . $img_user : 'assets/static/img/user.png';
		$data = array(
			'judul' => "Etiquette MAHASISWA",
			'sub' => "Etiquette Mahasiswa",
			'active_menu' => 'etiquette_mhs',
			'nama' => $this->session->userdata('nama'),
			'role' => $this->session->userdata('role'),
			'id_user' => $this->session->userdata('id_user'),
			'foto' => $foto,
			'mhs' => $this->M_mahasiswa->getId($id),
			'etiquettePoin' => $this->M_etiquette->getPoinByUser($id),
			'read' => $this->M_etiquette->GetByNim($id),
		);
		$this->template->load('layout/components/layout', $this->view . 'detail', $data);
	}
	function create()
	{
		
		$img_user = $this->session->userdata('img_user');
		$foto = $img_user ? 'assets/static/img/photos/staff/' . $img_user : 'assets/static/img/user.png';
		$data = array(
			'judul' => "Etiquette MAHASISWA",
			'sub' => "Etiquette Mahasiswa",
			'active_menu' => 'etiquette_mhs',
			// from tabel auth
			'nama' => $this->session->userdata('nama'),
			'role' => $this->session->userdata('role'),
			// from tabel user
			'id_user' => $this->session->userdata('id_user'),
			'foto' => $foto,
			'mhs' => $this->M_mahasiswa->GetAllMhs(),
		);
		$this->template->load('layout/components/layout', $this->view . 'create', $data);
	}
	function edit($id)
	{
		
		$img_user = $this->session->userdata('img_user');
		$foto = $img_user && file_exists('assets/static/img/photos/staff/' . $img_user) ? 'assets/static/img/photos/staff/' . $img_user : 'assets/static/img/user.png';
		$data = array(
			'judul' => "Etiquette MAHASISWA",
			'sub' => "Etiquette Mahasiswa",
			'active_menu' => 'etiquette_mhs',
			// from tabel auth
			'nama' => $this->session->userdata('nama'),
			'role' => $this->session->userdata('role'),
			// from tabel user
			'id_user' => $this->session->userdata('id_user'),
			'foto' => $foto,
			'edit' => $this->M_etiquette->edit($id),
			'mhs' => $this->M_mahasiswa->GetAllMhs(),
		);
		$this->template->load('layout/components/layout', $this->view . 'edit', $data);
	}

	public function save()
	{
		cek_csrf();

		$nim = $this->input->post('nim');
		// Konfigurasi upload file
		$config['upload_path'] = './assets/static/etiquette/';
		$config['allowed_types'] = 'jpg|jpeg|png|wepb|pdf|JPG|PNG|JPEG|WEPB|PDF';
		$config['max_size'] = 6000; // KB
		$config['file_name'] = $nim . '_' . time();

		$this->load->library('upload', $config);

		$bukti = null; // default value bukti

		if ($this->upload->do_upload('bukti')) {
			$bukti_data = $this->upload->data();
			$bukti = $bukti_data['file_name'];
		}

		$data = array(
			'id_etiquette' => generate_uuid_v7(),
			'nim' => $nim,
			'pelanggaran' => $this->security->xss_clean($this->input->post('pelanggaran')),
			'jenis_pelanggaran' => $this->security->xss_clean($this->input->post('jenis_pelanggaran')),
			'poin' => $this->security->xss_clean($this->input->post('poin')),
			'bukti' => $bukti,
		);
		$this->M_etiquette->save($data);
		$this->session->set_flashdata('create_success', 'Data berhasil ditambahkan!');
		redirect($this->redirect, 'refresh');
	}

	public function update()
	{
		cek_csrf();
		$id = $this->uri->segment(4);
		$nim = $this->input->post('nim');
		// Konfigurasi upload file
		$config['upload_path'] = './assets/static/etiquette/';
		$config['allowed_types'] = 'jpg|jpeg|png|wepb|pdf|JPG|PNG|JPEG|WEPB|PDF';
		$config['max_size'] = 6000; // KB
		$config['file_name'] = $nim . '_' . time();
		// Memuat library upload dengan konfigurasi
		$this->load->library('upload', $config);

		$etiquette = $this->M_etiquette->getById($id); //get by id
		$bukti = $etiquette['bukti']; // default bukti

		if ($this->upload->do_upload('bukti')) {
			$bukti_data = $this->upload->data();
			$bukti = $bukti_data['file_name'];

			// delete old bukti
			if (!empty($etiquette['bukti']) && file_exists('./assets/static/etiquette/' . $etiquette['bukti'])) {
				unlink('./assets/static/etiquette/' . $etiquette['bukti']);
			}
		}

		$data = array(
			'nim' => $nim,
			'pelanggaran' => $this->security->xss_clean($this->input->post('pelanggaran')),
			'jenis_pelanggaran' => $this->security->xss_clean($this->input->post('jenis_pelanggaran')),
			'poin' => $this->security->xss_clean($this->input->post('poin')),
			'bukti' => $bukti,
		);
		$this->M_etiquette->update($id, $data);
		$this->session->set_flashdata('update_success', 'Data berhasil diupdate!');
		redirect($this->redirect . '/detail/' . $nim, 'refresh');
	}

	public function delete()
	{
		cek_csrf();
		$id = $this->input->post('id_etiquette');

		$etiquette = $this->M_etiquette->edit($id);
		$nim = $etiquette['nim'];
		if ($etiquette) {
			$bukti = $etiquette['bukti'];

			// Hapus data dari database
			$data = array('id_etiquette' => $id);
			$this->M_etiquette->delete($data);

			// Hapus file dari server
			if ($bukti) {
				$filePath = './assets/static/etiquette/' . $bukti;
				if (file_exists($filePath)) {
					unlink($filePath); // Hapus file
				}
			}
		}
		$this->session->set_flashdata('delete_success', 'Data berhasil dihapus!');
		!empty($nim) ? redirect($this->redirect . '/detail/' . $nim, 'refresh') : redirect($this->redirect, 'refresh');
	}
}
