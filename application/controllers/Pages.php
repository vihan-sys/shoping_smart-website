<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Pages extends CI_Controller {
    public function __construct(){
        parent::__construct();
        $this->load->database();
        $this->load->library('session');
        $this->load->helper(['date', 'html', 'url', 'form']);
        $this->load->library('form_validation');
        $this->load->model('checkoutModel');
        $this->load->model('homeModel');
        $this->load->model('cartModel');
        $this->load->helper('text');
    }
    public function about() {
        $this->load->view('front/pages/about');
    }
    public function contact() {
        $this->load->view('front/pages/contact');
    }
    public function privacy() {
        $this->load->view('front/pages/privacy');
    }
}
