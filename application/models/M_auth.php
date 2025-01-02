<?php
defined('BASEPATH') or exit('No direct script access allowed');
class M_auth extends CI_Model
{
	private $table = 'akun_user';
	private $pk = 'id_akun';
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
	public function getId($id)
	{
		$this->db->where($this->pk, $id);
		return $this->db->get($this->table)->row();
	}
	public function GetStaff()
	{
		$this->db->order_by($this->pk, 'asc');
		$this->db->join('staff', 'akun_user.id_user = staff.id_staff');
		return $this->db->get($this->table);
	}

	public function GetAdmin()
	{
		$this->db->order_by($this->pk, 'asc');
		$this->db->where('akun_user.role', 'admin');
		$this->db->join('staff', 'akun_user.id_user = staff.id_staff');
		return $this->db->get($this->table)->result_array();
	}
	public function GetAdmisi()
	{
		$this->db->order_by($this->pk, 'asc');
		$this->db->where('akun_user.role', 'admisi');
		$this->db->join('staff', 'akun_user.id_user = staff.id_staff');
		return $this->db->get($this->table)->result_array();
	}
	public function GetProdi()
	{
		$this->db->order_by($this->pk, 'asc');
		$this->db->where('akun_user.role', 'prodi');
		$this->db->join('staff', 'akun_user.id_user = staff.id_staff');
		return $this->db->get($this->table)->result_array();
	}
	public function GetEtiquette()
	{
		$this->db->order_by($this->pk, 'asc');
		$this->db->where('akun_user.role', 'etiquette');
		$this->db->join('staff', 'akun_user.id_user = staff.id_staff');
		return $this->db->get($this->table)->result_array();
	}
	public function GetKemahasiswaan()
	{
		$this->db->order_by($this->pk, 'asc');
		$this->db->where('akun_user.role', 'kemahasiswaan');
		$this->db->join('staff', 'akun_user.id_user = staff.id_staff');
		return $this->db->get($this->table)->result_array();
	}

