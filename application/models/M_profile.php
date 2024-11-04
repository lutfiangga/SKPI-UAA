<?php
defined('BASEPATH') or exit('No direct script access allowed');

class M_profile extends CI_Model
{
	private $table = 'akun_user';
	private $pk = 'id_akun';

	public function getById($id)
	{
		$this->db->select('akun_user.*, 
        COALESCE(staff.nama, mahasiswa.nama) as nama,
        COALESCE(staff.jenis_kelamin, mahasiswa.jenis_kelamin) as jenis_kelamin,
		COALESCE(staff.phone, mahasiswa.phone) as phone,
		COALESCE(staff.email, mahasiswa.email) as email,
		COALESCE(mahasiswa.id_prodi) as id_prodi,
		COALESCE(prodi.prodi) as prodi,
		COALESCE(mahasiswa.nim) as nim,
		COALESCE(prodi.id_fakultas) as id_fakultas,
		COALESCE(fakultas.fakultas) as fakultas,
		COALESCE(staff.jabatan) as jabatan,
		');

		$this->db->join('staff', 'akun_user.id_user = staff.id_staff', 'left');
		$this->db->join('mahasiswa', 'akun_user.id_user = mahasiswa.nim', 'left');
		$this->db->join('prodi', 'mahasiswa.id_prodi = prodi.id_prodi', 'left'); 
		$this->db->join('fakultas', 'prodi.id_fakultas = fakultas.id_fakultas', 'left');

		// get data by id for profile
		$this->db->where($this->pk, $id);
		return $this->db->get($this->table)->row_array();
	}


	public function save($data)
	{
		$this->db->insert($this->table, $data);
	}

	public function edit($id)
	{
		$this->db->join('auth', 'user.id_user = auth.id_user');
		return $this->db->get_where($this->table, array('user.id_user' => $id))->row();
	}

	public function update($id, $data)
	{
		$this->db->where($this->pk, $id);
		$this->db->update($this->table, $data);
	}
}
