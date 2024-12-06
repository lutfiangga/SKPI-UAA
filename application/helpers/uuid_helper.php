<?php
defined('BASEPATH') or exit('No direct script access allowed');

if (!function_exists('generate_uuid')) {
	/**
	 * Generate UUID v4
	 *
	 * @return string
	 */
	function generate_uuid()
	{
		return sprintf(
			'%04x%04x-%04x-%04x-%04x-%04x%04x%04x',
			mt_rand(0, 0xffff),
			mt_rand(0, 0xffff),
			mt_rand(0, 0xffff),
			mt_rand(0, 0x0fff) | 0x4000,
			mt_rand(0, 0x3fff) | 0x8000,
			mt_rand(0, 0xffff),
			mt_rand(0, 0xffff),
			mt_rand(0, 0xffff)
		);
	}
}

if (!function_exists('generate_uuid_v7')) {
	/**
	 * Generate UUID v7
	 * UUID v7 adalah UUID berbasis waktu dengan elemen timestamp
	 *
	 * @return string
	 */
	function generate_uuid_v7()
	{
		// Dapatkan waktu saat ini dalam milidetik
		$time = (int) (microtime(true) * 1000);

		// Pisahkan waktu menjadi bagian high dan low
		$time_low = $time & 0xFFFFFFFF;
		$time_mid = ($time >> 32) & 0xFFFF;
		$time_high_and_version = (($time >> 48) & 0x0FFF) | (0x7 << 12);

		// Buat bagian random
		$random_a = random_int(0, 0x3FFF) | 0x8000; // Dengan variant RFC 4122
		$random_b_1 = random_int(0, 0xFFFF); // 16-bit pertama
		$random_b_2 = random_int(0, 0xFFFF); // 16-bit kedua
		$random_b_3 = random_int(0, 0xFFFF); // 16-bit ketiga

		// Gabungkan bagian random menjadi format UUID
		return sprintf(
			'%08x-%04x-%04x-%04x-%04x%04x%04x',
			$time_low,
			$time_mid,
			$time_high_and_version,
			$random_a,
			$random_b_1,
			$random_b_2,
			$random_b_3
		);
	}
}
