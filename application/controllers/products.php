<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Products extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		// $this->output->enable_profiler();
	}

	public function index()
	{
		$this->load->view('index');
	}

	public function show()
	{
		$this->load->view('show');
	}

	public function getAll()
	{
		
	}
}

//end of main controller