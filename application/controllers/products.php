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
		$categories = $this->Product->show_all_categories();
		$products = $this->Product->get_all_products();
		$this->load->view('index', array(
        	'products' => $products, 
        	'categories' => $categories
        								)
        				);
	}

	public function pagination($page)
	{
		$this->load->model('Product');
		$categories = $this->Product->show_all_categories();
		$products = $this->Product->get_all_products();
		$this->load->view('all',  array(
			'products' => $products, 
			'current_page' => (int)$page, 
			'categories' => $categories
										)
						);
	}

    public function search_by_keyword($page)
    {
        $this->load->model('Product');
        $categories = $this->Product->show_all_categories();
        $keyword = $this->input->post('product_name');
        $products = $this->Product->search_by_keyword($keyword);
        $this->load->view('all', array(
        	'products' => $products,
        	'current_page' => (int)$page, 
        	'categories' => $categories,
        	'products' => $products
        								)
        				);
    }

    public function search_by_category($categories_id, $page)
    {
        $this->load->model('Product');
        $categories = $this->Product->show_all_categories();
        $products = $this->Product->search_by_category($categories_id);
        $selected_category = $this->Product->show_category($categories_id);
        $this->load->view('partial', array(
        	'products' => $products, 
        	'categories_id' => $categories_id, 
        	'current_page' => (int)$page, 
        	'categories' => $categories,
        	'selected_category' => $selected_category
        								)
        				);
    }

    public function sort_by($condition, $page)
    {
    	$this->load->model('Product');
    	$categories = $this->Product->show_all_categories($condition);
    	$condition = $this->input->post();
    	$products = $this->Product->sort_by();
    	$this->load->view('all', array(
    		'categories' => $categories,
    		'current_page' => (int)$page,
    		'products' => $products
    								)
    					);
    }

	public function show($product_id)
	{
		$this->load->model('Product');
		$product = $this->Product->get_product($product_id);
		$this->load->view('show', array('product' => $product));
	}
}

//end of main controller
