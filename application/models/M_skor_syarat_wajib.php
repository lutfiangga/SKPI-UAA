<?php
defined('BASEPATH') or exit('No direct script access allowed');
class M_skor_syarat_wajib extends CI_Model
{
	//$table sebagai tabel yang digunakan, dengan pemanggilannya $this->table
	private $table = 'skor_minimum_syarat_wajib';
	//$pk atau Primary Key yang digunakan, dengan pemanggilannya $this->pk
	private $pk = 'id_skor';
	public function GetAll()
	{
		$this->db->order_by($this->pk, 'desc');
		$this->db->join('jenjang', 'skor_minimum_syarat_wajib.id_jenjang = jenjang.id_jenjang');
		return $this->db->get($this->table)->result_array();
	}
	public function skorMinimum($angkatan, $jenjang)
	{
		
		$this->db->where('id_jenjang', $jenjang);
		$rules = $this->db->get($this->table)->result_array();
		
		foreach ($rules as $rule) {
			$parameter = $rule['parameter'];
			$ruleAngkatan = intval($rule['angkatan']);
			$studentAngkatan = intval($angkatan);

			$isMatch = false;

			switch ($parameter) {
				case '=':
					$isMatch = ($studentAngkatan == $ruleAngkatan);
					break;
				case '!=':
					$isMatch = ($studentAngkatan != $ruleAngkatan);
					break;
				case '>':
					$isMatch = ($studentAngkatan > $ruleAngkatan);
					break;
				case '<':
					$isMatch = ($studentAngkatan < $ruleAngkatan);
					break;
				case '>=':
					$isMatch = ($studentAngkatan >= $ruleAngkatan);
					break;
				case '<=':
					$isMatch = ($studentAngkatan <= $ruleAngkatan);
					break;
			}

			if ($isMatch) {
				return $rule; // Return rule pertama yang match
			}
		}

		return null; // Return null jika tidak ada rule yang match
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
}
