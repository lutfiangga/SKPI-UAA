<?php
//-->session
// Admin
// staff
// Admin
// Admin
function IsAdmin()
{
	$ci = &get_instance();

	// Check if the user is logged in
	if (!$ci->session->userdata('id_user')) {
		// If not logged in, redirect to auth
		redirect('auth', 'refresh');
	} else {
		// If logged in but not an admin, show a Toastr notification
		if ($ci->session->userdata('IsAdmin') <> 1) {
			$ci->session->set_flashdata('error', 'Hanya Admin yang dapat mengakses!');
			redirect($_SERVER['HTTP_REFERER']); // Redirect to the previous page
		}
	}
}


// staff
// Staff
function IsStaff()
{
	$ci = &get_instance();

	// Check if the user is logged in
	if (!$ci->session->userdata('id_user')) {
		// If not logged in, redirect to auth
		redirect('auth', 'refresh');
	} else {
		// If logged in but not staff, show a Toastr notification
		if ($ci->session->userdata('IsStaff') <> 1) {
			$ci->session->set_flashdata('error', 'Hanya Staff yang dapat mengakses!');
			redirect($_SERVER['HTTP_REFERER']); // Redirect to the previous page
		}
	}
}


//-->Endsession
