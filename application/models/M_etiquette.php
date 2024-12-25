<?php
defined('BASEPATH') or exit('No direct script access allowed');
class M_etiquette extends CI_Model
{
	//$table sebagai tabel yang digunakan, dengan pemanggilannya $this->table
	private $table = 'etiquette';
	//$pk atau Primary Key yang digunakan, dengan pemanggilannya $this->pk
	private $pk = 'id_etiquette';
	public function GetAll()
	{
		$this->db->order_by($this->pk, 'desc');

		$this->db->join('mahasiswa', 'etiquette.nim = mahasiswa.nim','left');
		$this->db->join('akun_user', 'mahasiswa.nim = akun_user.id_user', 'left');
		$this->db->join('prodi', 'mahasiswa.id_prodi = prodi.id_prodi','left');

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
	public function getById($id)
	{
		$this->db->where($this->pk, $id);
		return $this->db->get($this->table)->row_array();
	}
	public function GetByNim($nim)
	{
		$this->db->where('nim', $nim);
		return $this->db->get($this->table)->result_array();
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
	public function GetEtiquette()
	{
		$this->db->select('akun_user.id_akun,  
        akun_user.img_user,  
        string_agg(DISTINCT CAST(etiquette.id_etiquette AS VARCHAR), \',\') as id_etiquette,  
		 SUM(CAST(etiquette.poin AS INTEGER)) AS total_poin,
        mahasiswa.nim,  
        mahasiswa.nama,  
        prodi.prodi,
        MAX(SUBSTRING(etiquette.id_etiquette::text FROM 1 FOR 8)) as terakhir_ditambahkan');

		$this->db->join('mahasiswa', 'etiquette.nim = mahasiswa.nim');
		$this->db->join('akun_user', 'mahasiswa.nim = akun_user.id_user');
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
	public function getPoinByUser($id_user)
	{
		$this->db->select('COALESCE(SUM(CAST(poin AS NUMERIC)), 0) as etiquette_poin');
		$this->db->where('etiquette.nim', $id_user);
		$query = $this->db->get($this->table);
		return $query->row_array();
	}
}
