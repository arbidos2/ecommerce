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

    // Unfixed bugs:
    // 1) When users search with some keywords in Show All page and try to go to different category pages, no products are displayed.
    // 2) when multiple pages are displayed for a search result, users cannot go to other pages of the search result.
    public function search($categories_id, $page)
    {
        $this->load->model('Product');
        $categories = $this->Product->show_all_categories();
        if ($this->input->post('product_name')){
            $this->session->set_userdata('keyword', $this->input->post('product_name')); // Sets keyword to be what users posted
        }
        $condition = $this->input->post('sort'); // Sets conditions for sorting
        $products = $this->Product->search($categories_id, $condition); // Passes condition, category_id, keyword to search method in product model
        $selected_category = $this->Product->show_category($categories_id); // Displays the category name at the top of main
        $this->session->set_userdata('page', $page); // Sets session data of page for users to revisit when Go Back button is clicked
        $this->load->view('partial', array(
        	'products' => $products, 
        	'categories_id' => $categories_id, 
        	'current_page' => (int)$page, 
        	'categories' => $categories,
        	'selected_category' => $selected_category
        								)
        				);
    }

	public function show($product_id)
	{
		$this->load->model('Product');
		$product = $this->Product->get_product($product_id);
        $similar_category = $product['category_id'];
        $selected_product = $product['id'];
        $similar = $this->Product->show_similar($similar_category, $selected_product);
        $page = $this->session->userdata('page'); // Sets previous page to be passed to the Go back link
		$this->load->view('show', array('product' => $product, 'similar_products' => $similar, 'previous_page' => $page));
	}
}

//end of main controller
