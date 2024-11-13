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
		$this->load->model(array('M_spm', 'M_profile', 'M_dirKemahasiswaan', 'M_etiquette', 'M_kategori_spm'));
	}
	function index()
	{
		$role = $this->session->userdata('role');
		$img_user = $this->session->userdata('img_user');
		$foto = $img_user ? 'assets/static/img/photos/' . $role . '/' . $img_user : 'assets/static/img/user.png';
		$id = $this->session->userdata('id_user');
		$akun = $this->session->userdata('id_akun');
		$data = array(
			'judul' => "SPM MAHASISWA",
			'sub' => "SPM Mahasiswa",
			'active_menu' => 'spm_mhs',
			'role' => $role,
			'nama' => $this->session->userdata('nama'),
			'id_user' => $id,
			'id_akun' => $akun,
			'foto' => $foto,
			'read' => $this->M_spm->GetSpm($id),
		);
		$this->template->load('layout/components/layout', $this->view . 'read', $data);
	}

	public function print()
	{
		$role = $this->session->userdata('role');
		$img_user = $this->session->userdata('img_user');
		$foto = $img_user ? 'assets/static/img/photos/' . $role . '/' . $img_user : 'assets/static/img/user.png';
		$id = $this->session->userdata('id_user');
		$data = array(
			'judul' => "SPM MAHASISWA",
			'sub' => "SPM Mahasiswa",
			'active_menu' => 'spm_mhs',
			'nama' => $this->session->userdata('nama'),
			'role' => $role,
			'id_user' => $id,
			'foto' => $foto,
			'SpmPoin' => $this->M_spm->getPoinByUser($id),
			'etiquettePoin' => $this->M_etiquette->getPoinByUser($id),
			'mhs' => $this->M_profile->getById($id),
			'direktur' => $this->M_dirKemahasiswaan->GetDirektur(),
			'spm' => $this->M_spm->GetByNim($id),
			'etiquette' => $this->M_etiquette->GetByNim($id),
		);
		$this->template->load('layout/components/layout_export', $this->view . 'print', $data);
	}
	public function export_pdf()
	{
		$role = $this->session->userdata('role');
		$img_user = $this->session->userdata('img_user');
		$foto = $img_user ? 'assets/static/img/photos/' . $role . '/' . $img_user : 'assets/static/img/user.png';
		$id = $this->session->userdata('id_user');
		$data = array(
			'judul' => "SPM MAHASISWA",
			'sub' => "SPM Mahasiswa",
			'active_menu' => 'spm_mhs',
			'nama' => $this->session->userdata('nama'),
			'role' => $role,
			'id_user' => $id,
			'foto' => $foto,
			'SpmPoin' => $this->M_spm->getPoinByUser($id),
			'etiquettePoin' => $this->M_etiquette->getPoinByUser($id),
			'mhs' => $this->M_profile->getById($id),
			'direktur' => $this->M_dirKemahasiswaan->GetDirektur(),
			'spm' => $this->M_spm->GetByNim($id),
			'etiquette' => $this->M_etiquette->GetByNim($id),
		);
		$this->template->load('layout/components/layout_export', $this->view . 'pdf', $data);
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
		$config_foto['upload_path'] = './assets/static/spm/pdf/foto_kegiatan/';
		$config_foto['allowed_types'] = 'pdf|PDF';
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

		$data = array(
			'id_spm' => generate_uuid(),
			'nim' => $id_user,
			'id_kategori_spm' => $this->security->xss_clean($this->input->post('id_kategori_spm')),
			'kegiatan' => $this->security->xss_clean($this->input->post('kegiatan')),
			'tanggal_mulai' => $this->security->xss_clean($this->input->post('tanggal_mulai')),
			'penyelenggara' => $this->security->xss_clean($this->input->post('penyelenggara')),
			'sertifikat' => $sertifikat,
			'link_kegiatan' => $this->security->xss_clean($this->input->post('link_kegiatan')),
			'tempat_kegiatan' => !empty($this->security->xss_clean($this->input->post('tempat_kegiatan'))) ? $this->security->xss_clean($this->input->post('tempat_kegiatan')) : NULL,
			'tanggal_selesai' => !empty($this->security->xss_clean($this->input->post('tanggal_selesai'))) ? $this->security->xss_clean($this->input->post('tanggal_selesai')) : NULL,
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
		$config_foto['upload_path'] = './assets/static/spm/pdf/foto_kegiatan/';
		$config_foto['allowed_types'] = 'pdf|PDF';
		$config_foto['max_size'] = 6000; // KB
		$config_foto['file_name'] = $role . '_' . $id_user . '_' . time();

		$this->upload->initialize($config_foto);

		if ($this->upload->do_upload('foto_kegiatan')) {
			$foto_kegiatan_data = $this->upload->data();
			$foto_kegiatan = $foto_kegiatan_data['file_name'];

			// Hapus foto kegiatan lama
			if (!empty($spm['foto_kegiatan']) && file_exists('./assets/static/spm/pdf/foto_kegiatan/' . $spm['foto_kegiatan'])) {
				unlink('./assets/static/spm/pdf/foto_kegiatan/' . $spm['foto_kegiatan']);
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
			'kegiatan' => $this->security->xss_clean($this->input->post('kegiatan')),
			'tanggal_mulai' => $this->security->xss_clean($this->input->post('tanggal_mulai')),
			'penyelenggara' => $this->security->xss_clean($this->input->post('penyelenggara')),
			'sertifikat' => $sertifikat,
			'link_kegiatan' => $this->security->xss_clean($this->input->post('link_kegiatan')),
			'tempat_kegiatan' => !empty($this->security->xss_clean($this->input->post('tempat_kegiatan'))) ? $this->security->xss_clean($this->input->post('tempat_kegiatan')) : NULL,
			'tanggal_selesai' => !empty($this->security->xss_clean($this->input->post('tanggal_selesai'))) ? $this->security->xss_clean($this->input->post('tanggal_selesai')) : NULL,
			'foto_kegiatan' => $foto_kegiatan,
			'surat_tugas' => $surat_tugas,
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
				$filePath = './assets/static/spm/pdf/foto_kegiatan/' . $foto_kegiatan;
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
