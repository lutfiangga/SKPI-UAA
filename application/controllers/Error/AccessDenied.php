<?php
defined('BASEPATH') or exit('No direct script access allowed');

class AccessDenied extends CI_Controller
{
	private $redirect = "Errorr/AccessDenied";
	private $view = "errors/pages/";
	public function index()
	{
		$data = array(
			'judul' => "Access Denied",
			'role' => $this->session->userdata('role'),
		);
		$this->template->load('errors/layout/layout', $this->view . 'access_denied', $data);
	}
}
