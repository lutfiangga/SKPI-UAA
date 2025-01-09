<?php
defined('BASEPATH') or exit('No direct script access allowed');
class M_periode_spm extends CI_Model
{
	//$table sebagai tabel yang digunakan, dengan pemanggilannya $this->table
	private $table = 'periode_spm';
	//$pk atau Primary Key yang digunakan, dengan pemanggilannya $this->pk
	private $pk = 'id_periode';
	public function GetAll()
	{
		$this->db->order_by('periode', 'desc');
		return $this->db->get($this->table)->result_array();
	}
	public function periode($tahun, $tanggal)
	{
		$this->db->where('periode', $tahun);
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

}
