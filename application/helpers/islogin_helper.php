<?php
function checkRole($role)
{
	$ci = &get_instance();
	// Check if the user is logged in
	if (!$ci->session->userdata('id_user')) {
		redirect('auth', 'refresh');
	} else {
		// Check if the user has the specified role
		if ($ci->session->userdata(ucfirst($role)) != 1) {
			$ci->session->set_flashdata('error_403', 'Hanya ' . ucfirst($role) . ' yang dapat mengakses!');
			// Redirect to a designated error page instead of redirecting back
			// redirect($_SERVER['HTTP_REFERER']);
			redirect('Error/AccessDenied', 'refresh');
		}
	}
}
