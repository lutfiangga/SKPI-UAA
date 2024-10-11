<?php
defined('BASEPATH') or exit('No direct script access allowed');
class Spm_Mahasiswa extends CI_Controller
{
	private $view = "mahasiswa/pages/spm/";
	private $redirect = "Mahasiswa/Spm_Mahasiswa";
	public function __construct()
	{
		parent::__construct();
		//protected routes
		checkRole('Mahasiswa');
		$this->load->model(array('M_spm', 'M_kategori_spm'));
	}
	function index()
	{
		$role = $this->session->userdata('role');
		$img_user = $this->session->userdata('img_user');
		$foto = $img_user ? 'assets/static/img/photos/' . $role . '/' . $img_user : 'assets/static/img/user.png';
		$data = array(
			'judul' => "SPM MAHASISWA",
			'sub' => "SPM Mahasiswa",
			'active_menu' => 'spm_mhs',
			'role' => $role,
			'nama' => $this->session->userdata('nama'),
			'id_user' => $this->session->userdata('id_user'),
			'foto' => $foto,
			'read' => $this->M_spm->getAll(),
		);
		$this->template->load('layout/components/layout', $this->view . 'read', $data);
	}
	function create()
	{
		$role = $this->session->userdata('role');
		$img_user = $this->session->userdata('img_user');
		$foto = $img_user ? 'assets/static/img/photos/' . $role . '/' . $img_user : 'assets/static/img/user.png';
		$data = array(
			'judul' => "SPM MAHASISWA",
			'sub' => "SPM Mahasiswa",
			'active_menu' => 'spm_mhs',
			'role' => $role,
			'nama' => $this->session->userdata('nama'),
			'id_user' => $this->session->userdata('id_user'),
			'foto' => $foto,
			'kategori' => $this->M_kategori_spm->getAll(),
		);
		$this->template->load('layout/components/layout', $this->view . 'create', $data);
	}
	public function save()
	{
		cek_csrf();

		// Mendapatkan data pengguna
		$id_user = $this->session->userdata('id_user');
		$role = $this->session->userdata('role');

		// Proses upload sertifikat
		$sertifikat = '';
		$config_sertifikat['upload_path'] = './assets/static/spm/pdf/sertifikat/';
		$config_sertifikat['allowed_types'] = 'pdf|PDF';
		$config_sertifikat['max_size'] = 6000; // KB
		$config_sertifikat['file_name'] = $role . '_' . $id_user . '_' . time();

		$this->load->library('upload', $config_sertifikat);

		if ($this->upload->do_upload('sertifikat')) {
			$sertifikat_data = $this->upload->data();
			$sertifikat = $sertifikat_data['file_name'];
		} else {
			$sertifikat = $this->input->post('sertifikat_current');
		}

		// Proses upload foto kegiatan
		$foto_kegiatan = '';
		$config_foto['upload_path'] = './assets/static/spm/img/foto_kegiatan/';
		$config_foto['allowed_types'] = 'jpg|jpeg|png|wepb|JPG|PNG|JPEG|WEPB';
		$config_foto['max_size'] = 6000; // KB
		$config_foto['file_name'] = $role . '_' . $id_user . '_' . time();

		$this->upload->initialize($config_foto); // Re-initialize config untuk foto kegiatan

		if ($this->upload->do_upload('foto_kegiatan')) {
			$foto_kegiatan_data = $this->upload->data();
			$foto_kegiatan = $foto_kegiatan_data['file_name'];
		} else {
			$foto_kegiatan = $this->input->post('foto_kegiatan_current');
		}

		// Proses upload surat tugas
		$surat_tugas = '';
		$config_surat['upload_path'] = './assets/static/spm/pdf/surat_tugas/';
		$config_surat['allowed_types'] = 'pdf|PDF';
		$config_surat['max_size'] = 6000; // KB
		$config_surat['file_name'] = $role . '_' . $id_user . '_' . time();

		$this->upload->initialize($config_surat); // Re-initialize config untuk surat tugas

		if ($this->upload->do_upload('surat_tugas')) {
			$surat_tugas_data = $this->upload->data();
			$surat_tugas = $surat_tugas_data['file_name'];
		} else {
			$surat_tugas = $this->input->post('surat_tugas_current');
		}

		$last_id = $this->M_spm->getLastId(); //get last id
		// jika id tidak ditemukan, id diisi 1
		$id = ($last_id == null) ? 1 : $last_id + 1;
		$data = array(
			'id_spm' => $id,
			'nim' => $id_user,
			'id_kategori' => $this->input->post('id_kategori'),
			'nama_kegiatan' => $this->input->post('nama_kegiatan'),
			'tanggal_mulai' => $this->input->post('tanggal_mulai'),
			'tanggal_selesai' => $this->input->post('tanggal_selesai'),
			'penyelenggara' => $this->input->post('penyelenggara'),
			'sertifikat' => $sertifikat,
			'link_kegiatan' => $this->input->post('link_kegiatan'),
			'foto_kegiatan' => $foto_kegiatan,
			'surat_tugas' => $surat_tugas,
			'status' => 'pending'
		);

		$this->M_spm->save($data);
		redirect($this->redirect, 'refresh');
	}

