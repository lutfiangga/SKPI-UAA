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
		$this->db->join('prodi', 'mhs1.id_prodi = prodi.id_prodi');
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
	public function countSyaratWajib()
	{
		return $this->db->count_all($this->table);
	}
	public function getPoinByUser($id_user)
	{
		$this->db->join('kategori_syarat_wajib', 'syarat_wajib.id_kategori_syarat_wajib = kategori_syarat_wajib.id_kategori_syarat_wajib');
		// Mengonversi poin ke tipe numeric
		$this->db->select('SUM(CAST(kategori_syarat_wajib.poin AS NUMERIC)) as total_poin');
		$this->db->where('syarat_wajib.nim', $id_user);
		$this->db->where('syarat_wajib.status', 'diterima');
		$query = $this->db->get($this->table);
		return $query->row_array();
	}
	public function GetSyaratWajibMhs($nim)
	{
		$this->db->order_by($this->pk, 'asc');

		$this->db->join('akun_user', 'syarat_wajib.nim = akun_user.id_user', 'left');
		$this->db->join('mahasiswa AS mhs1', 'syarat_wajib.nim = mhs1.nim');
		$this->db->join('kategori_syarat_wajib', 'syarat_wajib.id_kategori_syarat_wajib = kategori_syarat_wajib.id_kategori_syarat_wajib');
		$this->db->join('mahasiswa AS mhs2', 'akun_user.id_user = mhs2.nim');
		$this->db->where('mhs1.nim', $nim);
		return $this->db->get($this->table)->result_array();
	}
	public function GetByNim($nim)
	{
		$this->db->order_by($this->pk, 'asc');

		$this->db->join('akun_user', 'syarat_wajib.nim = akun_user.id_user', 'left');
		$this->db->join('mahasiswa AS mhs1', 'syarat_wajib.nim = mhs1.nim');
		$this->db->join('kategori_syarat_wajib', 'syarat_wajib.id_kategori_syarat_wajib = kategori_syarat_wajib.id_kategori_syarat_wajib');
		$this->db->join('mahasiswa AS mhs2', 'akun_user.id_user = mhs2.nim');
		$this->db->where('mhs1.nim', $nim);
		$this->db->where('syarat_wajib.status', 'diterima');
		return $this->db->get($this->table)->result_array();
	}

	public function countSPM()
	{
		return $this->db->count_all($this->table);
	}
	public function countAccepted()
	{
		$this->db->where('status', 'diterima');
		return $this->db->count_all_results($this->table);
	}

	public function countDeclined()
	{
		$this->db->where('status', 'ditolak');
		return $this->db->count_all_results($this->table);
	}

	public function countPending()
	{
		$this->db->where('status', 'pending');
		return $this->db->count_all_results($this->table);
	}


	public function countNotPending()
	{
		$this->db->select('status, COUNT(*) as count');
		$this->db->where('status !=', 'pending');
		$this->db->group_by('status');
		return $this->db->get($this->table)->result_array();
	}

}
