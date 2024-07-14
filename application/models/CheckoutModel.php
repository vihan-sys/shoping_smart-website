<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class checkoutModel extends CI_Model {
    public function profile($post) {
        $data = [
            'del_username' => $post['del_username'],
            'del_email' => $post['del_email'],
            'del_phone' => $post['del_phone'],
            'del_state' => $post['del_state'],
            'del_city' => $post['del_city'],
            'del_pincode' => $post['del_pincode'],
            'del_address' => $post['del_address'],
            'updated_on' => date('Y-m-d H:i:s')
        ];
        $user_id = $post['user_id'];
        $this->db->where('user_id', $user_id);
        $this->db->update('ec_users', $data);
    }
    public function get_user($user_id) {
        $this->db->where('user_id', $user_id);
        return $this->db->get('ec_users')->row_array();
    }
    public function get_cart_items($user_id) {
        $this->db->select('*');
        $this->db->from('ec_cart');
        $this->db->where('user_id', $user_id);
        return $this->db->get()->result_array();
    }
    public function get_cart_total($user_id) {
        $this->db->select('SUM(pro_price * pro_qty) as total');
        $this->db->from('ec_cart');
        $this->db->where('user_id', $user_id);
        $query = $this->db->get();
        $row = $query->row_array();
        return $row['total'];
    }
    public function place_order($order_data) {
        $this->db->insert('ec_order', $order_data);
        return $this->db->insert_id(); 
    }
    public function place_order_item($order_item_data) {
        $this->db->insert('ec_order_items', $order_item_data);
    }
    public function update_product_stock($pro_id, $ordered_qty) {
        $this->db->select('stock');
        $this->db->from('ec_product');
        $this->db->where('pro_id', $pro_id);
        $query = $this->db->get();
        $product = $query->row();
        if ($product) {
            $new_stock = $product->stock - $ordered_qty;
            $this->db->where('pro_id', $pro_id);
            $this->db->update('ec_product', array('stock' => $new_stock));
        }
    }
    public function update_user_information($user_id, $data) {
        $this->db->where('user_id', $user_id);
        $this->db->update('ec_users', $data);
    }
    public function clear_cart($user_id) {
        $this->db->where('user_id', $user_id);
        $this->db->delete('ec_cart');
    }    
    public function order_confirmation() {
        $data = $this->session->userdata('order_confirmation');
        if (empty($data)) {
            redirect('shop');
        }
        $data['get_category_nav'] = $this->homeModel->get_all_categories();
        $this->load->view('front/order-confirmation', $data);
        $this->session->unset_userdata('order_confirmation');
    }
    
}
