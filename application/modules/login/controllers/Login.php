<?php

class Login extends MY_Controller{

    public function index(){
        $data = array();
        $data['title'] = 'login';
        $this->load_page('login', $data);

    }

    public function loginUser(){

        $uname = $_POST['username'];
        $pass = $_POST['password'];
        $param['select'] = '*';
        $param['where'] = array(
            'username' => $uname,
            'password' => md5($pass),
            'user_status' => 1
        );
        $res = getrow('user',$param,'row');
        if(!empty($res)) {
            $_SESSION['username'] = $res->lastname . ' ' . $res->firstname;
            $_SESSION['userid'] = $res->id;
            $res->user_type == 'admin' ? redirect(base_url().'dashboard/index') : redirect(base_url().'home/index'); 
        }
         else {
           echo '<script> alert("Username or Password is Incorect"); window.location.replace("login")</script>';
        }
    }

}