<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Cart extends CI_Controller {
    public function __construct(){
        parent::__construct();
        $this->load->database();
        $this->load->library('session');
        if(empty($this->session->userdata('login_id'))){
            redirect('login');
        }
        $this->load->helper('date');
        $this->load->model('cartModel');
        $this->load->model('homeModel');
        $this->load->helper('html');
        $this->load->helper('url');
        $this->load->helper('text');
    }
    public function index(){
        $data['get_category_nav'] = $this->homeModel->get_category_nav();
        $data['cart'] = $this->cartModel->get_cart();
        $data['total'] = $this->cartModel->get_total();
        $this->load->view('front/cart',$data);
    }
    public function add_to_Cart(){
        $post = $this->input->post();
        $check = $this->cartModel->add_to_cart($post);
        if($check){
            $this->session->set_flashdata('success','Product added to cart.');
            redirect ('cart');
        }else{
            $this->session->set_flashdata('error','Product already exist to cart.');
            redirect ('cart');
        } 
    }
    public function cart_update(){
        $post = $this->input->post();
        $check = $this->cartModel->cart_update($post);
        if($check){
            $this->session->set_flashdata('success','Cart updated successfully.');
            redirect ('cart');
        }else{
            $this->session->set_flashdata('success','Cart updated successfully.');
            redirect ('cart');
        }
    }
    public function delete_product($pro_id){
        $check = $this->cartModel->delete_product($pro_id);
        if($check){
            $this->session->set_flashdata('success','Product removed from cart');
            redirect ('cart');
        }
    }
}