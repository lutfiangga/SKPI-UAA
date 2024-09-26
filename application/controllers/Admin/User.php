<?php
defined('BASEPATH') or exit('No direct script access allowed');
class User extends CI_Controller
{
	private $view = "admin/pages/user/";
	private $redirect = "Admin/User";
	public function __construct()
	{
		parent::__construct();
		// IsAdmin();
		$this->load->model('M_user');
		$this->load->helper('text');
		// $this->load->library('form_validation');
	}
	function index()
	{
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
			'read' => $this->M_user->GetAll(),
		);
		$this->template->load('admin/layout/layout', $this->view . 'read', $data);
	}
	public function do_upload()
	{
		$config['upload_path']   = './assets/static/img/';  // Direktori untuk menyimpan file
		$config['allowed_types'] = 'gif|jpg|png';           // Jenis file yang diizinkan
		$config['max_size']      = 2048;                    // Maksimal ukuran file (dalam KB)
		$config['file_name']     = time();                  // Menyimpan file dengan nama unik

		$this->load->library('upload', $config);

		if (!$this->upload->do_upload('filepond')) {        // 'filepond' sesuai dengan name input di FilePond
			$error = array('error' => $this->upload->display_errors());
			echo json_encode(['status' => 'error', 'message' => $error]);
		} else {
			$data = $this->upload->data();
			echo json_encode(['status' => 'success', 'data' => $data]);
		}
	}
	public function create()
	{
		$data = array(
			'judul' => "DATA USER",
			'sub' => "Data User",
			'active_menu' => 'user',
			'id_user' => $this->session->userdata('id_user'),
			'email' => $this->session->userdata('email'),
			'nama' => $this->session->userdata('nama'),
			'username' => $this->session->userdata('username'),
			'password' => $this->session->userdata('password'),
			'foto' => $this->session->userdata('img_user'),
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
			// Using $this->redirect to call private $redirect = "rt"
			redirect($this->redirect, 'refresh');
		}
	}


	public function edit()
	{
		$id = $this->uri->segment(4);
		$data = array(
			//'edit' variabel yang akan dipanggil pada view edit.php
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
			redirect($this->redirect, 'refresh');
		}
	}

	public function delete()
	{
		$id = $this->uri->segment(4);
		$data = array(
			//data akan dihapus sesuai uri->segment(3) yang dipilih
			'id_user' => $id
		);
		$this->M_user->delete($data);
		redirect($this->redirect, 'refresh');
	}
}
