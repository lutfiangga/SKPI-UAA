<?php
defined('BASEPATH') or exit('No direct script access allowed');
class Eticket_Mahasiswa extends CI_Controller
{
	private $view = "eticket/pages/eticket_mhs/";
	private $redirect = "Eticket/Eticket_Mahasiswa";
	public function __construct()
	{
		parent::__construct();
		//protected routes
		checkRole('Eticket');
		$this->load->model(array('M_eticket', 'M_mahasiswa'));
	}
	function index()
	{
		$role = $this->session->userdata('role');
		$img_user = $this->session->userdata('img_user');
		$foto = $img_user ? 'assets/static/img/photos/' . $role . '/' . $img_user : 'assets/static/img/user.png';
		$data = array(
			'judul' => "Eticket MAHASISWA",
			'sub' => "Eticket Mahasiswa",
			'active_menu' => 'eticket_mhs',
			// from tabel auth
			'nama' => $this->session->userdata('nama'),
			'role' => $role,
			// from tabel user
			'id_user' => $this->session->userdata('id_user'),
			'foto' => $foto,
			'read' => $this->M_eticket->GetAll(),
			'mhs' => $this->M_mahasiswa->GetAll(),
		);
		$this->template->load('layout/components/layout', $this->view . 'read', $data);
	}

	public function save()
	{
		cek_csrf();

		$nim = $this->input->post('nim');
		// Konfigurasi upload file
		$config['upload_path'] = './assets/static/eticket/';
		$config['allowed_types'] = 'jpg|jpeg|png|wepb|pdf|JPG|PNG|JPEG|WEPB|PDF';
		$config['max_size'] = 6000; // KB
		$config['file_name'] = $nim . '_' . time();

		$this->load->library('upload', $config);

		$bukti = null; // default value bukti

		if ($this->upload->do_upload('bukti')) {
			$bukti_data = $this->upload->data();
			$bukti = $bukti_data['file_name'];
		}

		$last_id = $this->M_eticket->getLastId(); // get last id
		// jika id tidak ditemukan, id diisi 1
		$id = ($last_id == null) ? 1 : $last_id + 1;
		$data = array(
			'id_etiket' => $id,
			'nim' => $nim,
			'pelanggaran' => $this->input->post('pelanggaran'),
			'jenis_pelanggaran' => $this->input->post('jenis_pelanggaran'),
			'poin' => $this->input->post('poin'),
			'bukti' => $bukti,
		);
		$this->M_eticket->save($data);
		redirect($this->redirect, 'refresh');
	}

	public function update()
	{
		cek_csrf();
		$id = $this->input->post('id_etiket');
		$nim = $this->input->post('nim');
		// Konfigurasi upload file
		$config['upload_path'] = './assets/static/eticket/';
		$config['allowed_types'] = 'jpg|jpeg|png|wepb|pdf|JPG|PNG|JPEG|WEPB|PDF';
		$config['max_size'] = 6000; // KB
		$config['file_name'] = $nim . '_' . time();
		// Memuat library upload dengan konfigurasi
		$this->load->library('upload', $config);

		$etiket = $this->M_eticket->getById($id); //get by id
		$bukti = $etiket['bukti']; // default bukti

		if ($this->upload->do_upload('bukti')) {
			$bukti_data = $this->upload->data();
			$bukti = $bukti_data['file_name'];

			// delete old bukti
			if (!empty($etiket['bukti']) && file_exists('./assets/static/eticket/' . $etiket['bukti'])) {
				unlink('./assets/static/eticket/' . $etiket['bukti']);
			}
		}

		$data = array(
			'nim' => $nim,
			'pelanggaran' => $this->input->post('pelanggaran'),
			'jenis_pelanggaran' => $this->input->post('jenis_pelanggaran'),
			'poin' => $this->input->post('poin'),
			'bukti' => $bukti,
		);
		$this->M_eticket->update($id, $data);
		redirect($this->redirect, 'refresh');
	}
	public function delete()
	{
		cek_csrf();
		$id = $this->input->post('id_etiket');

		$etiket = $this->M_eticket->edit($id);
		if ($etiket) {
			$bukti = $etiket['bukti'];

			// Hapus data dari database
			$data = array('id_etiket' => $id);
			$this->M_eticket->delete($data);

			// Hapus file dari server
			if ($bukti) {
				$filePath = './assets/static/eticket/' . $bukti;
				if (file_exists($filePath)) {
					unlink($filePath); // Hapus file
				}
			}
		}

		redirect($this->redirect, 'refresh');
	}
}
