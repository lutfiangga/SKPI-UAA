<?php
defined('BASEPATH') or exit('No direct script access allowed');
class M_etiquette extends CI_Model
{
	//$table sebagai tabel yang digunakan, dengan pemanggilannya $this->table
	private $table = 'etiquette';
	//$pk atau Primary Key yang digunakan, dengan pemanggilannya $this->pk
	private $pk = 'id_etiquette';
	public function GetAll()
	{
		$this->db->order_by($this->pk, 'desc');

		$this->db->join('akun_user', 'etiquette.nim = akun_user.id_user', 'left');
		$this->db->join('mahasiswa AS mhs1', 'etiquette.nim = mhs1.nim');
		$this->db->join('prodi', 'mhs1.id_prodi = prodi.id_prodi');
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
	public function getById($id)
	{
		$this->db->where($this->pk, $id);
		return $this->db->get($this->table)->row_array();
	}
	public function GetByNim($nim)
	{
		$this->db->where('nim', $nim);
		$query = $this->db->get($this->table);
		return $query->result_array();
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
	public function countSyaratWajib()
	{
		return $this->db->count_all($this->table);
	}
	public function getPoinByUser($id_user)
	{
		$this->db->select('SUM(CAST(poin AS NUMERIC)) as total_poin');
		$this->db->where('etiquette.nim', $id_user);
		$query = $this->db->get($this->table);
		return $query->row_array();
	}
}
