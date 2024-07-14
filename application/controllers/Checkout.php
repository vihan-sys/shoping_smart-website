<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Checkout extends CI_Controller {
    public function __construct(){
        parent::__construct();
        $this->load->database();
        $this->load->library('session');
        if(empty($this->session->userdata('login_id'))){
            redirect('login');
        }
        $this->load->helper(['date', 'html', 'url', 'form']);
        $this->load->library('form_validation');
        $this->load->model('checkoutModel');
        $this->load->model('homeModel');
        $this->load->model('cartModel');
        $this->load->helper('text');
    }
    public function index() {
        $user_id = $this->session->userdata('login_id');
        $data['get_category_nav'] = $this->homeModel->get_category_nav();
        $data['user'] = $this->checkoutModel->get_user($user_id);
        if ($data['user'] === null) {
            $data['user'] = [
                'del_username' => '',
                'del_email' => '',
                'del_phone' => '',
                'del_state' => '',
                'del_city' => '',
                'del_pincode' => '',
                'del_address' => ''
            ];
        }
        $data['cart_items'] = $this->checkoutModel->get_cart_items($user_id);
        $data['cart_total'] = $this->checkoutModel->get_cart_total($user_id);
        $data['shipping_cost'] = ($data['cart_total'] > 2000) ? 0 : 80;
        $data['total'] = $data['cart_total'] + $data['shipping_cost'];
        $this->form_validation->set_error_delimiters('<span style="color:red;">', '</span>');
        $this->form_validation->set_rules('del_username', 'username', 'required');
        $this->form_validation->set_rules('del_email', 'email', 'required|trim|valid_email');
        $this->form_validation->set_rules('del_phone', 'phone', 'required|trim');
        $this->form_validation->set_rules('del_state', 'state', 'required');
        $this->form_validation->set_rules('del_city', 'city', 'required');
        $this->form_validation->set_rules('del_pincode', 'pincode', 'required|trim');
        $this->form_validation->set_rules('del_address', 'address', 'required');
        $this->form_validation->set_rules('pay_mode', 'Payment Method', 'required');

        if ($this->form_validation->run() == FALSE) {
            $this->load->view('front/checkout', $data);
        } else {
            redirect('checkout/place_order');
        }
    }
    public function place_order() {
        $post = $this->input->post();
        $order_date = date('Y-m-d H:i:s');
        $delivery_date = date('Y-m-d H:i:s', strtotime($order_date . ' + 7 days'));
        $user_id = $this->session->userdata('login_id');
        $order_id = mt_rand(11111, 99999);
        $payment_id = mt_rand(1111111111, 9999999999);
        $pay_mode = $post['pay_mode'];
        $total = $post['total'];
        $delivery_charge = ($total >= 10000) ? 0 : 80;
        $user_data = [
            'del_username' => $post['del_username'],
            'del_email' => $post['del_email'],
            'del_phone' => $post['del_phone'],
            'del_state' => $post['del_state'],
            'del_city' => $post['del_city'],
            'del_pincode' => $post['del_pincode'],
            'del_address' => $post['del_address']
        ];
        $this->checkoutModel->update_user_information($user_id, $user_data);
        $order_data = [
            'order_id' => $order_id,
            'payment_id' => $payment_id,
            'user_id' => $user_id,
            'cust_name' => $post['del_username'],
            'cust_email' => $post['del_email'],
            'cust_mobile' => $post['del_phone'],
            'state' => $post['del_state'],
            'city' => $post['del_city'],
            'pincode' => $post['del_pincode'],
            'address' => $post['del_address'],
            'total' => $total,
            'delivery_charge' => $delivery_charge,
            'pay_mode' => $pay_mode,
            'order_status' => 1,
            'order_date' => $order_date,
            'delivery_date' => $delivery_date
        ];
        $this->checkoutModel->place_order($order_data);
        foreach ($post['cart_items'] as $item) {
            $order_item_data = [
                'user_id' => $user_id,
                'pro_id' => $item['pro_id'],
                'order_id' => $order_id,
                'sub_order_id' => "{$order_id}-" . mt_rand(11111, 99999),
                'pro_name' => $item['pro_name'],
                'pro_qty' => $item['pro_qty'],
                'pro_price' => $item['pro_price'],
                'pro_total_price' => $item['pro_price'] * $item['pro_qty'],
                'pro_image' => $item['pro_image'],
                'slug' => $item['slug'],
                'payment_id' => $payment_id,
                'pro_status' => 1,
                'order_date' => $order_date
            ];
            $this->checkoutModel->place_order_item($order_item_data);
            $this->checkoutModel->update_product_stock($item['pro_id'], $item['pro_qty']);
        }
        $this->checkoutModel->clear_cart($user_id);
        $this->session->set_userdata('order_confirmation', [
            'order_id' => $order_id,
            'payment_id' => $payment_id,
            'payment_mode' => $pay_mode,
            'order_date' => $order_date,
            'total_amount' => $total
        ]);
        redirect('checkout/order_confirmation');
    }
    public function order_confirmation() {
        $data = $this->session->userdata('order_confirmation');
        if (empty($data)) {
            redirect('profile');
        }
        $this->load->view('front/order-confirmation', $data);
        $this->session->unset_userdata('order_confirmation');
    }
}
