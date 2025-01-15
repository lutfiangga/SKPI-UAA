<?php
defined('BASEPATH') or exit('No direct script access allowed');
class M_mahasiswa extends CI_Model
{
	//$table sebagai tabel yang digunakan, dengan pemanggilannya $this->table
	private $table = 'mahasiswa';
	//$pk atau Primary Key yang digunakan, dengan pemanggilannya $this->pk
	private $pk = 'nim';
	public function GetAll()
	{
		$this->db->order_by($this->pk, 'desc');
		$this->db->join('akun_user', 'mahasiswa.nim = akun_user.id_user');
		$this->db->join('prodi', 'mahasiswa.id_prodi = prodi.id_prodi', 'left');
		$this->db->join('fakultas', 'prodi.id_fakultas = fakultas.id_fakultas', 'left');
		$this->db->join('jenjang', 'prodi.id_jenjang = jenjang.id_jenjang', 'left');
		return $this->db->get($this->table)->result_array();
	}

	public function GetAllMhs()
	{
		$this->db->order_by($this->pk, 'desc');
		$this->db->join('prodi', 'mahasiswa.id_prodi = prodi.id_prodi', 'left');
		$this->db->join('fakultas', 'prodi.id_fakultas = fakultas.id_fakultas', 'left');
		$this->db->join('jenjang', 'prodi.id_jenjang = jenjang.id_jenjang', 'left');
		$mahasiswa = $this->db->get($this->table)->result_array();

		foreach ($mahasiswa as &$mhs) {
			$mhs['semester'] = $this->getSemester($mhs);
		}
		return $mahasiswa;
	}

	public function getSKPI($id)
	{
		$this->db->where($this->pk, $id);
		$this->db->join('prodi', 'mahasiswa.id_prodi = prodi.id_prodi', 'left');
		$this->db->join('fakultas', 'prodi.id_fakultas = fakultas.id_fakultas', 'left');
		$this->db->join('staff', 'fakultas.id_dekan = staff.id_staff', 'left');
		$this->db->join('jenjang', 'prodi.id_jenjang = jenjang.id_jenjang', 'left');

		// Pilih semua kolom dari mahasiswa serta kolom dekan dari tabel staff
		$this->db->select('mahasiswa.*, prodi.*, fakultas.*, jenjang.*, staff.nama as nama_dekan, staff.id_staff');

		$mahasiswa = $this->db->get($this->table)->row_array();
		$mahasiswa['semester'] = $this->getSemester($mahasiswa);

		return $mahasiswa;
	}

	private function getSemester($mhs)
	{
		$tahun_masuk = $mhs['tahun_masuk'];
		$tahun_lulus = $mhs['tahun_lulus'];
		$status_mahasiswa = $mhs['status_mahasiswa'];
		$semester_diakui = $mhs['semester_diakui'];
		$periode = $mhs['periode'];

		// Use tahun_lulus if it's not empty, otherwise use current year
		$current_year = !empty($tahun_lulus) ? $tahun_lulus : date('Y');

		// Calculate the difference in years
		$year_diff = $current_year - $tahun_masuk;
		$total_semesters = $year_diff * 2;


		if ($periode === 'Genap') {
			$total_semesters += 1;
		}


		if ($status_mahasiswa === 'Mahasiswa Transfer') {
			$total_semesters += $semester_diakui;
		}

		// Return total semesters starting from 1 instead of 0
		return $total_semesters > 0 ? $total_semesters + 1 - 2 : 1;
	}


	public function getMhs()
	{
		$this->db->select('nim', 'nama');
		return $this->db->get($this->table);
	}
	public function save($data)
	{
		return $this->db->insert($this->table, $data);
	}
	public function edit($id)
	{
		$this->db->where($this->pk, $id);
		return $this->db->get($this->table)->row_array();
	}
	public function update($id, $data)
	{
		$this->db->where($this->pk, $id);
		return $this->db->update($this->table, $data);
	}
	public function delete($data)
	{
		$this->db->where($data);
		return $this->db->delete($this->table);
	}
	public function getId($nim)
	{
		$this->db->where($this->pk, $nim);
		$this->db->join('prodi', 'mahasiswa.id_prodi = prodi.id_prodi', 'left');
		$this->db->join('fakultas', 'prodi.id_fakultas = fakultas.id_fakultas', 'left');
		$this->db->join('staff', 'fakultas.id_dekan = staff.id_staff', 'left');
		$this->db->join('jenjang', 'prodi.id_jenjang = jenjang.id_jenjang', 'left');
		return $this->db->get($this->table)->row_array();
	}

	// Di model M_mahasiswa
	// Di model M_mahasiswa
	public function getMahasiswaEligible()
	{
		// Dapatkan semua mahasiswa dengan skor mereka
		$this->db->select('mahasiswa.*, prodi.prodi, fakultas.fakultas, 
                       jenjang.id_jenjang, mahasiswa.tahun_masuk,
                       syarat_wajib.skor as skor_wajib,
                       spm.skor as skor_spm,
                       akun_user.id_akun');

		$this->db->from('mahasiswa');

		// Join dengan akun_user
		$this->db->join('akun_user', 'mahasiswa.nim = akun_user.id_user', 'left');

		// Join untuk data program studi dan fakultas
		$this->db->join('prodi', 'mahasiswa.id_prodi = prodi.id_prodi', 'left');
		$this->db->join('fakultas', 'prodi.id_fakultas = fakultas.id_fakultas', 'left');
		$this->db->join('jenjang', 'prodi.id_jenjang = jenjang.id_jenjang', 'left');

		// Join untuk skor syarat wajib melalui akun_user
		$this->db->join(
			'syarat_wajib',
			'akun_user.id_akun = syarat_wajib.id_akun',
			'left'
		);

		// Join untuk skor SPM melalui akun_user
		$this->db->join(
			'spm',
			'akun_user.id_akun = spm.id_akun',
			'left'
		);

		$result = $this->db->get()->result_array();

		// Filter mahasiswa yang memenuhi syarat
		$eligible_students = array();

		foreach ($result as $student) {
			// Dapatkan skor minimum untuk masing-masing kategori
			$min_wajib = $this->M_skor_syarat_wajib->skorMinimum(
				$student['tahun_masuk'],
				$student['id_jenjang']
			);

			$min_spm = $this->M_skor_spm->skorMinimum(
				$student['tahun_masuk'],
				$student['id_jenjang']
			);

			// Cek apakah mahasiswa memenuhi kedua syarat
			if (
				$min_wajib && $min_spm &&
				$student['skor_wajib'] >= $min_wajib['skor'] &&
				$student['skor_spm'] >= $min_spm['skor']
			) {

				// Tambahkan skor minimum ke data mahasiswa
				$student['min_skor_wajib'] = $min_wajib['skor'];
				$student['min_skor_spm'] = $min_spm['skor'];

				$eligible_students[] = $student;
			}
		}

		return $eligible_students;
	}
}
