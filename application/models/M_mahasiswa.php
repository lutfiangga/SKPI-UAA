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
		return $this->db->get($this->table);
	}

	public function GetAllMhs()
	{
		$this->db->order_by($this->pk, 'desc');
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
	public function getId($id_user)
	{
		$this->db->where('id_user', $id_user);
		$query = $this->db->get($this->table);
		return $query->row();
	}

	public function getUsername($username)
	{
		$this->db->where($this->pk, $username);
		$query = $this->db->get($this->table);
		return $query->row(); // Returns a single row result
	}
	public function getLastId()
	{
		$this->db->select_max($this->pk);
		$query = $this->db->get($this->table);
		$result = $query->row_array();

		return $result[$this->pk];
	}
	public function countUser()
	{
		return $this->db->count_all($this->table);
	}
}
