<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Category extends CI_Controller {
    public function __construct(){
        parent::__construct();
        $this->load->helper('date');
        $this->load->database();
        $this->load->model('categoryModel');
        $this->load->library('session');
        $this->load->helper('url');
    }
	public function index(){
        $this->load->helper('form');
        $this->load->library('form_validation');
        $this->form_validation->set_error_delimiters('<span style="color:red;">', '</span>');
        $this->form_validation->set_rules('cate_name','category name','required|trim');
        $this->form_validation->set_rules('status','status','required|trim');
        if($this->form_validation->run()){
            $post = $this->input->post();
            $config['upload_path'] = './uploads/';
            $config['allowed_types'] = 'jpg|png|jpeg';
            $this->load->library('upload',$config);
            $this->upload->do_upload('image');
            $data = $this->upload->data();
            $post['image'] = $data['raw_name'].$data['file_ext'];
            $check = $this->categoryModel->add_category($post);
            if($check){
                $this->session->set_flashdata('success','Category added successfully');
                redirect('category');
            }
        }else{
            $data['categories'] = $this->categoryModel->all_category();
            $this->load->view('category',$data);
        }
	}
    public function get_sub_cate(){
        $cate_id = $this->input->post('cate_id');
        echo $this->categoryModel->get_sub_cate($cate_id);
        
    }
}
