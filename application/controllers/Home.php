<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Home extends CI_Controller {
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
        $this->load->model('homeModel');
        $this->load->model('profileModel');
        $this->load->helper('html');
        $this->load->helper('url');
        $this->load->helper('text');
    }
    public function index(){
        $data['banner'] = $this->homeModel->get_banner();
        $data['categ'] = $this->homeModel->get_categ();
        $data['products'] = $this->homeModel->get_products();
        $data['get_category_nav'] = $this->homeModel->get_category_nav();
        $this->load->view('front/index',$data);
    }
    public function product_details($slug){
        $data['get_category_nav'] = $this->homeModel->get_category_nav();
        $data['arr'] = $this->homeModel->product_details($slug);
        $this->load->view('front/product-details',$data);
    }
    public function product_update($pro_id = NULL) {
        $data['product_ids'] = $this->homeModel->get_all_product_ids();
        $data['categories'] = $this->homeModel->get_all_categories();
        if ($pro_id) {
            $data['product'] = $this->homeModel->get_product_details($pro_id);
        }
        $this->form_validation->set_error_delimiters('<span style="color:red;">', '</span>');
        $this->form_validation->set_rules('pro_id', 'Product ID', 'required');
        $this->form_validation->set_rules('pro_name', 'Product Name', 'required');
        $this->form_validation->set_rules('category', 'Category', 'required');
        $this->form_validation->set_rules('highlights', 'Highlights', 'required');
        $this->form_validation->set_rules('description', 'Description', 'required');
        $this->form_validation->set_rules('stock', 'Stock', 'required');
        $this->form_validation->set_rules('mrp', 'MRP', 'required');
        $this->form_validation->set_rules('selling_price', 'Selling Price', 'required');
        $this->form_validation->set_rules('status', 'Status', 'required');
        if ($this->form_validation->run() == FALSE) {
            $this->load->view('product-update', $data);
        } else {
            $pro_id = $this->input->post('pro_id');
            $update_data = [
                'pro_name' => $this->input->post('pro_name'),
                'category' => $this->input->post('category'),
                'sub_category' => $this->input->post('sub_category'),
                'brand' => $this->input->post('brand'),
                'featured' => $this->input->post('featured'),
                'highlights' => $this->input->post('highlights'),
                'description' => $this->input->post('description'),
                'stock' => $this->input->post('stock'),
                'mrp' => $this->input->post('mrp'),
                'selling_price' => $this->input->post('selling_price'),
                'meta_title' => $this->input->post('meta_title'),
                'meta_keywords' => $this->input->post('meta_keywords'),
                'meta_desc' => $this->input->post('meta_desc'),
                'status' => $this->input->post('status'),
                'updated_on' => date('d M, Y')
            ];
            if (!empty($_FILES['pro_main_image']['name'])) {
                $config['upload_path'] = './uploads/';
                $config['allowed_types'] = 'jpg|jpeg|png';
                $this->load->library('upload', $config);
                if ($this->upload->do_upload('pro_main_image')) {
                    $upload_data = $this->upload->data();
                    $update_data['pro_main_image'] = $upload_data['file_name'];
                }
            }
            if (!empty($_FILES['gallery_image']['name'])) {
                $config['upload_path'] = './uploads/';
                $config['allowed_types'] = 'jpg|jpeg|png';
                $this->upload->initialize($config);
                if ($this->upload->do_upload('gallery_image')) {
                    $upload_data = $this->upload->data();
                    $update_data['gallery_image'] = $upload_data['file_name'];
                }
            }
            $this->db->where('pro_id', $pro_id);
            if($this->db->update('ec_product', $update_data)){
                $this->session->set_flashdata('success', 'Product updated successfully');
            }else{
                $this->session->set_flashdata('error', 'Failed to update product');
            }
            redirect('home/product_update');
        }
    }
    public function get_product_details($pro_id) {
        $product = $this->homeModel->get_product_details($pro_id);
        echo json_encode($product);
    }
    public function category_status_update() {
        $data['categories'] = $this->homeModel->get_all_categories();
        $this->load->view('category-status-update', $data);
    }
    public function update_category_status() {
        $this->form_validation->set_rules('cate_id', 'Category', 'required');
        $this->form_validation->set_rules('status', 'Status', 'required');
        if ($this->form_validation->run() == FALSE) {
            $this->session->set_flashdata('error', 'Please fill in all required fields.');
            redirect('category-status-update');
        } else {
            $cate_id = $this->input->post('cate_id');
            $status = $this->input->post('status');

            if ($this->homeModel->update_category_status($cate_id, $status)) {
                $this->session->set_flashdata('success', 'Category status updated successfully.');
            } else {
                $this->session->set_flashdata('error', 'Failed to update category status.');
            }
            redirect('category-status-update');
        }
    }
    public function banner_update($bann_id = NULL) {
        $data['banner_ids'] = $this->homeModel->get_all_banner_ids();
        if ($bann_id) {
            $data['banner'] = $this->homeModel->get_banner_details($bann_id);
        }
        $this->form_validation->set_error_delimiters('<span style="color:red;">', '</span>');
        $this->form_validation->set_rules('headline', 'headline', 'required');
        $this->form_validation->set_rules('tagline', 'tagline', 'required');
        $this->form_validation->set_rules('status', 'status', 'required');
        if ($this->form_validation->run() == FALSE) {
            $this->load->view('banner-update', $data);
        } else {
            $bann_id = $this->input->post('bann_id');
            $update_data = [
                'headline' => $this->input->post('headline'),
                'tagline' => $this->input->post('tagline'),
                'status' => $this->input->post('status'),
                'updated_on' => date('d M, Y')
            ];
            if (!empty($_FILES['bann_image']['name'])) {
                $config['upload_path'] = './uploads/';
                $config['allowed_types'] = 'jpg|jpeg|png';
                $this->load->library('upload', $config);

                if ($this->upload->do_upload('bann_image')) {
                    $upload_data = $this->upload->data();
                    $update_data['bann_image'] = $upload_data['file_name'];
                }
            }
            $this->db->where('bann_id', $bann_id);
            if($this->db->update('ec_banner', $update_data)){
                $this->session->set_flashdata('success', 'Banner updated successfully');
            }else{
                $this->session->set_flashdata('error', 'Failed to update banner');
            }
            redirect('home/banner_update');
        }
    }
    public function get_banner_details($bann_id) {
        $banner = $this->homeModel->get_banner_details($bann_id);
        echo json_encode($banner);
    }
    public function user_status_update() {
        $data['users'] = $this->homeModel->get_all_users();
        $this->load->view('user-status-update', $data);
    }
    public function update_user_status() {
        $this->form_validation->set_rules('user_id', 'user id', 'required');
        $this->form_validation->set_rules('status', 'status', 'required');
        if ($this->form_validation->run() == FALSE) {
            $this->session->set_flashdata('error', 'Please fill in all required fields.');
            redirect('user-status-update');
        } else {
            $user_id = $this->input->post('user_id');
            $status = $this->input->post('status');

            if ($this->homeModel->update_user_status($user_id, $status)) {
                $this->session->set_flashdata('success', 'User status updated successfully.');
            } else {
                $this->session->set_flashdata('error', 'Failed to update user status.');
            }
            redirect('user-status-update');
        }
    }
    public function order_status_update() {
        $data['orders'] = $this->homeModel->get_all_order_items();
        $this->form_validation->set_error_delimiters('<span style="color:red;">', '</span>');
        $this->form_validation->set_rules('pro_status', 'Status', 'required');

        if ($this->form_validation->run() == FALSE) {
            $this->load->view('order-status-update', $data);
        } else {
            $order_id = $this->input->post('order_id');
            $update_data = [
                'pro_status' => $this->input->post('pro_status'),
                'updated_on' => date('d M, Y')
            ];
            $this->db->where('sub_order_id', $order_id);
            if ($this->db->update('ec_order_items', $update_data)) {
                $this->session->set_flashdata('success', 'Order status updated successfully');
            } else {
                $this->session->set_flashdata('error', 'Failed to update order status');
            }
            redirect('home/order_status_update');
        }
    }
}