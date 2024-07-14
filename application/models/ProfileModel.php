<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class profileModel extends CI_Model {
    public function profile($post){
        $data = [
            'username' => $post['username'],
            'email' => $post['email'],
            'phone' => $post['phone'],
            'state' => $post['state'],
            'city' => $post['city'],
            'pincode' => $post['pincode'],
            'address' => $post['address'],
            'updated_on' => date('d M, Y')
        ];
        $user_id = $post['user_id'];
        $this->db->where('user_id', $user_id);
        $this->db->update('ec_users', $data);
    }
    public function get_user($user_id){
        $this->db->where('user_id', $user_id);
        return $this->db->get('ec_users')->row_array();
    }
    public function get_orders($user_id){
        $this->db->where('user_id', $user_id);
        $this->db->order_by('order_date', 'DESC');
        return $this->db->get('ec_order_items')->result();
    }
    public function get_orders_count($user_id) {
        $this->db->where('user_id', $user_id);
        return $this->db->count_all_results('ec_order_items');
    }
    public function get_paginated_orders($user_id, $limit, $offset) {
        $this->db->where('user_id', $user_id);
        $this->db->order_by('order_date', 'DESC');
        $this->db->limit($limit, $offset);
        return $this->db->get('ec_order_items')->result();
    }
    public function cancel_order($sub_order_id, $user_id) {
        $data = ['pro_status' => 5];
        $this->db->where('sub_order_id', $sub_order_id);
        $this->db->where('user_id', $user_id);
        return $this->db->update('ec_order_items', $data);
    }
    public function get_order($order_id, $user_id) {
        $this->db->where('order_id', $order_id);
        $this->db->where('user_id', $user_id);
        return $this->db->get('ec_order')->row_array();
    }
    public function get_order_items($order_id, $user_id) {
        $this->db->where('order_id', $order_id);
        $this->db->where('user_id', $user_id);
        $this->db->order_by('order_date', 'DESC');
        return $this->db->get('ec_order_items')->result_array();
    }
    




}