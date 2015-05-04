<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');


class Users extends CI_Controller{
    public function adminview(){
        $this->load->view('admindashboard');
    }

    public function login(){
        $this->load->view('login');
    }
}