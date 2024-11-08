<?php
defined('BASEPATH') or exit('No direct script access allowed');
class M_fakultas extends CI_Model
{
	//$table sebagai tabel yang digunakan, dengan pemanggilannya $this->table
	private $table = 'fakultas';
	//$pk atau Primary Key yang digunakan, dengan pemanggilannya $this->pk
	private $pk = 'id_fakultas';
	public function GetAll()
	{
		$this->db->order_by($this->pk, 'asc');
		$this->db->join('staff', 'fakultas.id_dekan = staff.id_staff');
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
	public function countFakultas()
	{
		return $this->db->count_all($this->table);
	}
}
