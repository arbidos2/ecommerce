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

	public function carts()
	{
		$this->load->view('carts');
	}

	public function proceed_as_guest(){
		if ($this->input->post('submit') == "guest")){
			echo "Proceed as guest";
		}
		else {
			$data = array('fname' => $this->input->post('fname'),
							'lname' => $this->input->post('lname'),
							'email' => $this->input->post('email')...) // to do in the morning!
			$this->load->view('login', $data)
		}

	}
}


//end of main controller