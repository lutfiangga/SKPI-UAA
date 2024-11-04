<?php
if (!function_exists('auto_translate')) {
	function auto_translate($text)
	{
		if (empty($text)) return "";

		// URL encode the text
		$text = urlencode($text);

		// Google Translate API URL
		$url = "https://translate.googleapis.com/translate_a/single?client=gtx&sl=id&tl=en&dt=t&q=" . $text;

		try {
			// Initialize CURL
			$ch = curl_init();
			curl_setopt($ch, CURLOPT_URL, $url);
			curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
			curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);

			// User agent is required to prevent blocking
			curl_setopt($ch, CURLOPT_USERAGENT, 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/91.0.4472.124 Safari/537.36');

			$response = curl_exec($ch);
			curl_close($ch);

			// Decode JSON response
			$result = json_decode($response, true);

			// Get translated text
			$translated_text = "";
			if (isset($result[0])) {
				foreach ($result[0] as $text_array) {
					if (isset($text_array[0])) {
						$translated_text .= $text_array[0];
					}
				}
			}

			return $translated_text ?: $text;
		} catch (Exception $e) {
			log_message('error', 'Translation Error: ' . $e->getMessage());
			return $text; // Return original text if translation fails
		}
	}
}

// Function untuk cache hasil terjemahan di session
if (!function_exists('cached_translate')) {
	function cached_translate($text)
	{
		$CI = &get_instance();

		// Load session library
		if (!isset($CI->session)) {
			$CI->load->library('session');
		}

		// Get translations cache from session
		$translations = $CI->session->userdata('translations_cache') ?: array();

		// Check if translation exists in cache
		if (isset($translations[$text])) {
			return $translations[$text];
		}

		// Get new translation
		$translated = auto_translate($text);

		// Save to cache
		$translations[$text] = $translated;
		$CI->session->set_userdata('translations_cache', $translations);

		return $translated;
	}
}
if (!function_exists('cached_translate')) {
	function cached_translate($text)
	{
		$CI = &get_instance();

		// Load session library
		if (!isset($CI->session)) {
			$CI->load->library('session');
		}

		// Get translations cache from session
		$translations = $CI->session->userdata('translations_cache') ?: array();

		// Check if translation exists in cache
		if (isset($translations[$text])) {
			return $translations[$text];
		}

		// Get new translation
		$translated = auto_translate($text);

		// Save to cache
		$translations[$text] = $translated;
		$CI->session->set_userdata('translations_cache', $translations);

		return $translated;
	}
}

// Function untuk bulk translate
if (!function_exists('bulk_translate')) {
	function bulk_translate($texts)
	{
		if (!is_array($texts)) return auto_translate($texts);

		$results = array();
		foreach ($texts as $key => $text) {
			$results[$key] = cached_translate($text);
			// Add delay to prevent API blocking
			usleep(100000); // 0.1 second delay
		}

		return $results;
	}
}
