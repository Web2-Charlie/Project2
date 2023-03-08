<?php

class Dashboard extends MY_Controller{

    public function index(){

        $param = array();
        $param['limit'] = array(5,0);
        $data['users'] = getrow('user',$param,'array');
        $data['tasklist'] = getrow('task','','array');

    //    echo "<pre>";
    //    print_r($data);
    //    die;
       $this->load_page('index',$data);
    }
    // public function index() {
    //     $data['users'] = getrow('user','','array');
    //     $this->load_page('admin',$data);
    // }


    public function add_Employee() {
        $param = array(
            'lastname' => $_POST['lname'],
            'firstname' => $_POST['fname'],
            'email' => $_POST['email'],
            'username' => $_POST['username'],
            'password' => $_POST['password'],
            'user_type' => 'user'
        );
        $res = insert('user',$param);
        if($res) {
            echo '
                <script>
                    alert("1 employee is added"); 
                    window.location.replace("index");
                </script>
            ';
        }
        else{
            echo '
                <script>
                    alert("There was an error"); 
                    window.location.replace("index");
                </script>
            ';
        }

    }


    public function create_Task() {
        $users['select'] = 'lastname, firstname';
        $users['where'] = array(
            'id' => $_POST['user']
        );
        $data = getrow('user',$users,'row');
        $name = $data->lastname . ' ' . $data->firstname;
        $param = array(
            'task_title' => $_POST['task_title'],
            'due_date' => $_POST['due_date'],
            'task_instruction' => $_POST['instruction'],
            'assign_to' => $name,
            'user_id' => $_POST['user']
        );
        $res = insert('task',$param);
        if($res) {
            echo '
                <script>
                    alert("Task is successfully assigned"); 
                    window.location.replace("index");
                </script>
            ';
        }
        else{
            echo '
                <script>
                    alert("There was an error"); 
                    window.location.replace("index");
                </script>
            ';
        }
    }

    // public function get_EmpDetail() {
    //     $param['select'] = 'lastname, firstname, email, username, password';
    //     $param['where'] = array(
    //         'id' => $_GET['userid']
    //     );
    //     $data['employee'] = getrow('user',$param,'array');
    // }

    public function edit_Profile() {
        //add code
        $set = array(
            'lastname' => $_POST['lname'],
            'firstname' => $_POST['fname'],
            'email' => $_POST['email'],
            'username' => $_POST['uname'],
            'password' => $_POST['password'],
        );
        $where = array(
            'id' => $_POST['userid']
        );
        $res = update('user', $set, $where);
        if($res) {
            echo '
                <script>
                    alert("Employee is successfully Updated"); 
                    window.location.replace("index");
                </script>
            ';
        }
        else{
            echo '
                <script>
                    alert("There was an error"); 
                    window.location.replace("index");
                </script>
            ';
        }
    }


    public function delete_Employee() {
        // echo "<pre>";
        // print_r($data);
        // die;
        $where = array('id' => $_POST['userid']);
        $res = delete('user',$where);
        
    }


    public function get_Task() {
        $param['tasklist'] = getrow('task','','array');
        $param['users'] = getrow('user','','array');
        $this->load_page('task_list',$param);
    }

    public function get_Employee() {
        $param['users'] = getrow('user','','array');
        $this->load_page('employee_list',$param);
    }

}