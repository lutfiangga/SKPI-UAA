<?php
function checkUserRole($role)
{
	$ci = &get_instance();

	// Check if the user is logged in
	if (!$ci->session->userdata('id_user')) {
		// If not logged in, redirect to auth
		redirect('auth', 'refresh');
	} else {
		// Check if the user has the specified role
		if ($ci->session->userdata($role) != 1) {
			$ci->session->set_flashdata('error', 'Hanya ' . ucfirst($role) . ' yang dapat mengakses!');
			redirect($_SERVER['HTTP_REFERER']); // Redirect to the previous page
		}
	}
}
