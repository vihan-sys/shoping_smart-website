<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class ProductModel extends CI_Model {
    public function add_product($post){
        $post['added_on'] = date('d M, Y');
        $post['slug'] = $this->slug($post['pro_name']);
        $q = $this->db->insert('ec_product',$post);
        if($q){
            $this->session->unset_userdata('pro_id');
            return true;
        }else{
            return false;
        }
    }
    function slug($string){
        $slug = strtolower(trim(preg_replace('/[^A-Za-z0-9-]+/', '-', $string)));
        return $slug;
    }
    public function fetch_cat($slug){
        $q = $this->db->select('cate_id')->where('slug',$slug)->get('ec_category');
        if($q->num_rows()){
            return $q->row()->cate_id;
        }
    }
    public function fetch_product($cate_id){
        $this->db->where(['status'=>1]);
        $this->db->like(['category'=>$cate_id]);
        $this->db->or_like(['sub_category'=>$cate_id]);
        $q = $this->db->get('ec_product');
            if($q->num_rows()){
                return $q->result();
            }else{
                return false; 
            }
    }
    public function searchProducts($query, $category = null, $maxPrice = null) {
        $categories = $this->db->get('ec_category')->result_array();
        $this->db->select('*');
        $this->db->from('ec_product');
        if (!empty($query)) {
            $this->db->like('pro_name', $query);
        }
        if (!empty($category)) {
            $this->db->where('category', $category);
        }
        $products = $this->db->get()->result_array();
        foreach ($products as &$product) {
            foreach ($categories as $category) {
                if ($product['category'] == $category['cate_id']) {
                    $product['category_name'] = $category['cate_name'];
                    break;
                }
            }
        }
        return $products;
    }
    
}