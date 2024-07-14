<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class CategoryModel extends CI_Model {
    public function add_category($post){
        $post['added_on'] = date('d M, Y');
        $post['cate_id'] = mt_rand(11111,99999);
        $post['slug'] = $this->slug($post['cate_name']);
        $q = $this->db->insert('ec_category',$post);
        if($q){
            return true;
        }else{
            return false;
        }
    }
    public function all_category(){
        $q = $this->db->where(['status'=>1, 'parent_id'=>''])->get('ec_category');
        if($q->num_rows()){
            return $q->result();
        }
    }
    public function get_sub_cate($cate_id){
        $q = $this->db->where(['status'=>1,'parent_id'=>$cate_id])->get('ec_category');
        if($q->num_rows()){
            $output='';
            foreach($q->result() as $val){
                $output.='<option value="'.$val->cate_id.'" selected>'.$val->cate_name.'</option>';
            }
            echo $output;
        }
    }
    public function slug($cate_name){
        $slug = strtolower(trim(preg_replace('/[^A-Za-z0-9-]+/', '-', $cate_name)));
        return $slug;
    }
}