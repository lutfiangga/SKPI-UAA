<?php
defined('BASEPATH') or exit('No direct script access allowed');
class M_auth extends CI_Model
{
	private $table = 'akun_user';
	private $pk = 'id_akun';
	public function CekLogin($credentials, $user_credentials)
	{
		$this->db->where($credentials, $user_credentials);
		$this->db->select('akun_user.*, 
        COALESCE(staff.nama, mahasiswa.nama) as nama,
		COALESCE(mahasiswa.nim) as nim,
		');

		$this->db->join('staff', 'akun_user.id_user = staff.id_staff', 'left');
		$this->db->join('mahasiswa', 'akun_user.id_user = mahasiswa.nim', 'left');

		// Mengambil hasil query
		return $this->db->get($this->table)->row_array();
	}

	public function update($id, $data)
	{
		$this->db->where('akun_user.id_user', $id);
		$this->db->update($this->table, $data);
	}
	public function getId($id_user)
	{
		$this->db->where('akun_user.id_user', $id_user);
		$query = $this->db->get($this->table);
		return $query->row();
	}
	public function GetStaff()
	{
		$this->db->order_by($this->pk, 'asc');
		$this->db->join('staff', 'akun_user.id_user = staff.id_staff');
		return $this->db->get($this->table);
	}

	public function GetAdmin()
	{
		$this->db->order_by($this->pk, 'asc');
		$this->db->where('akun_user.role','admin');
		$this->db->join('staff', 'akun_user.id_user = staff.id_staff');
		return $this->db->get($this->table)->result_array();
	}
	public function GetAdmisi()
	{
		$this->db->order_by($this->pk, 'asc');
		$this->db->where('akun_user.role','admisi');
		$this->db->join('staff', 'akun_user.id_user = staff.id_staff');
		return $this->db->get($this->table)->result_array();
	}
	public function GetProdi()
	{
		$this->db->order_by($this->pk, 'asc');
		$this->db->where('akun_user.role','prodi');
		$this->db->join('staff', 'akun_user.id_user = staff.id_staff');
		return $this->db->get($this->table)->result_array();
	}
	public function GetEtiquette()
	{
		$this->db->order_by($this->pk, 'asc');
		$this->db->where('akun_user.role','etiquette');
		$this->db->join('staff', 'akun_user.id_user = staff.id_staff');
		return $this->db->get($this->table)->result_array();
	}
	public function GetKemahasiswaan()
	{
		$this->db->order_by($this->pk, 'asc');
		$this->db->where('akun_user.role','kemahasiswaan');
		$this->db->join('staff', 'akun_user.id_user = staff.id_staff');
		return $this->db->get($this->table)->result_array();
	}

	public function GetMhs()
	{
		$this->db->order_by($this->pk, 'desc');
		$this->db->join('mahasiswa', 'akun_user.id_user = mahasiswa.nim');
		$this->db->join('prodi', 'mahasiswa.id_prodi = prodi.id_prodi', 'left');
		$this->db->join('fakultas', 'prodi.id_fakultas = fakultas.id_fakultas', 'left');

		$mahasiswa = $this->db->get($this->table)->result_array();

		foreach ($mahasiswa as &$mhs) {
			$mhs['semester'] = $this->getSemester($mhs);
		}
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
		return $total_semesters > 0 ? $total_semesters + 1 : 1;
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

	public function updateAccount($id, $data)
	{
		$this->db->where($this->pk, $id);
		return $this->db->update($this->table, $data);
	}
	public function delete($data)
	{
		$this->db->where($data);
		return $this->db->delete($this->table);
	}
	public function getLastId()
	{
		$this->db->select_max($this->pk);
		$query = $this->db->get($this->table);
		$result = $query->row_array();

		return $result[$this->pk];
	}
}
