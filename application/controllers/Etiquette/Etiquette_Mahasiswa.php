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
		$role = $this->session->userdata('role');
		$img_user = $this->session->userdata('img_user');
		$foto = $img_user ? 'assets/static/img/photos/staff/' . $img_user : 'assets/static/img/user.png';
		$data = array(
			'judul' => "Etiquette MAHASISWA",
			'sub' => "Etiquette Mahasiswa",
			'active_menu' => 'etiquette_mhs',
			// from tabel auth
			'nama' => $this->session->userdata('nama'),
			'role' => $role,
			// from tabel user
			'id_user' => $this->session->userdata('id_user'),
			'foto' => $foto,
			'read' => $this->M_etiquette->GetAll(),
			'mhs' => $this->M_mahasiswa->GetAll(),
		);
		$this->template->load('layout/components/layout', $this->view . 'read', $data);
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

		$last_id = $this->M_etiquette->getLastId(); // get last id
		// jika id tidak ditemukan, id diisi 1
		$id = ($last_id == null) ? 1 : $last_id + 1;
		$data = array(
			'id_etiquette' => $id,
			'nim' => $nim,
			'pelanggaran' => $this->security->xss_clean($this->input->post('pelanggaran')),
			'jenis_pelanggaran' => $this->security->xss_clean($this->input->post('jenis_pelanggaran')),
			'poin' => $this->security->xss_clean($this->input->post('poin')),
			'bukti' => $bukti,
		);
		$this->M_etiquette->save($data);
		redirect($this->redirect, 'refresh');
	}

	public function update()
	{
		cek_csrf();
		$id = $this->input->post('id_etiquette');
		$nim = $this->input->post('nim');
		// Konfigurasi upload file
		$config['upload_path'] = './assets/static/etiquette/';
		$config['allowed_types'] = 'jpg|jpeg|png|wepb|pdf|JPG|PNG|JPEG|WEPB|PDF';
		$config['max_size'] = 6000; // KB
		$config['file_name'] = $nim . '_' . time();
		// Memuat library upload dengan konfigurasi
		$this->load->library('upload', $config);

		$etiket = $this->M_etiquette->getById($id); //get by id
		$bukti = $etiket['bukti']; // default bukti

		if ($this->upload->do_upload('bukti')) {
			$bukti_data = $this->upload->data();
			$bukti = $bukti_data['file_name'];

			// delete old bukti
			if (!empty($etiket['bukti']) && file_exists('./assets/static/etiquette/' . $etiket['bukti'])) {
				unlink('./assets/static/etiquette/' . $etiket['bukti']);
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
		redirect($this->redirect, 'refresh');
	}

	public function delete()
	{
		cek_csrf();
		$id = $this->input->post('id_etiquette');

		$etiket = $this->M_etiquette->edit($id);
		if ($etiket) {
			$bukti = $etiket['bukti'];

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

		redirect($this->redirect, 'refresh');
	}
}
