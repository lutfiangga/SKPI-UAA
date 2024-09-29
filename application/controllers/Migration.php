<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Migration extends CI_Controller
{

	public function __construct()
	{
		parent::__construct();
		$this->load->model('Migrate');
	}

	// Function to run the migrations
	public function index()
	{
		// Show auth table
		echo "auth table here:<br>";
		$auth_data = $this->Migrate->show_auth_table(); // Ambil data auth
		echo "<pre>";
		print_r($auth_data); // Tampilkan data auth
		echo "</pre>";

		// Show user table
		echo "user table here:<br>";
		$user_data = $this->Migrate->show_user_table(); // Ambil data user
		echo "<pre>";
		print_r($user_data); // Tampilkan data user
		echo "</pre>";
	}

	public function up()
	{
		// Create user table
		$this->Migrate->create_user_table();
		echo "User table created successfully.<br>";

		// Create auth table
		$this->Migrate->create_auth_table();
		echo "Auth table created successfully.<br>";

		// Insert default users
		// $this->Migrate->insert_user_table();
		// echo "Default users inserted successfully.<br>";

		// Insert default auth
		// $this->Migrate->insert_auth_table();
		// echo "Default auth inserted successfully.<br>";
	}

	// Function to rollback (drop tables)
	public function down()
	{
		// Drop auth table
		$this->Migrate->drop_auth_table();
		echo "Auth table dropped successfully.<br>";

		// Drop user table
		$this->Migrate->drop_user_table();
		echo "User table dropped successfully.<br>";
	}
}
