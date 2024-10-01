<?php
if (!function_exists('get_csrf_token')) {
	function get_csrf_token()
	{
		$ci = get_instance();
		if (!$ci->session->csrf_token) {
			$ci->session->csrf_token = hash('sha1', time());
		}
		return $ci->session->csrf_token;
	}
}
if (!function_exists('get_csrf_name')) {
	function get_csrf_name()
	{
		return 'token';
	}
}
if (!function_exists('cek_csrf')) {
	function cek_csrf()
	{
		$ci = get_instance();
		if ($ci->input->post('token') != $ci->session->csrf_token) {
			$ci->session->unset_userdata('csrf_token');
			redirect('Errors/unauthorized');
			return false;
		}
		return true;
	}
}

if (!function_exists('csrf')) {
	function csrf()
	{
		return "<input type='hidden' name='" . get_csrf_name() . "' value='" . get_csrf_token() . "' />";
	}
}
