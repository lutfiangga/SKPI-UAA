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
		$this->load->model(array('M_spm', 'M_profile', 'M_syarat_wajib', 'M_periode_spm', 'M_mahasiswa', 'M_skor_spm', 'M_skor_syarat_wajib', 'M_dirKemahasiswaan', 'M_etiquette', 'M_subkategori_spm'));
	}
	function index()
	{
		$img_user = $this->session->userdata('img_user');
		$foto = $img_user ? 'assets/static/img/photos/mahasiswa/' . $img_user : 'assets/static/img/user.png';
		$id = $this->session->userdata('id_akun');
		$data = array(
			'judul' => "SPM MAHASISWA",
			'sub' => "SPM Mahasiswa",
			'active_menu' => 'spm_mhs',
			'role' => $this->session->userdata('role'),
			'nama' => $this->session->userdata('nama'),
			'id_user' => $this->session->userdata('id_user'),
			'id_akun' => $id,
			'foto' => $foto,
			'read' => $this->M_spm->GetSpm($id),
		);
		$this->template->load('layout/components/layout', $this->view . 'read', $data);
	}

	public function print()
	{
		$img_user = $this->session->userdata('img_user');
		$foto = $img_user ? 'assets/static/img/photos/mahasiswa/' . $img_user : 'assets/static/img/user.png';
		$id = $this->session->userdata('id_akun');
		$data = array(
			'judul' => "SPM MAHASISWA",
			'sub' => "SPM Mahasiswa",
			'active_menu' => 'spm_mhs',
			'nama' => $this->session->userdata('nama'),
			'role' => $this->session->userdata('role'),
			'id_user' => $this->session->userdata('id_user'),
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
		$img_user = $this->session->userdata('img_user');
		$foto = $img_user ? 'assets/static/img/photos/mahasiswa/' . $img_user : 'assets/static/img/user.png';
		$id = $this->session->userdata('id_akun');
		$id_user = $this->session->userdata('id_user');

		$mhs = $this->M_mahasiswa->getId($id_user);

		$data = array(
			'judul' => "SPM MAHASISWA",
			'sub' => "SPM Mahasiswa",
			'active_menu' => 'spm_mhs',
			'nama' => $this->session->userdata('nama'),
			'role' => $this->session->userdata('role'),
			'id_user' => $id_user,
			'foto' => $foto,
			'SpmPoin' => $this->M_spm->getPoinByUser($id),
			'syaratSkor' => $this->M_syarat_wajib->getPoinByUser($id),
			'syaratWajib' => $this->M_syarat_wajib->GetSyaratWajibMhs($id),
			'etiquettePoin' => $this->M_etiquette->getPoinByUser($id_user),
			'mhs' => $mhs,
			'direktur' => $this->M_dirKemahasiswaan->GetDirektur(),
			'spm' => $this->M_spm->GetByNim($id),
			'etiquette' => $this->M_etiquette->GetByNim($id_user),
			'skorSyaratWajib' => $this->M_skor_syarat_wajib->skorMinimum($mhs['tahun_masuk'], $mhs['id_jenjang']),
			'skorMinSpm' => $this->M_skor_spm->skorMinimum($mhs['tahun_masuk'], $mhs['id_jenjang']),
		);
		$this->template->load('layout/components/layout_export', $this->view . 'pdf', $data);
	}

	function create()
	{
		$img_user = $this->session->userdata('img_user');
		$foto = $img_user ? 'assets/static/img/photos/mahasiswa/' . $img_user : 'assets/static/img/user.png';
		$data = array(
			'judul' => "SPM MAHASISWA",
			'sub' => "SPM Mahasiswa",
			'active_menu' => 'spm_mhs',
			'role' => $this->session->userdata('role'),
			'nama' => $this->session->userdata('nama'),
			'id_user' => $this->session->userdata('id_user'),
			'foto' => $foto,
			'kategori' => $this->M_subkategori_spm->get_kategori_grouped(),
		);
		$this->template->load('layout/components/layout', $this->view . 'create', $data);
	}
	public function save()
	{
		cek_csrf();

		//validasi
		$this->form_validation->set_rules('tanggal_mulai', 'Tanggal Mulai', 'required|callback_check_periode');
		$this->form_validation->set_rules('id_subkategori_spm', 'Subkategori SPM', 'required');
		$this->form_validation->set_rules('kegiatan', 'Kegiatan', 'required');
		$this->form_validation->set_rules('penyelenggara', 'Penyelenggara', 'required');


		if ($this->form_validation->run() == FALSE) {
			$this->session->set_flashdata('create_error', validation_errors());
			redirect($this->redirect . '/create');
		} else {
			// Mendapatkan data pengguna
			$id_user = $this->session->userdata('id_user');
			$id_akun = $this->session->userdata('id_akun');
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
				'id_spm' => generate_uuid_v7(),
				'id_akun' => $id_akun,
				'id_subkategori_spm' => $this->security->xss_clean($this->input->post('id_subkategori_spm')),
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
	}

	function edit()
	{
		$id = $this->uri->segment(4);
		$img_user = $this->session->userdata('img_user');
		$foto = $img_user ? 'assets/static/img/photos/mahasiswa/' . $img_user : 'assets/static/img/user.png';
		$data = array(
			'judul' => "SPM MAHASISWA",
			'sub' => "SPM Mahasiswa",
			'active_menu' => 'spm_mhs',
			'role' => $this->session->userdata('role'),
			'nama' => $this->session->userdata('nama'),
			'id_user' => $this->session->userdata('id_user'),
			'foto' => $foto,
			'kategori' => $this->M_subkategori_spm->get_kategori_grouped(),
			'edit' => $this->M_spm->edit($id),
		);
		$this->template->load('layout/components/layout', $this->view . 'edit', $data);
	}

	public function update($id)
	{
		cek_csrf();
		$this->form_validation->set_rules('tanggal_mulai', 'Tanggal Mulai', 'required|callback_check_periode');
		$this->form_validation->set_rules('id_subkategori_spm', 'Subkategori SPM', 'required');
		$this->form_validation->set_rules('kegiatan', 'Kegiatan', 'required');
		$this->form_validation->set_rules('penyelenggara', 'Penyelenggara', 'required');

		if ($this->form_validation->run() == FALSE) {
			$this->session->set_flashdata('create_error', validation_errors());
			redirect($this->redirect . '/create');
		} else {
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
				'id_subkategori_spm' => $this->security->xss_clean($this->input->post('id_subkategori_spm')),
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

	// Di Controller
	public function check_periode($tanggal_mulai)
	{
		// Ambil tahun sekarang
		$current_year = date('Y');

		// Get periode data menggunakan model M_periode_spm
		$periode = $this->M_periode_spm->periode($current_year, $tanggal_mulai);

		if (!$periode) {
			$this->form_validation->set_message('check_periode', 'Periode pendaftaran untuk tahun ' . $current_year . ' belum dibuka');
			return FALSE;
		}

		// Convert tanggal input dan periode_kegiatan ke timestamp untuk komparasi
		$input_date = strtotime($tanggal_mulai);
		$periode_kegiatan = strtotime($periode['periode_kegiatan']);

		// Check if input date is less than periode_kegiatan
		if ($input_date < $periode_kegiatan) {
			$this->form_validation->set_message('check_periode', 'Tanggal mulai kegiatan tidak boleh kurang dari tanggal minimal ' . tanggal(date('Y-m-d', strtotime($periode['periode_kegiatan']))));
			return FALSE;
		}

		return TRUE;
	}
}
