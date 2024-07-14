<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Profile extends CI_Controller {
    public function __construct(){
        parent::__construct();
        $this->load->database();
        $this->load->library('session');
        if(empty($this->session->userdata('login_id'))){
            redirect('login');
        }
        $this->load->helper(['date', 'html', 'url', 'form']);
        $this->load->library(['form_validation', 'pagination']);
        $this->load->model('profileModel');
        $this->load->model('homeModel');
        $this->load->helper('text');
    }
    public function index($page = 0){
        $user_id = $this->session->userdata('login_id');
        $data['get_category_nav'] = $this->homeModel->get_category_nav();
        $data['user'] = $this->profileModel->get_user($user_id);
        $this->form_validation->set_error_delimiters('<span style="color:red;">', '</span>');
        $this->form_validation->set_rules('username','Username','required');
        $this->form_validation->set_rules('email','Email','required|trim|valid_email');
        $this->form_validation->set_rules('phone','Phone','required|trim');
        $this->form_validation->set_rules('state','State','required');
        $this->form_validation->set_rules('city','City','required');
        $this->form_validation->set_rules('pincode','Pincode','required|trim');
        $this->form_validation->set_rules('address','Address','required');
        $config['base_url'] = base_url('profile/index');
        $config['total_rows'] = $this->profileModel->get_orders_count($user_id);
        $config['per_page'] = 5;
        $config['uri_segment'] = 3;
        $config['full_tag_open'] = '<div class="tp-pagination"><nav><ul>';
        $config['full_tag_close'] = '</ul></nav></div>';
        $config['prev_tag_open'] = '<li>';
        $config['prev_tag_close'] = '</li>';
        $config['next_tag_open'] = '<li>';
        $config['next_tag_close'] = '</li>';
        $config['num_tag_open'] = '<li>';
        $config['num_tag_close'] = '</li>';
        $config['cur_tag_open'] = '<li><span class="current">';
        $config['cur_tag_close'] = '</span></li>';
        $this->pagination->initialize($config);
        $data['orders'] = $this->profileModel->get_paginated_orders($user_id, $config['per_page'], $page);
        $data['pagination_links'] = $this->pagination->create_links();
        if($this->form_validation->run()){
            $post = $this->input->post();
            $post['user_id'] = $user_id;
            $this->profileModel->profile($post);
            redirect('profile');
        } else {
            $this->load->view('front/profile', $data);
        }
    }
    public function cancel_order($sub_order_id) {
        $user_id = $this->session->userdata('login_id');
        if ($this->profileModel->cancel_order($sub_order_id, $user_id)) {
            $this->session->set_flashdata('success', 'Order has been cancelled successfully.');
        } else {
            $this->session->set_flashdata('error', 'Failed to cancel the order. Please try again.');
        }
        redirect('profile');
    }
    public function view_order_details($order_id) {
        $user_id = $this->session->userdata('login_id');
        $data['order'] = $this->profileModel->get_order($order_id, $user_id);
        $data['order_items'] = $this->profileModel->get_order_items($order_id, $user_id);
        $data['bill_address'] = $this->profileModel->get_user($user_id);
        $this->load->view('front/view-order-details', $data);
    }
}