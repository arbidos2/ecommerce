<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');


class Users extends CI_Controller{
    public function __construct(){
        parent::__construct();

    }

    public function orders_route(){
        $this->load->view('orders_view');
    }

    public function login_route(){
        $this->load->view('login');
    }

    public function product_route(){
        $this->load->view('productsview');
    }

    public function add_product_route(){
        $this->load->view('newproduct');
    }

    public function users_route(){
        $this->load->view('usersview');
    }

    public function upload_product_img(){
        $config['upload_path'] = './pics/';
        $config['allowed_types'] = 'gif|jpg|png';
        $this->load->library('upload', $config);
        if (!$this->upload->upload_product_img()){
            $this->session->set_flashdata('errors', 'Please select a file');
            redirect(base_url().'admin/products/add');
        } else {
            $this->upload->upload_product_img();
        }
    }


    public function login(){
        $this->form_validation->set_rules('email', 'Email', 'trim|required|callback_usernamecheck');
        $this->form_validation->set_rules('password', 'Password', 'trim|required');
        $this->form_validation->set_message('usernamecheck', 'Please check your fields and try again');
        if ($this->form_validation->run() == FALSE){
            $this->session->set_flashdata('errors', validation_errors());
            redirect ('/login');
        } else {

        }
    }

    public function usernamecheck(){
        $user = [
            "email" => $this->input->post('email'),
            "password" => md5($this->input->post('password'))
        ];
        return (!$this->usersmodel->login($user))?false:true;
    }
}