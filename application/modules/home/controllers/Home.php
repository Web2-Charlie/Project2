<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Home extends MY_Controller {
	
	public function index(){
	// 	$parameters['select'] = 'fullname,username';
	// 	$parameters['search_like'] = 'da';
	// 	$parameters['column_order'] = array('fullname','username');
	// 	$data = getrow('tbl_users',$parameters,'array',true);
	// 	json($data,false);
	$param['select'] = '*';
	$param['where'] = array(
		'id' => $_SESSION['userid']
	);
	$paramTask['select'] = '*';
	$paramTask['where'] = array(
		'user_id' => $_SESSION['userid']
	);
	$data['users'] = getrow('user',$param,'array');
	$data['tasks'] = getrow('task',$paramTask,'array');
	$this->load_page('index',$data);
	}

	public function my_TaskList() {
		$param['select'] = '*';
		$param['where'] = array(
			'user_id' => $_SESSION['userid'],
		);
		$data['tasks'] = getrow('task',$param,'array');
		$this->load_page('index',$data);
	}

	public function inProgress() {
		$set = array( 
			'task_status' => 'In Progress',
		);
		$where = array(
			'task_id' => $_GET['taskid'],
		);
		$res = update('task',$set,$where);
		if($res) {
			echo '
				<script>
					window.location.replace("index");
				</script>
			';
		}
		
	}

	public function completed() {
		$set = array( 
			'task_status' => 'Completed',
		);
		$where = array(
			'task_id' => $_GET['taskid'],
		);
		$res = update('task',$set,$where);
		if($res) {
			echo '
				<script>
					window.location.replace("index");
				</script>
			';
		}
		
	}

	public function for_QA() {
		$set = array( 
			'task_status' => 'for QA',
		);
		$where = array(
			'task_id' => $_GET['taskid'],
		);
		$res = update('task',$set,$where);
		if($res) {
			echo '
				<script>
					window.location.replace("index");
				</script>
			';
		}
	}

	public function break() {
		$set = array( 
			'task_status' => 'Break',
		);
		$where = array(
			'task_id' => $_GET['taskid'],
		);
		$res = update('task',$set,$where);
		if($res) {
			echo '
				<script>
					window.location.replace("index");
				</script>
			';
		}
		
	}

	// public function getmytasklist() {
	// 	$param['select'] = '*';
	// 	$param['where'] = array(
	// 		'user_id' => $_SESSION['userid']
	// 	);
	// 	$data['tasks'] = getrow('task',$param,'array');
	// 	$this->load_page('mytaskslist',$data);
	// }
}
?>
