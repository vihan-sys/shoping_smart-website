<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class profileModel extends CI_Model {
    public function get_product_details($post){
        $data = [
            'category' => $post['category'],
            'sub_category' => $post['sub_category'],
            'pro_name' => $post['pro_name'],
            'brand' => $post['brand'],
            'featured' => $post['featured'],
            'highlights' => $post['highlights'],
            'description' => $post['description'],
            'meta_title' => $post['meta_title'],
            'meta_keywords' => $post['meta_keywords'],
            'meta_desc' => $post['meta_desc'],
            'pro_main_image' => $post['pro_main_image'],
            'stock' => $post['stock'],
            'mrp' => $post['pro'],
            'selling_price' => $post['selling_price'],
            'status' => $post['status'],
            'updated_on' => date('d M, Y')
        ];
        $pro_id = $post['pro_id'];
        $this->db->where('pro_id', $pro_id);
        $this->db->update('ec_product', $data);
    }
    public function get_product($pro_id){
        $this->db->where('pro_id', $pro_id);
        return $this->db->get('ec_product')->row_array();
    }
}