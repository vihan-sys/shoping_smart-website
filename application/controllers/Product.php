<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Product extends CI_Controller {
    public function __construct(){
        parent::__construct();
        $this->load->database();
        $this->load->library('session');
        if($this->session->userdata('user_id')){

        }else{
            $this->session->set_userdata('user_id',mt_rand(11111,99999));
        }
        $this->load->helper('date');
        $this->load->model('categoryModel');
        $this->load->model('productModel');
        $this->load->model('homeModel');
        $this->load->helper('url');
        $this->load->helper('text');
    }
	public function index()
	{
        $this->load->helper('form');
        $this->load->library('form_validation');
        $this->form_validation->set_error_delimiters('<span style="color:red;">', '</span>');
        $this->form_validation->set_rules('pro_id','Product ID','required|trim');
        $this->form_validation->set_rules('category','category','required|trim');
        $this->form_validation->set_rules('pro_name','Product name','required|trim');
        $this->form_validation->set_rules('brand','Brand name','required|trim');
        $this->form_validation->set_rules('highlights','Highlights','required|trim');
        $this->form_validation->set_rules('description','Description','required|trim');
        $this->form_validation->set_rules('mrp','MRP','required|trim');
        $this->form_validation->set_rules('selling_price','Selling price','required|trim');
        $this->form_validation->set_rules('stock','Stock','required|trim');
        $this->form_validation->set_rules('status','Status','required|trim');
        if(empty($_FILES['pro_main_image']['name'])){
            $this->form_validation->set_rules('pro_main_image','Product image','required|trim');
        }
        if($this->form_validation->run()){
            $post = $this->input->post();
            $config['upload_path'] = './uploads/';
            $config['allowed_types'] = 'jpg|png|jpeg';
            $this->load->library('upload',$config);
            $this->upload->do_upload('pro_main_image');
            $data = $this->upload->data();
            $post['pro_main_image'] = $data['raw_name'].$data['file_ext'];
            $check = $this->productModel->add_product($post);
            if($check){
                $this->session->set_flashdata('success', 'Product added successfully');
                redirect('product');
            }else{
                $this->session->set_flashdata('error', 'Failed to add product. Try again.');
                redirect('product');
            }
        }else{
            if($this->session->userdata('pro_id')!=''){
                $pro_id = $this->session->userdata('pro_id');
            }else{
                $this->session->set_userdata('pro_id',mt_rand(11111,99999));
            }
            $data['categories'] = $this->categoryModel->all_category();
            $data['pro_id'] = $pro_id;
            $this->load->view('product', $data);
        }
	}
    public function product_by_cat($slug,$slug2=''){
        if(!empty($slug) && !empty($slug2)){
            $slug = $slug2;
        }else{
            $slug = $slug;
        }
        $cate_id = $this->productModel->fetch_cat($slug);
        if ($cate_id) {
            $data['get_category_nav'] = $this->homeModel->get_category_nav();
            $products = $this->productModel->fetch_product($cate_id);
            if ($products) {
                $data['products'] = $products;
                $this->load->view('front/product_list', $data);
            } else {
                $data['products'] = [];
                $this->load->view('front/product_list', $data);
            }
        } else {
            $data['products'] = [];
            $this->load->view('front/product_list', $data);
        }
    }
    public function search() {
        $this->load->model('productModel');
        $data['get_category_nav'] = $this->homeModel->get_category_nav();
        $query = $this->input->get('query');
        $category = $this->input->get('category');
        $data['results'] = $this->productModel->searchProducts($query, $category);
        $this->load->view('front/search_results', $data);
    }
}
