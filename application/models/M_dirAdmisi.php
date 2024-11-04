<?php
defined('BASEPATH') or exit('No direct script access allowed');
class M_dirAdmisi extends CI_Model
{
	private $table = 'dir_admisi';
	private $pk = 'id';
	public function GetDirektur()
	{
		$this->db->order_by($this->pk, 'desc');
		$this->db->join('staff', 'dir_admisi.id_direktur = staff.id_staff');
		$this->db->join('akun_user', 'dir_admisi.id_direktur = akun_user.id_user');
		return $this->db->get($this->table)->row_array();
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
}
