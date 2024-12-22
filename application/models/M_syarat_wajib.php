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

		$this->db->join('akun_user', 'syarat_wajib.id_akun = akun_user.id_akun');
		$this->db->join('kategori_syarat_wajib', 'syarat_wajib.id_kategori_syarat_wajib = kategori_syarat_wajib.id_kategori_syarat_wajib');
		$this->db->join('mahasiswa', 'akun_user.id_user = mahasiswa.nim');
		$this->db->join('prodi', 'mahasiswa.id_prodi = prodi.id_prodi');
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
	public function getPoinByUser($id)
	{
		$this->db->join('kategori_syarat_wajib', 'syarat_wajib.id_kategori_syarat_wajib = kategori_syarat_wajib.id_kategori_syarat_wajib');
		// Mengonversi poin ke tipe numeric
		$this->db->select('SUM(CAST(kategori_syarat_wajib.poin AS NUMERIC)) as syarat_skor');
		$this->db->where('syarat_wajib.id_akun', $id);
		$this->db->where('syarat_wajib.status', 'diterima');
		return $this->db->get($this->table)->row_array();
	}
	public function GetSyaratWajibMhs($id)
	{
		$this->db->order_by($this->pk, 'asc');

		$this->db->join('akun_user', 'syarat_wajib.id_akun = akun_user.id_akun', 'left');
		$this->db->join('kategori_syarat_wajib', 'syarat_wajib.id_kategori_syarat_wajib = kategori_syarat_wajib.id_kategori_syarat_wajib', 'left');
		$this->db->join('mahasiswa', 'akun_user.id_user = mahasiswa.nim', 'left');
		$this->db->where('akun_user.id_akun', $id);
		return $this->db->get($this->table)->result_array();
	}
	public function GetByNim($id)
	{
		$this->db->order_by($this->pk, 'asc');

		$this->db->join('akun_user', 'syarat_wajib.id_akun = akun_user.id_akun', 'left');
		$this->db->join('kategori_syarat_wajib', 'syarat_wajib.id_kategori_syarat_wajib = kategori_syarat_wajib.id_kategori_syarat_wajib');
		$this->db->join('mahasiswa', 'akun_user.id_user = mahasiswa.nim');
		$this->db->where('akun_user.id_akun', $id);
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

	public function GetSpm()
	{
		$this->db->select('akun_user.id_akun,  
        akun_user.img_user,  
        MAX(syarat_wajib.status) as status, 
        string_agg(DISTINCT CAST(syarat_wajib.id_syarat_wajib AS VARCHAR), \',\') as id_syarat_wajib,  
        (SELECT COUNT(*) FROM skpi.syarat_wajib WHERE syarat_wajib.id_akun = akun_user.id_akun AND syarat_wajib.status = \'pending\') as jumlah_pending, 
        mahasiswa.nim,  
        mahasiswa.nama,  
        prodi.prodi,
        MAX(SUBSTRING(syarat_wajib.id_syarat_wajib::text FROM 1 FOR 8)) as terakhir_ditambahkan');

		$this->db->join('akun_user', 'syarat_wajib.id_akun = akun_user.id_akun');
		$this->db->join('mahasiswa', 'akun_user.id_user = mahasiswa.nim');
		$this->db->join('prodi', 'mahasiswa.id_prodi = prodi.id_prodi');

		$this->db->group_by('akun_user.id_akun,  
        akun_user.img_user,  
        mahasiswa.nim,  
        mahasiswa.nama,  
        prodi.prodi');

		// Urutkan berdasarkan timestamp UUID v7
		$this->db->order_by('terakhir_ditambahkan', 'desc');

		return $this->db->get($this->table)->result_array();
	}
}
