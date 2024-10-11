<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Dir_Kemahasiswaan extends CI_Controller
{
	private $view = "kemahasiswaan/pages/dir_kemahasiswaan/";
	private $redirect = "Kemahasiswaan/Dir_Kemahasiswaan";
	public function __construct()
	{
		parent::__construct();
		//protected routes
		checkRole('Kemahasiswaan');
		//load model
		$this->load->model('M_dirKemahasiswaan');
	}

	public function index()
	{
		$id = $this->session->userdata('id_user');
		$role = $this->session->userdata('role');
		$img_user = $this->session->userdata('img_user');
		$foto = $img_user ? 'assets/static/img/photos/' . strtolower($role) . '/' . $img_user : 'assets/static/img/user.png';
		$data = array(
			'judul' => "DATA DIREKTUR KEMAHASISWAAN",
			'sub' => "Data Direktur Kemahasiswaan",
			'active_menu' => 'dir_kemahasiswaan',
			'id_user' => $id,
			// from tabel user
			'nama' => $this->session->userdata('nama'),
			'foto' => $foto,
			'role' => $role,
			'direktur' => $this->M_dirKemahasiswaan->GetDirektur(),
		);

		$this->template->load('layout/components/layout', $this->view . 'read', $data);
	}
	public function update()
	{
		$this->form_validation->set_rules(
			'email',
			'Email',
			'required|valid_email',
			array(
				'required' => 'Email tidak boleh kosong.',
				'valid_email' => 'Format email tidak valid.'
			)
		);
		$this->form_validation->set_rules(
			'no_hp',
			'Phone',
			'required|min_length[10]',
			array(
				'required' => 'Nomor telepon tidak boleh kosong.',
				'min_length' => 'Nomor telepon harus terdiri dari minimal 10 karakter.'
			)
		);

		// Jika validasi form gagal
		if ($this->form_validation->run() == FALSE) {
			$this->session->set_flashdata('validation_error', validation_errors());
			redirect($this->redirect);
		} else {
			cek_csrf();

			$id = $this->M_dirKemahasiswaan->GetDirektur()->row()->id_direktur;

			$data = array(
				'nama' => $this->input->post('nama'),
				'jenis_kelamin' => $this->input->post('jenis_kelamin'),
				'email' => $this->input->post('email'),
				'no_hp' => $this->input->post('no_hp'),
				'alamat' => $this->input->post('alamat'),
			);

			// Update data direktur
			$this->M_dirKemahasiswaan->update($id, $data);
			$this->session->set_flashdata('success', 'Data updated successfully.');
			redirect($this->redirect, 'refresh');
		}
	}

	public function change_image($id)
	{
		cek_csrf();
		$config['upload_path'] = './assets/static/img/photos/kemahasiswaan/';
		$config['allowed_types'] = 'jpg|jpeg|png|wepb|JPG|PNG|JPEG|WEPB';
		$config['max_size'] = 6000; // KB
		$config['file_name'] = 'direktur_kemahasiswaan_' . time();

		$this->load->library('upload', $config); // Load library dan config

		$user = $this->M_dirKemahasiswaan->GetDirektur()->row();
		$foto = $user->foto; // default image

		if ($this->upload->do_upload('foto')) {
			$foto_data = $this->upload->data();
			$foto = $foto_data['file_name'];

			// delete old image
			if (!empty($user->foto) && file_exists('./assets/static/img/photos/kemahasiswaan/' . $user->foto)) {
				unlink('./assets/static/img/photos/kemahasiswaan/' . $user->foto);
			}
		}

		$data = array(
			'foto' => $foto,
		);
		$this->M_dirKemahasiswaan->update($id, $data);
		redirect($this->redirect, 'refresh');
	}
	public function change_signature($id)
	{
		cek_csrf();

		$config['upload_path'] = './assets/static/img/photos/kemahasiswaan/signature/';
		$config['allowed_types'] = 'png|PNG';
		$config['max_size'] = 6000; // KB
		$config['file_name'] = 'signature_direktur_kemahasiswaan_' . time();

		$this->load->library('upload', $config); // Load library dan config

		$user = $this->M_dirKemahasiswaan->GetDirektur()->row();
		$signature = $user->signature; // default signature

		if ($this->upload->do_upload('signature')) {
			$signature_data = $this->upload->data();
			$signature = $signature_data['file_name'];

			// delete old signature
			if (!empty($user->signature) && file_exists('./assets/static/img/photos/kemahasiswaan/signature/' . $user->signature)) {
				unlink('./assets/static/img/photos/kemahasiswaan/signature/' . $user->signature);
			}
		}

		$data = array(
			'signature' => $signature,
		);
		$this->M_dirKemahasiswaan->update($id, $data);
		redirect($this->redirect, 'refresh');
	}

	public function change_stamp($id)
	{
		cek_csrf();

		$config['upload_path'] = './assets/static/img/photos/kemahasiswaan/stamp/';
		$config['allowed_types'] = 'png|PNG';
		$config['max_size'] = 6000; // KB
		$config['file_name'] = 'stamp_direktur_kemahasiswaan_' . time();

		$this->load->library('upload', $config); // Load library dan config

		$user = $this->M_dirKemahasiswaan->GetDirektur()->row();
		$stamp = $user->stamp; // default stamp

		if ($this->upload->do_upload('stamp')) {
			$stamp_data = $this->upload->data();
			$stamp = $stamp_data['file_name'];

			// delete old stamp
			if (!empty($user->stamp) && file_exists('./assets/static/img/photos/kemahasiswaan/stamp/' . $user->stamp)) {
				unlink('./assets/static/img/photos/kemahasiswaan/stamp/' . $user->stamp);
			}
		}

		$data = array(
			'stamp' => $stamp,
		);
		$this->M_dirKemahasiswaan->update($id, $data);
		redirect($this->redirect, 'refresh');
	}
}
