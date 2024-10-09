<?php
defined('BASEPATH') or exit('No direct script access allowed');
class M_auth extends CI_Model
{
	private $table = 'akun_users';
	// private $pk = 'id_auth';
	public function CekLogin($credentials, $user_credentials)
	{
		$this->db->select('akun_users.*, 
        COALESCE(admin.role, admisi.role, kemahasiswaan.role, etiket_admin.role, mahasiswa.role) as role, 
        COALESCE(admin.nama, admisi.nama, kemahasiswaan.nama, etiket_admin.nama, mahasiswa.nama) as nama');

		$this->db->where($credentials, $user_credentials);

		// Lakukan LEFT JOIN ke semua tabel yang terkait
		$this->db->join('admin', 'akun_users.id_user = admin.id_admin', 'left');
		$this->db->join('admisi', 'akun_users.id_user = admisi.id_admisi', 'left');
		$this->db->join('kemahasiswaan', 'akun_users.id_user = kemahasiswaan.id_kemahasiswaan', 'left');
		$this->db->join('etiket_admin', 'akun_users.id_user = etiket_admin.id_admin_etiket', 'left');
		$this->db->join('mahasiswa', 'akun_users.id_user = mahasiswa.nim', 'left');

		// Mengambil hasil query
		return $this->db->get($this->table)->row_array();
	}

	public function update($id, $data)
	{
		$this->db->where('akun_users.id_user', $id);
		$this->db->update($this->table, $data);
	}
	public function getId($id_user)
	{
		$this->db->where('akun_users.id_user', $id_user);
		$query = $this->db->get($this->table);
		return $query->row();
	}
}
