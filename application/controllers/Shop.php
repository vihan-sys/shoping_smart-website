<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Shop extends CI_Controller {
    public function __construct(){
        parent::__construct();
        $this->load->database();
        $this->load->library('session');
        if($this->session->userdata('user_id')){

        }else{
            $this->session->set_userdata('user_id',mt_rand(11111,99999));
        }
        $this->load->helper('date');
        $this->load->library('form_validation');
        $this->load->model('shopModel');
        $this->load->model('homeModel');
        $this->load->helper('html');
        $this->load->helper('url');
        $this->load->helper('text');
    }
    public function index(){
        $data['products'] = $this->shopModel->get_products();
        $data['get_category_nav'] = $this->homeModel->get_category_nav();
        $this->load->view('front/shop', $data);
        
    }
}