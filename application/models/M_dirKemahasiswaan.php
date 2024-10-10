<?php
defined('BASEPATH') or exit('No direct script access allowed');
class M_dirKemahasiswaan extends CI_Model
{
	private $table = 'dir_kemahasiswaan';
	private $pk = 'id_direktur';
	public function GetDirektur()
	{
		$this->db->order_by($this->pk, 'desc');
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
}
