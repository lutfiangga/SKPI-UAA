<?php
defined('BASEPATH') or exit('No direct script access allowed');
class M_auth extends CI_Model
{
	private $table = 'akun_user';
	// private $pk = 'id_auth';
	public function CekLogin($credentials, $user_credentials)
	{
		$this->db->where($credentials, $user_credentials);
		$this->db->select('akun_user.*, 
        COALESCE(staff.nama, mahasiswa.nama) as nama,
		COALESCE(mahasiswa.nim) as nim,
		');

		$this->db->join('staff', 'akun_user.id_user = staff.id_staff', 'left');
		$this->db->join('mahasiswa', 'akun_user.id_user = mahasiswa.nim', 'left');

		// Mengambil hasil query
		return $this->db->get($this->table)->row_array();
	}

	public function update($id, $data)
	{
		$this->db->where('akun_user.id_user', $id);
		$this->db->update($this->table, $data);
	}
	public function getId($id_user)
	{
		$this->db->where('akun_user.id_user', $id_user);
		$query = $this->db->get($this->table);
		return $query->row();
	}
}
