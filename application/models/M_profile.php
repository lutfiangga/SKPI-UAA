<?php
defined('BASEPATH') or exit('No direct script access allowed');

class M_profile extends CI_Model
{
	private $table = 'akun_users';
	private $pk = 'id_akun';

	public function getById($id)
	{
		$this->db->select('akun_users.*, 
        COALESCE(admin.role, admisi.role, kemahasiswaan.role, etiket_admin.role, mahasiswa.role) as role, 
        COALESCE(admin.nama, admisi.nama, kemahasiswaan.nama, etiket_admin.nama, mahasiswa.nama) as nama,
        COALESCE(admin.jenis_kelamin, admisi.jenis_kelamin, kemahasiswaan.jenis_kelamin, etiket_admin.jenis_kelamin, mahasiswa.jenis_kelamin) as jenis_kelamin,
		COALESCE(admin.no_hp, admisi.no_hp, kemahasiswaan.no_hp, etiket_admin.no_hp, mahasiswa.no_hp) as no_hp,
		COALESCE(admin.alamat, admisi.alamat, kemahasiswaan.alamat, etiket_admin.alamat, mahasiswa.alamat) as alamat,
		COALESCE(admin.email, admisi.email, kemahasiswaan.email, etiket_admin.email, mahasiswa.email) as email,
		COALESCE(mahasiswa.program_studi) as program_studi,
		COALESCE(admin.jabatan,admisi.jabatan, kemahasiswaan.jabatan, etiket_admin.jabatan) as jabatan,
		');

		// Lakukan LEFT JOIN ke semua tabel yang terkait
		$this->db->join('admin', 'akun_users.id_user = admin.id_admin', 'left');
		$this->db->join('admisi', 'akun_users.id_user = admisi.id_admisi', 'left');
		$this->db->join('kemahasiswaan', 'akun_users.id_user = kemahasiswaan.id_kemahasiswaan', 'left');
		$this->db->join('etiket_admin', 'akun_users.id_user = etiket_admin.id_admin_etiket', 'left');
		$this->db->join('mahasiswa', 'akun_users.id_user = mahasiswa.nim', 'left');

		// get data by id for profile
		$this->db->where($this->pk, $id);
		return $this->db->get($this->table)->row();

		// return $this->db->get_where($this->table, array('akun_users.id_akun' => $id))->row();
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
