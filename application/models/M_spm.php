<?php
defined('BASEPATH') or exit('No direct script access allowed');
class M_spm extends CI_Model
{
	//$table sebagai tabel yang digunakan, dengan pemanggilannya $this->table
	private $table = 'spm';
	//$pk atau Primary Key yang digunakan, dengan pemanggilannya $this->pk
	private $pk = 'id_spm';
	public function GetAll()
	{
		$this->db->order_by($this->pk, 'desc');

		$this->db->join('akun_user', 'spm.nim = akun_user.id_user', 'left');
		$this->db->join('mahasiswa AS mhs1', 'spm.nim = mhs1.nim');
		$this->db->join('kategori_spm', 'spm.id_kategori_spm = kategori_spm.id_kategori_spm');
		$this->db->join('mahasiswa AS mhs2', 'akun_user.id_user = mhs2.nim');
		$this->db->join('prodi', 'mhs1.id_prodi = prodi.id_prodi');

		return $this->db->get($this->table)->result_array();
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
	public function getLastId()
	{
		$this->db->select_max($this->pk);
		$query = $this->db->get($this->table);
		$result = $query->row_array();

		return $result[$this->pk];
	}
	public function getPoinByUser($id_user)
	{
		$this->db->join('kategori_spm', 'spm.id_kategori_spm = kategori_spm.id_kategori_spm');
		$this->db->join('mahasiswa', 'spm.nim = mahasiswa.nim');
		$this->db->select('COALESCE(SUM(CAST(kategori_spm.poin AS NUMERIC)), 0) as spm_poin');
		$this->db->where('spm.nim', $id_user);
		$this->db->where('spm.status', 'diterima');
		$query = $this->db->get($this->table);
		return $query->row_array();
	}
	public function getPoinDecline($id_user)
	{
		$this->db->join('kategori_spm', 'spm.id_kategori_spm = kategori_spm.id_kategori_spm');
		$this->db->join('mahasiswa', 'spm.nim = mahasiswa.nim');
		$this->db->select('COALESCE(SUM(CAST(kategori_spm.poin AS NUMERIC)), 0) as spm_poin');
		$this->db->where('spm.nim', $id_user);
		$this->db->where('spm.status', 'ditolak');
		$query = $this->db->get($this->table);
		return $query->row_array();
	}


	public function countSPM()
	{
		return $this->db->count_all($this->table);
	}
	public function countAccepted()
	{
		$this->db->where('status', 'diterima');
		return $this->db->count_all_results($this->table);
	}

	public function countDeclined()
	{
		$this->db->where('status', 'ditolak');
		return $this->db->count_all_results($this->table);
	}

	public function countPending()
	{
		$this->db->where('status', 'pending');
		return $this->db->count_all_results($this->table);
	}


	public function countNotPending()
	{
		$this->db->select('status, COUNT(*) as count');
		$this->db->where('status !=', 'pending');
		$this->db->group_by('status');
		return $this->db->get($this->table)->result_array();
	}


	public function GetSpm($nim)
	{
		$this->db->order_by($this->pk, 'asc');

		$this->db->join('akun_user', 'spm.nim = akun_user.id_user', 'left');
		$this->db->join('kategori_spm', 'spm.id_kategori_spm = kategori_spm.id_kategori_spm');
		$this->db->join('mahasiswa', 'spm.nim = mahasiswa.nim');

		$this->db->where('mahasiswa.nim', $nim);
		return $this->db->get($this->table)->result_array();
	}

	public function GetByNim($nim)
	{
		$this->db->order_by($this->pk, 'asc');

		$this->db->join('akun_user', 'spm.nim = akun_user.id_user', 'left');
		$this->db->join('mahasiswa AS mhs1', 'spm.nim = mhs1.nim');
		$this->db->join('kategori_spm', 'spm.id_kategori_spm = kategori_spm.id_kategori_spm');
		$this->db->join('mahasiswa AS mhs2', 'akun_user.id_user = mhs2.nim');
		$this->db->where('mhs1.nim', $nim);
		$this->db->where('spm.status', 'diterima');
		$query = $this->db->get($this->table);
		return $query->result_array();
	}
	public function GetTotalByNim($nim)
	{
		$this->db->select('kategori_spm.kategori, SUM(CAST(kategori_spm.poin AS INTEGER)) AS total_poin');
		$this->db->join('akun_user', 'spm.nim = akun_user.id_user', 'left');
		$this->db->join('mahasiswa AS mhs1', 'spm.nim = mhs1.nim');
		$this->db->join('kategori_spm', 'spm.id_kategori_spm = kategori_spm.id_kategori_spm');
		$this->db->join('mahasiswa AS mhs2', 'akun_user.id_user = mhs2.nim');
		$this->db->where('mhs1.nim', $nim);
		$this->db->where('spm.status', 'diterima');
		$this->db->group_by('kategori_spm.kategori');
		$this->db->order_by('kategori_spm.kategori', 'asc');

		return $this->db->get($this->table)->result_array();
	}
}
