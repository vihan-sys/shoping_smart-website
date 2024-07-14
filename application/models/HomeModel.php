<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class HomeModel extends CI_Model {
    public function get_banner(){
        $q = $this->db->where('status','1')->order_by('id','desc')->get('ec_banner');
        if($q->num_rows()){
            return $q->result();
        }else{
            return false;
        }
    }
    public function get_categ(){
        $q = $this->db->where('status','1')->order_by('id','asc')->get('ec_category');
        if($q->num_rows()){
            return $q->result();
        }else{
            return false;
        }
    }
    public function get_products(){
        $q = $this->db->where('status','1')->order_by('id','desc')->get('ec_product');
        if($q->num_rows()){
            return $q->result();
        }else{
            return false;
        }
    }
    public function category_name($cate_id){
        $q = $this->db->where('cate_id',$cate_id)->get('ec_category');
        if($q->num_rows()){
            return $q->row()->cate_name;
        }else{
            return false;
        }
    }
    public function get_category_nav(){
        $q = $this->db->where(['status'=>1,'parent_id'=>''])->get('ec_category');
        if($q->num_rows()){
            return $q->result();
        }else{
            return false;
        }
    }
    public function get_subcat_check($cate_id){
        $q = $this->db->where(['status'=>1,'parent_id'=>$cate_id])->get('ec_category');
        if($q->num_rows()){
            return true;
        }else{
            return false;
        }
    }
    public function get_subcategory($cate_id){
        $q = $this->db->where(['status'=>1,'parent_id'=>$cate_id])->get('ec_category');
        if($q->num_rows()){
            return $q->result();
        }else{
            return false;
        }
    }
    public function product_details($slug){
        $q = $this->db->where(['slug'=>$slug, 'status'=>'1'])->get('ec_product');
        if($q->num_rows()){
            return $q->row();
        }else{
            return false;
        }
    }
    public function get_product_details($pro_id) {
        $q = $this->db->where(['pro_id' => $pro_id])
              ->group_start()
              ->where('status', '1')
              ->or_where('status', '0')
              ->group_end()
              ->get('ec_product');
              
        if ($q->num_rows()) {
            return $q->row();
        } else {
            return false;
        }
    }
    public function get_all_product_ids() {
        $q = $this->db->select('pro_id')->get('ec_product');
        if ($q->num_rows()) {
            return $q->result();
        } else {
            return [];
        }
    }
    public function get_all_categories() {
        $q = $this->db->select('cate_id, cate_name')->get('ec_category');
        if ($q->num_rows()) {
            return $q->result();
        } else {
            return [];
        }
    }
    public function update_category_status($cate_id, $status) {
        $this->db->where('cate_id', $cate_id);
        return $this->db->update('ec_category', ['status' => $status]);
    }
    public function get_banner_details($bann_id) {
        $q = $this->db->where(['bann_id' => $bann_id])
              ->group_start()
              ->where('status', '1')
              ->or_where('status', '0')
              ->group_end()
              ->get('ec_banner');
              
        if ($q->num_rows()) {
            return $q->row();
        } else {
            return false;
        }
    }
    public function get_all_banner_ids() {
        $q = $this->db->select('bann_id')->get('ec_banner');
        if ($q->num_rows()) {
            return $q->result();
        } else {
            return [];
        }
    }
    public function get_all_users() {
        $q = $this->db->select('user_id, username')->get('ec_users');
        if ($q->num_rows()) {
            return $q->result();
        } else {
            return [];
        }
    }
    public function update_user_status($user_id, $status) {
        $this->db->where('user_id', $user_id);
        return $this->db->update('ec_users', ['status' => $status]);
    }
    public function order_ids() {
        $query = $this->db->select('order_id')->get('ec_order');
        if ($query->num_rows() > 0) {
            return $query->result_array();
        } else {
            return [];
        }
    }
    public function get_all_order_items() {
        $this->db->order_by('order_date', 'DESC');
        $query = $this->db->get('ec_order_items');
        if ($query->num_rows() > 0) {
            return $query->result_array();
        } else {
            return [];
        }
    }
    
}