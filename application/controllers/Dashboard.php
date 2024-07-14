<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Dashboard extends CI_Controller {

	public function index()
	{
		$this->load->helper('date');
		$this->load->database();
        $this->load->library('session');
		$this->load->view('index');
	}
}