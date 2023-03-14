<?php

class Dashboard extends MY_Controller{
   
    public function index(){

        $param = array();
        $param['limit'] = array(5,0);
        $param['where'] = array('user_type' => 'user');
        $data['users'] = getrow('user',$param,'array');
        $data['tasklist'] = getrow('task','','array');

    //    echo "<pre>";
    //    print_r($data);
    //    die;
       $this->load_page('index',$data);

    }
    public function attachment()
    {
            $this->load->view('upload_form', array('error' => ' ' ));
    }
    
    public function add_Employee() {
        $param = array(
            'id' => uniqid(),
            'lastname' => $_POST['lname'],
            'firstname' => $_POST['fname'],
            'email' => $_POST['email'],
            'username' => $_POST['username'],
            'password' => md5($_POST['password'])
        );
        $res = insert('user',$param);
    }

    public function view_attachments() {
        $data['attachment'] = getrow('property_tbl','','array');
        $this->load_page('attachment',$data);
    }


    public function upload_File() {
        $errors= array();
        $file_name = $_FILES['image']['name'];
        $file_size =$_FILES['image']['size'];
        $file_tmp =$_FILES['image']['tmp_name'];
        $file_type=$_FILES['image']['type'];
        $file_ext = explode('.',strtolower($file_name));
        $extensions= array("jpeg","jpg","png");
        foreach($file_ext as $ex) {
            if(in_array($ex,$extensions)) {
                if($file_size > 2097152) $errors[]='File size must be excately 2 MB';
                if(empty($errors)==true){
                    move_uploaded_file($file_tmp,"./uploads/".$file_name);
                    $data = array(
                        'file' => "uploads/".$file_name,
                        'file_owner' => $_POST['owner']
                    );
                    $res = insert('property_tbl', $data);
                    

                    if($res) {
                        echo "File Inserted";
                    }
                    else{
                        "Something went wrong";
                    }
                    }
                    else{
                    print_r($errors);
                    }

                break;
            }
            else{
                continue;
            }
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

    public function edit_Profile() {
        //add code
        $response['success'] = false;
        $set = array(
            'lastname' => $_POST['lname'],
            'firstname' => $_POST['fname'],
            'email' => $_POST['email'],
            'username' => $_POST['uname'],
            'password' => md5($_POST['password']),
        );
        $where = array(
            'id' => $_POST['userid']
        );
        $res = update('user', $set, $where);
        if($res) {

            $response['success'] = true;
        }
        die(json_encode($response));
    }

    public function changeemployeeStatus() {
        
        $response = array();

        $set['user_status'] = $_POST['status']?1:0;

        $where = "id = ".$_POST['id'];

        update('user', $set, $where);

        $response['message'] = $_POST['status']?"a":"d";

        die(json_encode($response));

    }

    public function deactivate_Employee() {
        $response['success'] = false;
        $set = array(
            'user_status' => 'Deactivated'
        );
        $where = array(
            'id' => $_POST['userid']
        );
        $res = update('user',$set,$where);
        if($res) {
            $response['success'] = true;
        }

        die(json_encode($response));
    }


    public function activate_Employee() {
        $response['success'] = false;
        $set = array(
            'user_status' => 'Active'
        );
        $where = array(
            'id' => $_POST['userid']
        );
        $res = update('user',$set,$where);
        if($res) {
            $response['success'] = true;
        }
        die(json_encode($response));
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
        $param['select'] = '*';
        $param['where'] = array(
            'user_type' => 'user'
        );
        $data['users'] = getrow('user',$param,'array');
        $this->load_page('employee_list',$data);
    }

}