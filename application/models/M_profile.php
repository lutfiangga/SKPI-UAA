<?php
defined('BASEPATH') or exit('No direct script access allowed');

class M_profile extends CI_Model
{
	private $table = 'akun_user';
	private $pk = 'id_akun';

	public function getById($id)
	{
		$this->db->select('akun_user.*, 
        COALESCE(staff.nama, mahasiswa.nama) as nama,
        COALESCE(staff.jenis_kelamin, mahasiswa.jenis_kelamin) as jenis_kelamin,
        COALESCE(mahasiswa.tempat_lahir) as tempat_lahir,
		COALESCE(staff.phone, mahasiswa.phone) as phone,
		COALESCE(staff.email, mahasiswa.email) as email,
		COALESCE(staff.tgl_lahir, mahasiswa.tgl_lahir) as tgl_lahir,
		COALESCE(mahasiswa.id_prodi) as id_prodi,
		COALESCE(mahasiswa.tahun_masuk) as tahun_masuk,
		COALESCE(mahasiswa.tahun_lulus) as tahun_lulus,
		COALESCE(mahasiswa.semester_diakui) as semester_diakui,
		COALESCE(mahasiswa.status_mahasiswa) as status_mahasiswa,
		COALESCE(mahasiswa.periode) as periode,
		COALESCE(prodi.prodi) as prodi,
		COALESCE(mahasiswa.nim) as nim,
		COALESCE(jenjang.id_jenjang) as id_jenjang,
		COALESCE(jenjang.tingkat_jenjang) as tingkat_jenjang,
		COALESCE(prodi.id_fakultas) as id_fakultas,
		COALESCE(fakultas.fakultas) as fakultas,
		COALESCE(staff.jabatan) as jabatan,
		');

		$this->db->join('staff', 'akun_user.id_user = staff.id_staff', 'left');
		$this->db->join('mahasiswa', 'akun_user.id_user = mahasiswa.nim', 'left');
		$this->db->join('prodi', 'mahasiswa.id_prodi = prodi.id_prodi', 'left');
		$this->db->join('fakultas', 'prodi.id_fakultas = fakultas.id_fakultas', 'left');
		$this->db->join('jenjang', 'prodi.id_jenjang = jenjang.id_jenjang', 'left');

		// get data by id for profile
		$this->db->where($this->pk, $id);
		$profile = $this->db->get($this->table)->row_array();
		$profile['semester'] = $this->getSemester($profile);

		return $profile;
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
		return $total_semesters > 0 ? $total_semesters + 1 : 1;
	}
	public function save($data)
	{
		$this->db->insert($this->table, $data);
	}

	public function edit($id)
	{
		$this->db->join('auth', 'user.id_user = auth.id_user');
		return $this->db->get_where($this->table, array('user.id_user' => $id))->row();
	}

	public function update($id, $data)
	{
		$this->db->where($this->pk, $id);
		$this->db->update($this->table, $data);
	}
}
