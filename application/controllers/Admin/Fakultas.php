<?php
defined('BASEPATH') or exit('No direct script access allowed');
class Fakultas extends CI_Controller
{
	private $view = "admin/pages/fakultas/";
	private $redirect = "Admin/Fakultas";
	public function __construct()
	{
		parent::__construct();
		// IsAdmin();
		$this->load->model(array('M_fakultas', 'M_staff'));
		checkRole('Admin');
	}

	function index()
	{
		$role = $this->session->userdata('role');
		$img_user = $this->session->userdata('img_user');
		$foto = $img_user ? 'assets/static/img/photos/staff/' . $img_user : 'assets/static/img/user.png';
		$data = array(
			'judul' => "DATA FAKULTAS",
			'sub' => "Data Fakultas",
			'active_menu' => 'fakultas',
			'id_user' => $this->session->userdata('id_user'),
			'role' => $role,
			'nama' => $this->session->userdata('nama'),
			'foto' => $foto,
			'read' => $this->M_fakultas->GetAll(),
			'staff' => $this->M_staff->GetAllStaff(),
		);
		$this->template->load('layout/components/layout', $this->view . 'read', $data);
	}

	public function save()
	{
		cek_csrf();
		$this->form_validation->set_rules(
			'id_fakultas',
			'Kode Fakultas',
			'required|is_unique[fakultas.id_fakultas]',
			[
				'required' => 'Kode Fakultas Wajib diisi!',
				'is_unique' => 'Kode Fakultas sudah terdaftar!'
			]
		);

		if ($this->form_validation->run() == FALSE) {
			$this->session->set_flashdata('create_error', validation_errors());
			redirect($this->redirect);
		} else {
			$data = array(
				'id_fakultas' => $this->security->xss_clean($this->input->post('id_fakultas')),
				'fakultas' => $this->security->xss_clean($this->input->post('fakultas')),
				'id_dekan' => $this->security->xss_clean($this->input->post('id_dekan')),
			);

			$this->M_fakultas->save($data);
			$this->session->set_flashdata('create_success', 'Data berhasil diupdate');
			redirect($this->redirect, 'refresh');
		}
	}

	public function update()
	{
		cek_csrf();
		$id = $this->input->post('id_fakultas');

		$data = array(
			'id_fakultas' => $this->security->xss_clean($this->input->post('id_fakultas')),
			'fakultas' => $this->security->xss_clean($this->input->post('fakultas')),
			'id_dekan' => $this->security->xss_clean($this->input->post('id_dekan')),
		);
		// Perform the update
		$this->M_fakultas->update($id, $data);
		$this->session->set_flashdata('update_success', 'Data berhasil diupdate');
		redirect($this->redirect, 'refresh');
	}

	public function delete()
	{
		cek_csrf();
		$id = $this->input->post('id_fakultas');
		$data = array(
			'id_fakultas' => $id
		);
		$this->M_fakultas->delete($data);
		redirect($this->redirect, 'refresh');
	}
}
