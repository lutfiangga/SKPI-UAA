<?php
defined('BASEPATH') or exit('No direct script access allowed');
class M_syarat_wajib extends CI_Model
{
	//$table sebagai tabel yang digunakan, dengan pemanggilannya $this->table
	private $table = 'syarat_wajib';
	//$pk atau Primary Key yang digunakan, dengan pemanggilannya $this->pk
	private $pk = 'id_syarat_wajib';
	public function GetAll()
	{
		$this->db->order_by($this->pk, 'desc');

		$this->db->join('akun_user', 'syarat_wajib.nim = akun_user.id_user', 'left');
		$this->db->join('mahasiswa AS mhs1', 'syarat_wajib.nim = mhs1.nim');
		$this->db->join('kategori_syarat_wajib', 'syarat_wajib.id_kategori_syarat_wajib = kategori_syarat_wajib.id_kategori_syarat_wajib');
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
	public function countSyaratWajib()
	{
		return $this->db->count_all($this->table);
	}

	public function GetByNim($nim)
	{
		$this->db->order_by($this->pk, 'desc');

		$this->db->join('akun_user', 'syarat_wajib.nim = akun_user.id_user', 'left');
		$this->db->join('mahasiswa AS mhs1', 'syarat_wajib.nim = mhs1.nim');
		$this->db->join('kategori_syarat_wajib', 'syarat_wajib.id_kategori_syarat_wajib = kategori_syarat_wajib.id_kategori_syarat_wajib');
		$this->db->join('mahasiswa AS mhs2', 'akun_user.id_user = mhs2.nim');
		$this->db->where('mhs1.nim', $nim);

		return $this->db->get($this->table)->result_array();
	}

}
