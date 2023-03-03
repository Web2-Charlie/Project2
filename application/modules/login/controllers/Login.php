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
        $param['select'] = 'firstname, lastname, username, password, user_type';
        //$param['where'] = "username = '$uname' AND password = '$pass'";
        $param['where'] = array(
            'username' => $uname,
            'password' => $pass
        );
        $res = getrow('user',$param,'row');
        // $res[0]['user_type']

        $_SESSION['username'] = $uname;
        if(!empty($res)) {
            $res->user_type == 'user' ? redirect(base_url().'dashboard/index') : redirect(base_url().'dashboard/index'); 
        }
        else {
            echo '<script> alert("Username or Password is Incorect"); window.location.replace("index")</script>';
        }
    }

}