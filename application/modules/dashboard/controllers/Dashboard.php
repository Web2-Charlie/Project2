<?php

class Dashboard extends MY_Controller{
    public function __construct()
        {
                parent::__construct();
                $this->load->helper(array('form', 'url'));
        }

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
    // public function index() {
    //     $data['users'] = getrow('user','','array');
    //     $this->load_page('admin',$data);
    // }


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


    // public function upload_File() {

    
    //     $target_dir = base_url()."assets/modules/admin/uploads/";
    //     $target_file = $target_dir . basename($_FILES["fileToUpload"]["name"]);
    //     $uploadOk = 1;
    //     $imageFileType = strtolower(pathinfo($target_file,PATHINFO_EXTENSION));

    //     // Check if image file is a actual image or fake image
    //     $check = getimagesize($_FILES["fileToUpload"]["tmp_name"]);
    //     if($check !== false) {
    //         echo "File is an image - " . $check["mime"] . ".";
    //         $uploadOk = 1;
    //     } else {
    //         echo "File is not an image.";
    //         $uploadOk = 0;
    //     }

    //     // Check if file already exists
    //     if (file_exists($target_file)) {
    //     echo "Sorry, file already exists.";
    //     $uploadOk = 0;
    //     }

    //     // Check file size
    //     if ($_FILES["fileToUpload"]["size"] > 500000) {
    //     echo "Sorry, your file is too large.";
    //     $uploadOk = 0;
    //     }

    //     // Allow certain file formats
    //     if($imageFileType != "jpg" && $imageFileType != "png" && $imageFileType != "jpeg"
    //     && $imageFileType != "gif" ) {
    //     echo "Sorry, only JPG, JPEG, PNG & GIF files are allowed.";
    //     $uploadOk = 0;
    //     }

    //     // Check if $uploadOk is set to 0 by an error
    //     if ($uploadOk == 0) {
    //     echo "Sorry, your file was not uploaded.";
    //     // if everything is ok, try to upload file
    //     } else {
    //         $data = array(
    //             'file' => move_uploaded_file($_FILES["fileToUpload"]["tmp_name"], $target_file),
    //             'file_owner' => $_POST['name']
    //         );
    //         $res = insert('property_tbl', $data);
    //         if($res) {
    //             echo "The file ". htmlspecialchars( basename( $_FILES["fileToUpload"]["name"])). " has been uploaded.";
    //         }
    //         else{
    //             echo "Sorry, there was an error uploading your file.";
    //         }
    //     }
    // }

    public function do_upload()
    {
        $config['upload_path']          = './uploads/';
        $config['allowed_types']        = 'gif|jpg|png';
        $config['max_size']             = 100;
        $config['max_width']            = 1024;
        $config['max_height']           = 768;

        $this->load->library('upload', $config);

        if ( ! $this->upload->do_upload('userfile'))
        {
                $error = array('error' => $this->upload->display_errors());

                $this->load->view('upload_form', $error);
        }
        else
        {
                $param = array(
                    'file' => $data,
                );
                $res = insert('property_tbl', $data);
                if($res) {
                    $this->load->view('upload_success', $param);
                }
                else{
                    echo "error";
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

    // public function get_EmpDetail() {
    //     $param['select'] = 'lastname, firstname, email, username, password';
    //     $param['where'] = array(
    //         'id' => $_GET['userid']
    //     );
    //     $data['employee'] = getrow('user',$param,'array');
    // }

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
            // echo '
            //     <script>
            //         alert("Employee is successfully Updated"); 
            //         window.location.replace("index");
            //     </script>
            // ';
        }
        // else{
        //     // echo '
        //     //     <script>
        //     //         alert("There was an error"); 
        //     //         window.location.replace("index");
        //     //     </script>
        //     // ';
        // }

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