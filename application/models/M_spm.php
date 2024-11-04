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
		$this->db->join('kategori_spm', 'spm.id_kategori = kategori_spm.id_kategori_spm');
		$this->db->join('mahasiswa AS mhs2', 'akun_user.id_user = mhs2.nim');

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
	public function getLastId()
	{
		$this->db->select_max($this->pk);
		$query = $this->db->get($this->table);
		$result = $query->row_array();

		return $result[$this->pk];
	}
	public function getPoinByUser($id_user)
	{
		$this->db->join('kategori_spm', 'spm.id_kategori = kategori_spm.id_kategori_spm');
		// Mengonversi poin ke tipe numeric
		$this->db->select('SUM(CAST(kategori_spm.poin AS NUMERIC)) as total_poin');
		$this->db->where('spm.nim', $id_user);
		$query = $this->db->get($this->table);
		return $query->row_array();
	}

	public function countSPM()
	{
		return $this->db->count_all($this->table);
	}
	public function GetByNim($nim)
	{
		$this->db->order_by($this->pk, 'desc');

		$this->db->join('akun_user', 'spm.nim = akun_user.id_user', 'left');
		$this->db->join('mahasiswa AS mhs1', 'spm.nim = mhs1.nim');
		$this->db->join('kategori_spm', 'spm.id_kategori = kategori_spm.id_kategori_spm');
		$this->db->join('mahasiswa AS mhs2', 'akun_user.id_user = mhs2.nim');
		$this->db->where('mhs1.nim', $nim);

		$query = $this->db->get($this->table);
		return $query->result_array();
	}
}
