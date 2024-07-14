<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class ShopModel extends CI_Model {
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
}