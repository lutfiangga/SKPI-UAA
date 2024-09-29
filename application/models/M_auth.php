<?php
defined('BASEPATH') or exit('No direct script access allowed');
class M_auth extends CI_Model
{
	private $table = 'auth';
	// private $pk = 'id_auth';
	public function CekLogin($credentials, $user_credentials)
	{
		$this->db->where($credentials, $user_credentials);
		$this->db->join('user', 'auth.id_user = user.id_user');
		return $this->db->get($this->table)->row_array();
	}
	public function update($id, $data)
	{
		$this->db->where('auth.id_user', $id);
		$this->db->update($this->table, $data);
	}
	public function getId($id_user)
	{
		$this->db->where('auth.id_user', $id_user);
		$query = $this->db->get($this->table);
		return $query->row();
	}
}
