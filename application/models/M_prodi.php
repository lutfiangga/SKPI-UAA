<?php
defined('BASEPATH') or exit('No direct script access allowed');
class M_prodi extends CI_Model
{
	//$table sebagai tabel yang digunakan, dengan pemanggilannya $this->table
	private $table = 'prodi';
	//$pk atau Primary Key yang digunakan, dengan pemanggilannya $this->pk
	private $pk = 'id_prodi';
	public function GetAll()
	{
		$this->db->order_by($this->pk, 'asc');
		$this->db->join('fakultas', 'prodi.id_fakultas = fakultas.id_fakultas');
		$this->db->join('staff', 'prodi.id_kaprodi = staff.id_staff');
		$this->db->join('akreditasi', 'prodi.id_akreditasi = akreditasi.id_akreditasi');
		$this->db->join('jenjang', 'prodi.id_jenjang = jenjang.id_jenjang');
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
	public function getId($id_prodi)
	{
		$this->db->where($this->pk, $id_prodi);
		$this->db->join('fakultas', 'prodi.id_fakultas = fakultas.id_fakultas');
		$this->db->join('akreditasi', 'prodi.id_akreditasi = akreditasi.id_akreditasi');
		$this->db->join('jenjang', 'prodi.id_jenjang = jenjang.id_jenjang');
		return $this->db->get($this->table)->row_array();
	}
}
