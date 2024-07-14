<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class RegisterModel extends CI_Model {
    public function register($post){
        $data['user_id'] = mt_rand(11111,99999);
        $data['username'] = $post['name'];
        $data['email'] = $post['email'];
        $data['password'] = password_hash($post['password'],PASSWORD_BCRYPT);
        $data['status'] = 1;
        $data['ip'] = $_SERVER['REMOTE_ADDR'];
        $data['added_on'] = date('d M, Y');
        $this->db->insert('ec_users',$data);
        redirect('profile');
    }
}