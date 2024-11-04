<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Dir_Admisi extends CI_Controller
{
	private $view = "admisi/pages/dir_admisi/";
	private $redirect = "Admisi/Dir_Admisi";
	public function __construct()
	{
		parent::__construct();
		//protected routes
		checkRole('Admisi');
		//load model
		$this->load->model(array('M_dirAdmisi', 'M_staff'));
	}

	public function index()
	{
		$id = $this->session->userdata('id_user');
		$role = $this->session->userdata('role');
		$img_user = $this->session->userdata('img_user');
		$foto = $img_user ? 'assets/static/img/photos/staff/' . $img_user : 'assets/static/img/user.png';
		$data = array(
			'judul' => "DATA DIREKTUR ADMISI",
			'sub' => "Data Direktur Admisi",
			'active_menu' => 'direktur',
			'id_user' => $id,
			// from tabel user
			'nama' => $this->session->userdata('nama'),
			'foto' => $foto,
			'role' => $role,
			'staff' => $this->M_staff->GetAll(),
			'direktur' => $this->M_dirAdmisi->GetDirektur(),
		);

		$this->template->load('layout/components/layout', $this->view . 'read', $data);
	}
	public function update($id)
	{
		cek_csrf();
		$data = array(
			'id_direktur' => $this->security->xss_clean($this->input->post('id_direktur')),
		);

		// Update data direktur
		$this->M_dirAdmisi->update($id, $data);
		$this->session->set_flashdata('success', 'Data updated successfully.');
		redirect($this->redirect, 'refresh');
	}

	public function add_direktur()
	{
		cek_csrf();

		$last_id = $this->M_dirAdmisi->getLastId(); // get last id
		// jika id tidak ditemukan, id diisi 1
		$id = ($last_id == null) ? 1 : $last_id + 1;
		$data = array(
			'id' => $id,
			'id_direktur' => $this->security->xss_clean($this->input->post('id_direktur')),
		);
		$this->M_dirAdmisi->save($data);
		redirect($this->redirect, 'refresh');
	}

	public function change_signature($id)
	{
		cek_csrf();

		$config['upload_path'] = './assets/static/img/photos/admisi/signature/';
		$config['allowed_types'] = 'png|PNG';
		$config['max_size'] = 6000; // KB
		$config['file_name'] = 'signature_direktur_admisi_' . time();

		$this->load->library('upload', $config); // Load library dan config

		$user = $this->M_dirAdmisi->GetDirektur();
		$signature = $user['signature']; // default signature

		if ($this->upload->do_upload('signature')) {
			$signature_data = $this->upload->data();
			$signature = $signature_data['file_name'];

			// delete old signature
			if (!empty($user['signature']) && file_exists('./assets/static/img/photos/admisi/signature/' . $user['signature'])) {
				unlink('./assets/static/img/photos/admisi/signature/' . $user['signature']);
			}
		}

		$data = array(
			'signature' => $signature,
		);
		$this->M_dirAdmisi->update($id, $data);
		redirect($this->redirect, 'refresh');
	}

	public function change_stamp($id)
	{
		cek_csrf();

		$config['upload_path'] = './assets/static/img/photos/admisi/stamp/';
		$config['allowed_types'] = 'png|PNG';
		$config['max_size'] = 6000; // KB
		$config['file_name'] = 'stamp_direktur_admisi_' . time();

		$this->load->library('upload', $config); // Load library dan config

		$user = $this->M_dirAdmisi->GetDirektur();
		$stamp = $user['stamp']; // default stamp

		if ($this->upload->do_upload('stamp')) {
			$stamp_data = $this->upload->data();
			$stamp = $stamp_data['file_name'];

			// delete old stamp
			if (!empty($user['stamp']) && file_exists('./assets/static/img/photos/admisi/stamp/' . $user['stamp'])) {
				unlink('./assets/static/img/photos/admisi/stamp/' . $user['stamp']);
			}
		}

		$data = array(
			'stamp' => $stamp,
		);
		$this->M_dirAdmisi->update($id, $data);
		redirect($this->redirect, 'refresh');
	}
}