	function edit()
	{
		$id = $this->uri->segment(4);
		$role = $this->session->userdata('role');
		$img_user = $this->session->userdata('img_user');
		$foto = $img_user ? 'assets/static/img/photos/' . $role . '/' . $img_user : 'assets/static/img/user.png';
		$data = array(
			'judul' => "SPM MAHASISWA",
			'sub' => "SPM Mahasiswa",
			'active_menu' => 'spm_mhs',
			'role' => $role,
			'nama' => $this->session->userdata('nama'),
			'id_user' => $this->session->userdata('id_user'),
			'foto' => $foto,
			'kategori' => $this->M_kategori_spm->getAll(),
			'edit' => $this->M_spm->edit($id),
		);
		$this->template->load('layout/components/layout', $this->view . 'edit', $data);
	}

	public function update($id)
	{
		cek_csrf();

		// get user session
		$id_user = $this->session->userdata('id_user');
		$role = $this->session->userdata('role');
		$spm = $this->M_spm->edit($id);

		// Proses upload sertifikat
		$sertifikat = $spm['sertifikat']; // Gunakan sertifikat lama sebagai default
		$config_sertifikat['upload_path'] = './assets/static/spm/pdf/sertifikat/';
		$config_sertifikat['allowed_types'] = 'pdf|PDF';
		$config_sertifikat['max_size'] = 6000; // KB
		$config_sertifikat['file_name'] = $role . '_' . $id_user . '_' . time();

		$this->load->library('upload', $config_sertifikat);

		if ($this->upload->do_upload('sertifikat')) {
			$sertifikat_data = $this->upload->data();
			$sertifikat = $sertifikat_data['file_name'];

			// Hapus sertifikat lama
			if (!empty($spm['sertifikat']) && file_exists('./assets/static/spm/pdf/sertifikat/' . $spm['sertifikat'])) {
				unlink('./assets/static/spm/pdf/sertifikat/' . $spm['sertifikat']);
			}
		}

		// Proses upload foto kegiatan
		$foto_kegiatan = $spm['foto_kegiatan']; // Gunakan foto_kegiatan lama sebagai default
		$config_foto['upload_path'] = './assets/static/spm/img/foto_kegiatan/';
		$config_foto['allowed_types'] = 'jpg|jpeg|png|webp|JPG|PNG|JPEG|WEBP';
		$config_foto['max_size'] = 6000; // KB
		$config_foto['file_name'] = $role . '_' . $id_user . '_' . time();

		$this->upload->initialize($config_foto);

		if ($this->upload->do_upload('foto_kegiatan')) {
			$foto_kegiatan_data = $this->upload->data();
			$foto_kegiatan = $foto_kegiatan_data['file_name'];

			// Hapus foto kegiatan lama
			if (!empty($spm['foto_kegiatan']) && file_exists('./assets/static/spm/img/foto_kegiatan/' . $spm['foto_kegiatan'])) {
				unlink('./assets/static/spm/img/foto_kegiatan/' . $spm['foto_kegiatan']);
			}
		}

		// Proses upload surat tugas
		$surat_tugas = $spm['surat_tugas']; // Gunakan surat_tugas lama sebagai default
		$config_surat['upload_path'] = './assets/static/spm/pdf/surat_tugas/';
		$config_surat['allowed_types'] = 'pdf|PDF';
		$config_surat['max_size'] = 6000; // KB
		$config_surat['file_name'] = $role . '_' . $id_user . '_' . time();

		$this->upload->initialize($config_surat);

		if ($this->upload->do_upload('surat_tugas')) {
			$surat_tugas_data = $this->upload->data();
			$surat_tugas = $surat_tugas_data['file_name'];

			// Hapus surat tugas lama
			if (!empty($spm['surat_tugas']) && file_exists('./assets/static/spm/pdf/surat_tugas/' . $spm['surat_tugas'])) {
				unlink('./assets/static/spm/pdf/surat_tugas/' . $spm['surat_tugas']);
			}
		}

		$data = array(
			'nama_kegiatan' => $this->input->post('nama_kegiatan'),
			'tanggal_mulai' => $this->input->post('tanggal_mulai'),
			'tanggal_selesai' => $this->input->post('tanggal_selesai'),
			'penyelenggara' => $this->input->post('penyelenggara'),
			'sertifikat' => $sertifikat,
			'link_kegiatan' => $this->input->post('link_kegiatan'),
			'foto_kegiatan' => $foto_kegiatan,
			'surat_tugas' => $surat_tugas,
			'status' => 'pending'
		);

		$this->M_spm->update($id, $data);
		redirect($this->redirect, 'refresh');
	}


	public function delete()
	{
		cek_csrf();
		$id = $this->input->post('id_spm');

		$spm = $this->M_spm->edit($id); // get data by id
		if ($spm) {
			$foto_kegiatan = $spm['foto_kegiatan'];
			$sertifikat = $spm['sertifikat'];
			$surat_tugas = $spm['surat_tugas'];

			// Hapus data dari database
			$data = array('id_spm' => $id);
			$this->M_spm->delete($data);

			// Hapus file dari server
			if ($foto_kegiatan) {
				$filePath = './assets/static/spm/img/foto_kegiatan/' . $foto_kegiatan;
				if (file_exists($filePath)) {
					unlink($filePath);
				}
			}
			if ($sertifikat) {
				$filePath = './assets/static/spm/pdf/sertifikat/' . $sertifikat;
				if (file_exists($filePath)) {
					unlink($filePath);
				}
			}
			if ($surat_tugas) {
				$filePath = './assets/static/spm/pdf/surat_tugas/' . $surat_tugas;
				if (file_exists($filePath)) {
					unlink($filePath);
				}
			}
		}
		$this->M_spm->delete($data);
		redirect($this->redirect, 'refresh');
	}
}
