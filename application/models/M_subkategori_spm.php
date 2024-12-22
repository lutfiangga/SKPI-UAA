<?php
defined('BASEPATH') or exit('No direct script access allowed');
class M_subkategori_spm extends CI_Model
{
	//$table sebagai tabel yang digunakan, dengan pemanggilannya $this->table
	private $table = 'subkategori_spm';
	//$pk atau Primary Key yang digunakan, dengan pemanggilannya $this->pk
	private $pk = 'id_subkategori_spm';
	public function GetAll()
	{
		$this->db->order_by($this->pk, 'asc');
		$this->db->join('kategori_spm', 'subkategori_spm.id_kategori_spm = kategori_spm.id_kategori_spm');
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
	public function countKategori()
	{
		return $this->db->count_all($this->table);
	}

	public function get_kategori_grouped()
	{
		$this->db->order_by('kategori', 'asc');
		$this->db->join('kategori_spm', 'subkategori_spm.id_kategori_spm = kategori_spm.id_kategori_spm');
		$query = $this->db->get($this->table)->result_array();

		$result = [];
		foreach ($query as $row) {

			$label = $row['kategori'];
			$options = $row['subkategori'];
			$result[$label][$row['id_subkategori_spm']] = $options;
		}

		return $result;
	}
}
