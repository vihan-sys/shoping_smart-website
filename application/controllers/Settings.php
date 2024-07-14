<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Settings extends CI_Controller {
    public function __construct(){
        parent::__construct();
        $this->load->database();
        $this->load->model('settingsModel');
        $this->load->library('session');
        $this->load->helper('url');
    }
	public function pincode()
	{
        $this->load->helper('date');
        $this->load->database();
        $this->load->library('session');
        $this->load->helper('url');
        $this->load->helper('form');
        $this->load->library('form_validation');
        $this->form_validation->set_error_delimiters('<span style="color:red;">', '</span>');
        $this->form_validation->set_rules('pincode','pincode','required|trim');
        $this->form_validation->set_rules('delivery_charge','delivery charges','required|trim');
        $this->form_validation->set_rules('status','status','required|trim');
        if($this->form_validation->run()){
            $post = $this->input->post();
            $check = $this->settingsModel->add_pincode($post);
            if($check){
                $this->session->set_flashdata('success','Data added successfully');
                redirect('settings/pincode');
            }
        }else{
            $this->load->view('pincode');
        }
	}
    public function banner(){
        $this->load->helper('date');
        $this->load->database();
        $this->load->library('session');
        $this->load->helper('form');
        $this->load->helper('url');
        $this->load->library('form_validation');
        $this->form_validation->set_error_delimiters('<span style="color:red;">', '</span>');
        if(empty($_FILES['bann_image']['name'])){
            $this->form_validation->set_rules('bann_image','banner image','required|trim');
            $this->form_validation->set_rules('headline','headline','required');
            $this->form_validation->set_rules('tagline','tagline','required');
        }
        $this->form_validation->set_rules('status','status','required|trim');
        if($this->form_validation->run()){

            $post = $this->input->post();
            $config = array(
                'upload_path' => './uploads/',
                'allowed_types' => "jpg|png|jpeg",
            );
            $this->load->library('upload', $config);
            $this->upload->do_upload('bann_image');
            $image = $this->upload->data();
            $post['bann_image'] = $image['file_name'];

            $check = $this->settingsModel->add_banner($post);
            if($check){
                $this->session->set_flashdata('success','Data added successfully');
                redirect('settings/banner');
            }
        }else{
            $this->load->view('banner');
        }
    }
}
