<?php

class Dashboard extends MY_Controller{

    public function index(){
       $data['users'] = getrow('user','','array');

       $this->load_page('index',$data);
    }
    // public function index() {
    //     $data['users'] = getrow('user','','array');
    //     $this->load_page('admin',$data);
    // }



}