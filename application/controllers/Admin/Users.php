<?php
defined('BASEPATH') or exit('No direct script access allowed');
class Users extends CI_Controller
{
	private $view = "admin/pages/user/";
	private $redirect = "Admin/User";
	public function __construct()
	{
		parent::__construct();
		// IsAdmin();
		$this->load->model(array('M_mahasiswa'));
		$this->load->helper('text');
		checkRole('Admin');
	}
	function index()
	{
		$img_user = $this->session->userdata('img_user');
		$foto = $img_user && file_exists('assets/static/img/photos/staff/' . $img_user) ? 'assets/static/img/photos/staff/' . $img_user : 'assets/static/img/user.png';
		$data = array(
			'judul' => "DATA USER",
			'sub' => "Data User",
			'active_menu' => 'user',
			'id_user' => $this->session->userdata('id_user'),
			'role' => $this->session->userdata('role'),
			'nama' => $this->session->userdata('nama'),
			'foto' => $foto,
		);
		$this->template->load('layout/components/layout', $this->view . 'read', $data);
	}
	function data_mahasiswa()
	{
		$img_user = $this->session->userdata('img_user');
		$foto = $img_user && file_exists('assets/static/img/photos/staff/' . $img_user) ? 'assets/static/img/photos/staff/' . $img_user : 'assets/static/img/user.png';
		$data = array(
			'judul' => "DATA MAHASISWA",
			'sub' => "Data Mahasiswa",
			'active_menu' => 'mahasiswa',
			'id_user' => $this->session->userdata('id_user'),
			'role' => $this->session->userdata('role'),
			'nama' => $this->session->userdata('nama'),
			'foto' => $foto,
			'mahasiswa' => $this->M_mahasiswa->getAll(),
		);
		$this->template->load('layout/components/layout', $this->view . 'data_mahasiswa', $data);
	}

	public function create()
	{
		$img_user = $this->session->userdata('img_user');
		$foto = $img_user && file_exists('assets/static/img/photos/staff/' . $img_user) ? 'assets/static/img/photos/staff/' . $img_user : 'assets/static/img/user.png';
		$data = array(
			'judul' => "DATA USER",
			'sub' => "Data User",
			'active_menu' => 'user',
			'id_user' => $this->session->userdata('id_user'),
			'email' => $this->session->userdata('email'),
			'nama' => $this->session->userdata('nama'),
			'username' => $this->session->userdata('username'),
			'password' => $this->session->userdata('password'),
			'foto' => $foto,
			'create' => '',
		);
		$this->template->load('pages/admin/template', $this->view . 'create', $data);
	}

	public function save()
	{
		$this->form_validation->set_rules('username', 'Username', 'required|is_unique[user.username]');

		if ($this->form_validation->run() == FALSE) {
			// Validation failed, save error message to flashdata
			$this->session->set_flashdata('register_error', validation_errors());
			redirect('User/create'); // Redirect back to the user creation page
		} else {
			$last_id = $this->M_user->getLastId();

			// If no last ID found, set id_user to 1
			if ($last_id == null) {
				$id_user = 1;
			} else {
				// Increment the last ID by 1
				$id_user = $last_id + 1;
			}

			// Handle image upload
			$config['upload_path'] = './assets/images/';
			$config['allowed_types'] = 'jpg|jpeg|png';
			$config['max_size'] = 20000; // KB
			$config['file_name'] = 'user_' . time(); // Unique filename

			$this->load->library('upload', $config);

			if (!$this->upload->do_upload('img_user')) {
				$error = $this->upload->display_errors();

				// If the error is due to not selecting a file, use the default image
				if (strpos($error, 'You did not select a file to upload.') !== false) {
					$img_user = 'user.png'; // Default image if no file is uploaded
				} else {
					echo "<script>alert('$error');</script>";
					redirect('User/create'); // Redirect back to the user creation page
				}
			} else {
				$img_user_data = $this->upload->data();
				$img_user = $img_user_data['file_name']; // Use the uploaded file name
			}

			$password = $this->input->post('password');
			$data = array(
				'id_user' => $id_user,
				'username' => $this->input->post('username'),
				'email' => $this->input->post('email'),
				'password' => password_hash($password, PASSWORD_BCRYPT),
				'current_pwd' => $password,
				'nama' => $this->input->post('nama'),
				'role' => $this->input->post('role'),
				'img_user' => $img_user, // Use the uploaded image or default image
			);

			$this->M_user->save($data);
			$this->session->set_flashdata('create_success', 'Data berhasil ditambahkan!');
			redirect($this->redirect, 'refresh');
		}
	}


