<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Products extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		// $this->output->enable_profiler();
	}

	public function index()
	{
		$this->load->model('Product');
		$products = $this->Product->get_all_products();
		// var_dump($products);
		$this->load->view('index', array('products' => $products));
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
}

//end of main controller