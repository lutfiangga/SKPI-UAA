<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Errors extends CI_Controller
{
	private $view = "errors/html/";
	public function unauthorized()
	{
		$data = array(
			'judul' => "Unauthorized",
		);
		$this->template->load('errors/layout/layout', $this->view . 'error_401', $data);
	}
	public function access_denied()
	{
		$data = array(
			'judul' => "Access Denied",
			'role' => $this->session->userdata('role'),
		);
		$this->template->load('errors/layout/layout', $this->view . 'error_403', $data);
	}
	public function notfound()
	{
		$data = array(
			'judul' => "Not Found",
		);
		$this->template->load('errors/layout/layout', $this->view . 'error_404', $data);
	}
}
