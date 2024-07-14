<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class LoginModel extends CI_Model {
    public function auth($post){
        $email = $post['email'];
        $pass = $post['password'];
        $q = $this->db->where(['email'=>$email,'status'=>1])->get('ec_users');
        if($q->num_rows()){
            $arr = $q->row();
            $db_pass = $arr->password;
            $user_id = $arr->user_id;
            $username = $arr->username;
            if(password_verify($pass, $db_pass)){
                $this->session->set_userdata('login_id',$user_id);
                $this->session->set_userdata('username',$username);
                $this->db->where('user_id',$this->session->userdata('user_id'))->update('ec_cart',['user_id'=>$user_id]);
                return true;
            }else{
                return false;
            }
        }else{
            return false;
        }
    }
}