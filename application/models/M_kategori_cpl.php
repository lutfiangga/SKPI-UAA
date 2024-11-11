<?php
defined('BASEPATH') or exit('No direct script access allowed');
class M_kategori_cpl extends CI_Model
{
	//$table sebagai tabel yang digunakan, dengan pemanggilannya $this->table
	private $table = 'kategori_cpl';
	//$pk atau Primary Key yang digunakan, dengan pemanggilannya $this->pk
	private $pk = 'id_kategori_cpl';
	public function GetAll()
	{
		$this->db->order_by($this->pk, 'asc');
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
	public function getById($id)
	{
		$this->db->where($this->pk, $id);
		return $this->db->get($this->table)->row_array();
	}
	public function GetByNim($nim)
	{
		$this->db->where('nim', $nim);
		$query = $this->db->get($this->table);
		return $query->result();
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
