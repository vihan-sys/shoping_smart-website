<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Register extends CI_Controller {
    public function __construct(){
        parent::__construct();
        $this->load->database();
        $this->load->library('session');
        if(!empty($this->session->userdata('login_id'))){
            redirect('profile');
        }
        $this->load->helper('date');
        $this->load->model('registerModel');
        $this->load->helper('html');
        $this->load->helper('url');
        $this->load->helper('form');
        $this->load->library('form_validation');
    }
    public function index(){
        $this->form_validation->set_error_delimiters('<span style="color:red;">', '</span>');
        $this->form_validation->set_rules('name','full name','required|trim');
        $this->form_validation->set_rules('email','email','required|trim|valid_email|is_unique[ec_users.email]',['is_unique'=>'User with this email already exist']);
        $this->form_validation->set_rules('password','password','required|trim|min_length[6]');
        if($this->form_validation->run()){
            $post = $this->input->post();
            $this->registerModel->register($post);
            redirect('profile');
        }else{
            $this->load->view('front/register');
        }
    }
}