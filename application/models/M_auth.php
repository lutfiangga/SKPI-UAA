<?php
defined('BASEPATH') or exit('No direct script access allowed');
class M_auth extends CI_Model
{
	private $table = 'auth';
	public function CekLogin($credentials, $user_credentials)
	{
		$this->db->where($credentials, $user_credentials);
		$this->db->join('user', 'auth.id_user = user.id_user');
		return $this->db->get($this->table)->row_array();
	}
}
