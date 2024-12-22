<?php
defined('BASEPATH') or exit('No direct script access allowed');
class M_spm extends CI_Model
{
	//$table sebagai tabel yang digunakan, dengan pemanggilannya $this->table
	private $table = 'spm';
	//$pk atau Primary Key yang digunakan, dengan pemanggilannya $this->pk
	private $pk = 'id_spm';
	public function GetAll()
	{
		$this->db->order_by($this->pk, 'desc');

		$this->db->join('akun_user', 'spm.id_akun = akun_user.id_akun', 'left');
		$this->db->join('subkategori_spm', 'spm.id_subkategori_spm = subkategori_spm.id_subkategori_spm');
		$this->db->join('kategori_spm', 'subkategori_spm.id_kategori_spm = kategori_spm.id_kategori_spm');
		$this->db->join('mahasiswa ', 'akun_user.id_user = mahasiswa.nim');
		$this->db->join('prodi', 'mahasiswa.id_prodi = prodi.id_prodi');

		return $this->db->get($this->table)->result_array();
	}
	public function filteredData($data)
	{
		$this->db->order_by($this->pk, 'desc');
		$this->db->join('akun_user', 'spm.id_akun = akun_user.id_akun', 'left');
		$this->db->join('subkategori_spm', 'spm.id_subkategori_spm = subkategori_spm.id_subkategori_spm');
		$this->db->join('kategori_spm', 'subkategori_spm.id_kategori_spm = kategori_spm.id_kategori_spm');
		$this->db->join('mahasiswa ', 'akun_user.id_user = mahasiswa.nim');
		$this->db->join('prodi', 'mahasiswa.id_prodi = prodi.id_prodi');

		if (!empty($data)) {
			$this->db->where('spm.status', $data);
		}
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
	public function getPoinByUser($id)
	{
		$this->db->join('subkategori_spm', 'spm.id_subkategori_spm = subkategori_spm.id_subkategori_spm');
		$this->db->join('kategori_spm', 'subkategori_spm.id_kategori_spm = kategori_spm.id_kategori_spm');
		$this->db->join('akun_user', 'spm.id_akun = akun_user.id_akun');
		$this->db->select('COALESCE(SUM(CAST(subkategori_spm.poin AS NUMERIC)), 0) as spm_poin');
		$this->db->where('spm.id_akun', $id);
		$this->db->where('spm.status', 'diterima');
		return $this->db->get($this->table)->row_array();
	}
	public function getPoinDecline($id)
	{
		$this->db->join('subkategori_spm', 'spm.id_subkategori_spm = subkategori_spm.id_subkategori_spm');
		$this->db->join('kategori_spm', 'subkategori_spm.id_kategori_spm = kategori_spm.id_kategori_spm');
		$this->db->join('akun_user', 'spm.id_akun = akun_user.id_akun');
		$this->db->select('COALESCE(SUM(CAST(subkategori_spm.poin AS NUMERIC)), 0) as spm_poin');
		$this->db->where('spm.id_akun', $id);
		$this->db->where('spm.status', 'ditolak');
		return $this->db->get($this->table)->row_array();
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


	public function GetSpm($id)
	{
		$this->db->order_by($this->pk, 'asc');

		$this->db->join('akun_user', 'spm.id_akun = akun_user.id_akun', 'left');
		$this->db->join('subkategori_spm', 'spm.id_subkategori_spm = subkategori_spm.id_subkategori_spm');
		$this->db->join('kategori_spm', 'subkategori_spm.id_kategori_spm = kategori_spm.id_kategori_spm');
		$this->db->join('mahasiswa', 'akun_user.id_user = mahasiswa.nim');

		$this->db->where('akun_user.id_akun', $id);
		return $this->db->get($this->table)->result_array();
	}

	public function GetByNim($id)
	{
		$this->db->order_by('tanggal_mulai', 'asc');

		$this->db->join('akun_user', 'spm.id_akun = akun_user.id_akun', 'left');
		$this->db->join('subkategori_spm', 'spm.id_subkategori_spm = subkategori_spm.id_subkategori_spm');
		$this->db->join('kategori_spm', 'subkategori_spm.id_kategori_spm = kategori_spm.id_kategori_spm');
		$this->db->join('mahasiswa', 'akun_user.id_user = mahasiswa.nim');
		$this->db->where('akun_user.id_akun', $id);
		$this->db->where('spm.status', 'diterima');
		return $this->db->get($this->table)->result_array();
	}
	public function GetTotalByNim($id)
	{
		$this->db->select('kategori_spm.kategori,subkategori_spm.subkategori, SUM(CAST(subkategori_spm.poin AS INTEGER)) AS total_poin');
		$this->db->join('akun_user', 'spm.id_akun = akun_user.id_akun', 'left');
		$this->db->join('subkategori_spm', 'spm.id_subkategori_spm = subkategori_spm.id_subkategori_spm');
		$this->db->join('kategori_spm', 'subkategori_spm.id_kategori_spm = kategori_spm.id_kategori_spm');
		$this->db->join('mahasiswa', 'akun_user.id_user = mahasiswa.nim');
		$this->db->where('akun_user.id_akun', $id);
		$this->db->where('spm.status', 'diterima');
		$this->db->group_by('kategori_spm.kategori,subkategori_spm.subkategori');
		$this->db->order_by('kategori_spm.kategori', 'asc');

		return $this->db->get($this->table)->result_array();
	}

	public function GetSpmMhs()
	{
		$this->db->select('akun_user.id_akun,  
        akun_user.img_user,  
        MAX(spm.status) as status, 
        string_agg(DISTINCT CAST(spm.id_spm AS VARCHAR), \',\') as id_spm,  
        (SELECT COUNT(*) FROM skpi.spm WHERE spm.id_akun = akun_user.id_akun AND spm.status = \'pending\') as jumlah_pending, 
        mahasiswa.nim,  
        mahasiswa.nama,  
        prodi.prodi,
        MAX(SUBSTRING(spm.id_spm::text FROM 1 FOR 8)) as terakhir_ditambahkan');

		$this->db->join('akun_user', 'spm.id_akun = akun_user.id_akun');
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