	public function edit()
	{
		$img_user = $this->session->userdata('img_user');
		$foto = $img_user && file_exists('assets/static/img/photos/staff/' . $img_user) ? 'assets/static/img/photos/staff/' . $img_user : 'assets/static/img/user.png';
		$data = array(
			'judul' => "DATA USER",
			'sub' => "Data User",
			'active_menu' => 'user',
			'id_user' => $this->session->userdata('id_user'),
			'role' => $this->session->userdata('role'),
			'nama' => $this->session->userdata('nama'),
			'foto' => $foto,
			'edit' => $this->M_user->edit($id),
		);
		$this->template->load('pages/admin/template', $this->view . 'edit', $data);
	}
	public function update($id)
	{
		$config['upload_path'] = './assets/images/';
		$config['allowed_types'] = 'jpg|jpeg|png';
		$config['max_size'] = 20000; // KB
		$config['file_name'] = 'user_' . time(); // Unique filename

		$this->load->library('upload', $config);

		if (!$this->upload->do_upload('img_user')) {
			$error = $this->upload->display_errors();

			// Check if the error is due to not selecting a new image
			if (strpos($error, 'You did not select a file to upload.') === false) {
				echo "<script>alert('$error');</script>";
				redirect($this->redirect, 'refresh');
			}
		} else {
			$img_user_data = $this->upload->data();
			$img_user = $img_user_data['file_name'];
		}

		$this->form_validation->set_rules('username', 'Username', 'required');

		// Ambil username dari database untuk memeriksa apakah ada perubahan
		$user = $this->M_user->getId($id);
		$username_db = $user->username;

		// Jika username tidak berubah, atur aturan validasi untuk mengabaikan is_unique
		if ($this->input->post('username') == $username_db) {
			$this->form_validation->set_rules('username', 'Username', 'required');
		} else {
			$this->form_validation->set_rules('username', 'Username', 'required|is_unique[user.username]');
		}

		if ($this->form_validation->run() == FALSE) {
			// Validasi gagal, simpan pesan error ke flashdata
			$this->session->set_flashdata('username_error', validation_errors());
			$data = array(
				'judul' => "DATA USER",
				'sub' => "Data User",
				'active_menu' => 'user',
				'id_user' => $this->session->userdata('id_user'),
				'nama' => $this->session->userdata('nama'),
				'email' => $this->session->userdata('email'),
				'username' => $this->session->userdata('username'),
				'password' => $this->session->userdata('password'),
				'foto' => $this->session->userdata('img_user'),
				'edit' => $this->M_user->edit($id),
				// 'username_error' => form_error('username')
			);
			$this->template->load('pages/admin/template', $this->view . 'edit', $data);
		} else {
			// Validasi berhasil, simpan data pengguna baru
			$password = $this->input->post('password');
			$data = array(
				'username' => $this->input->post('username'),
				'email' => $this->input->post('email'),
				'password' => password_hash($password, PASSWORD_BCRYPT),
				'current_pwd' => $password,
				'nama' => $this->input->post('nama'),
				'role' => $this->input->post('role'),
				'img_user' => isset($img_user) ? $img_user : $user->img_user
			);

			$this->M_user->update($id, $data);
			$this->session->set_flashdata('update_success', 'Data berhasil diupdate!');
			redirect($this->redirect, 'refresh');
		}
	}

	public function delete()
	{
		$id = $this->uri->segment(4);
		$data = array(
			'id_user' => $id
		);
		$this->M_user->delete($data);
		$this->session->set_flashdata('delete_success', 'Data berhasil dihapus!');
		redirect($this->redirect, 'refresh');
	}
}