	public function GetMhs()
	{
		$this->db->order_by($this->pk, 'desc');
		$this->db->join('mahasiswa', 'akun_user.id_user = mahasiswa.nim');
		$this->db->join('prodi', 'mahasiswa.id_prodi = prodi.id_prodi', 'left');
		$this->db->join('fakultas', 'prodi.id_fakultas = fakultas.id_fakultas', 'left');
		$this->db->join('jenjang', 'prodi.id_jenjang = jenjang.id_jenjang', 'left');

		$mahasiswa = $this->db->get($this->table)->result_array();

		foreach ($mahasiswa as &$mhs) {
			$mhs['semester'] = $this->getSemester($mhs);
		}
		return $mahasiswa;
	}
	// Di model M_mahasiswa
	public function getSkpiMhs()
	{
		// Query utama untuk mendapatkan data mahasiswa dan skor mereka
		$this->db->select('mahasiswa.*, 
                       prodi.prodi, 
                       fakultas.fakultas,
                       jenjang.id_jenjang,
                       mahasiswa.tahun_masuk,
                       akun_user.id_akun,
                       SUM(CASE 
                           WHEN syarat_wajib.status = \'diterima\' 
                           THEN CAST(kategori_syarat_wajib.poin AS NUMERIC) 
                           ELSE 0 
                       END) as skor_syarat_wajib,
                       SUM(CASE 
                           WHEN spm.status = \'diterima\' 
                           THEN CAST(subkategori_spm.poin AS INTEGER) 
                           ELSE 0 
                       END) as skor_spm');

		$this->db->from('akun_user');

		// Join tabel-tabel yang diperlukan
		$this->db->join('mahasiswa', 'akun_user.id_user = mahasiswa.nim');
		$this->db->join('prodi', 'mahasiswa.id_prodi = prodi.id_prodi', 'left');
		$this->db->join('fakultas', 'prodi.id_fakultas = fakultas.id_fakultas', 'left');
		$this->db->join('jenjang', 'prodi.id_jenjang = jenjang.id_jenjang', 'left');

		// Join untuk syarat wajib
		$this->db->join('syarat_wajib', 'akun_user.id_akun = syarat_wajib.id_akun', 'left');
		$this->db->join(
			'kategori_syarat_wajib',
			'syarat_wajib.id_kategori_syarat_wajib = kategori_syarat_wajib.id_kategori_syarat_wajib',
			'left'
		);

		// Join untuk SPM
		$this->db->join('spm', 'akun_user.id_akun = spm.id_akun', 'left');
		$this->db->join(
			'subkategori_spm',
			'spm.id_subkategori_spm = subkategori_spm.id_subkategori_spm',
			'left'
		);
		$this->db->join(
			'kategori_spm',
			'subkategori_spm.id_kategori_spm = kategori_spm.id_kategori_spm',
			'left'
		);

		// Group by untuk menghindari duplikasi
		$this->db->group_by('mahasiswa.nim, mahasiswa.nama, mahasiswa.tahun_masuk, 
                        prodi.prodi, fakultas.fakultas, jenjang.id_jenjang, 
                        akun_user.id_akun');

		$mahasiswa = $this->db->get()->result_array();

		// Filter mahasiswa yang memenuhi syarat
		$eligible_students = array();

		foreach ($mahasiswa as $mhs) {
			// Dapatkan skor minimum untuk kedua kategori
			$min_wajib = $this->skorMinimumSyaratWajib(
				$mhs['tahun_masuk'],
				$mhs['id_jenjang']
			);

			$min_spm = $this->skorMinimumSpm(
				$mhs['tahun_masuk'],
				$mhs['id_jenjang']
			);

			// Cek apakah memenuhi kedua syarat minimum
			if (
				$min_wajib && $min_spm &&
				floatval($mhs['skor_syarat_wajib']) >= floatval($min_wajib['skor']) &&
				floatval($mhs['skor_spm']) >= floatval($min_spm['skor'])
			) {

				// Tambahkan informasi skor minimum
				$mhs['min_skor_wajib'] = $min_wajib['skor'];
				$mhs['min_skor_spm'] = $min_spm['skor'];
				$mhs['semester'] = $this->getSemester($mhs);

				$eligible_students[] = $mhs;
			}
		}

		return $eligible_students;
	}

	public function getFilteredSkpiMhs($tahun_masuk = '', $tahun_lulus = '', $prodi = '')
	{
		// Query utama untuk mendapatkan data mahasiswa dan skor mereka
		$this->db->select('mahasiswa.*, 
                       prodi.prodi, 
                       fakultas.fakultas,
                       jenjang.id_jenjang,
                       mahasiswa.tahun_masuk,
                       akun_user.id_akun,
                       SUM(CASE 
                           WHEN syarat_wajib.status = \'diterima\' 
                           THEN CAST(kategori_syarat_wajib.poin AS NUMERIC) 
                           ELSE 0 
                       END) as skor_syarat_wajib,
                       SUM(CASE 
                           WHEN spm.status = \'diterima\' 
                           THEN CAST(subkategori_spm.poin AS INTEGER) 
                           ELSE 0 
                       END) as skor_spm');

		$this->db->from('akun_user');

		// Join tabel-tabel yang diperlukan
		$this->db->join('mahasiswa', 'akun_user.id_user = mahasiswa.nim');
		$this->db->join('prodi', 'mahasiswa.id_prodi = prodi.id_prodi', 'left');
		$this->db->join('fakultas', 'prodi.id_fakultas = fakultas.id_fakultas', 'left');
		$this->db->join('jenjang', 'prodi.id_jenjang = jenjang.id_jenjang', 'left');

		// Join untuk syarat wajib
		$this->db->join('syarat_wajib', 'akun_user.id_akun = syarat_wajib.id_akun', 'left');
		$this->db->join(
			'kategori_syarat_wajib',
			'syarat_wajib.id_kategori_syarat_wajib = kategori_syarat_wajib.id_kategori_syarat_wajib',
			'left'
		);

		// Join untuk SPM
		$this->db->join('spm', 'akun_user.id_akun = spm.id_akun', 'left');
		$this->db->join(
			'subkategori_spm',
			'spm.id_subkategori_spm = subkategori_spm.id_subkategori_spm',
			'left'
		);
		$this->db->join(
			'kategori_spm',
			'subkategori_spm.id_kategori_spm = kategori_spm.id_kategori_spm',
			'left'
		);

		if (!empty($tahun_masuk)) {
			$this->db->where('mahasiswa.tahun_masuk', $tahun_masuk);
		}
		if (!empty($tahun_lulus)) {
			$this->db->where('mahasiswa.tahun_lulus', $tahun_lulus);
		}
		if (!empty($prodi)) {
			$this->db->where('mahasiswa.id_prodi', $prodi);
		}

		// Group by untuk menghindari duplikasi
		$this->db->group_by('mahasiswa.nim, mahasiswa.nama, mahasiswa.tahun_masuk, mahasiswa.tahun_lulus, 
                        prodi.prodi, fakultas.fakultas, jenjang.id_jenjang, 
                        akun_user.id_akun');

		$mahasiswa = $this->db->get()->result_array();

		// Filter mahasiswa yang memenuhi syarat
		$eligible_students = array();

		foreach ($mahasiswa as $mhs) {
			// Dapatkan skor minimum untuk kedua kategori
			$min_wajib = $this->skorMinimumSyaratWajib(
				$mhs['tahun_masuk'],
				$mhs['id_jenjang']
			);

			$min_spm = $this->skorMinimumSpm(
				$mhs['tahun_masuk'],
				$mhs['id_jenjang']
			);

			// Cek apakah memenuhi kedua syarat minimum
			if (
				$min_wajib && $min_spm &&
				floatval($mhs['skor_syarat_wajib']) >= floatval($min_wajib['skor']) &&
				floatval($mhs['skor_spm']) >= floatval($min_spm['skor'])
			) {

				// Tambahkan informasi skor minimum
				$mhs['min_skor_wajib'] = $min_wajib['skor'];
				$mhs['min_skor_spm'] = $min_spm['skor'];
				$mhs['semester'] = $this->getSemester($mhs);

				$eligible_students[] = $mhs;
			}
		}

		return $eligible_students;
	}

	// Di model yang sama, perbaiki fungsi skorMinimumSyaratWajib
	public function skorMinimumSyaratWajib($angkatan, $jenjang)
	{
		// Reset Query Builder
		$this->db->reset_query();

		// Tentukan tabel yang benar untuk skor minimum syarat wajib
		$this->db->from('skor_minimum_syarat_wajib');
		$this->db->where('id_jenjang', $jenjang);
		$rules = $this->db->get()->result_array();

		// Loop through rules to find matching condition
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

	public function skorMinimumSpm($angkatan, $jenjang)
	{
		// Reset Query Builder
		$this->db->reset_query();

		// Tentukan tabel yang benar untuk skor minimum SPM
		$this->db->from('skor_minimum_spm');
		$this->db->where('id_jenjang', $jenjang);
		$rules = $this->db->get()->result_array();

		// Loop through rules to find matching condition
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

	private function getSemester($mhs)
	{
		$tahun_masuk = $mhs['tahun_masuk'];
		$tahun_lulus = $mhs['tahun_lulus'];
		$status_mahasiswa = $mhs['status_mahasiswa'];
		$semester_diakui = $mhs['semester_diakui'];
		$periode = $mhs['periode'];

		// Use tahun_lulus if it's not empty, otherwise use current year
		$current_year = !empty($tahun_lulus) ? $tahun_lulus : date('Y');

		// Calculate the difference in years
		$year_diff = $current_year - $tahun_masuk;
		$total_semesters = $year_diff * 2;


		if ($periode === 'Genap') {
			$total_semesters += 1;
		}


		if ($status_mahasiswa === 'Mahasiswa Transfer') {
			$total_semesters += $semester_diakui;
		}

		// Return total semesters starting from 1 instead of 0
		return $total_semesters > 0 ? $total_semesters + 1 : 1;
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

	public function updateAccount($id, $data)
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
}
