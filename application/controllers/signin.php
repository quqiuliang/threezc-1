<?php
class Signin extends CI_Controller {

	public function index() {
		if ($this -> session -> userdata('logged_in') ) {
			redirect( '/signin/show' );
		}
		
		$this->load->view('import');
		$this->load->view('header');
		$this -> load -> view('signin'); 
		$this->load->view('footer');
	}

	function login() {
		$this -> load -> model('user');
		//$arr = array('username' => $_POST['u_name'], 'password' => $_POST['u_pw']);
		//获取提交的表单内容，=>左边是数据表里面的键名，=>右边是通过name获取的表单值
		if($_POST['u_name'] == NULL) {
			redirect('/signin');
		}
		
		$logind = $this -> user -> u_select($_POST['u_name'] , $_POST['u_pw']);
		if ($logind == NULL) {
			echo ('login failed');
		} else {
			$newdata = array(
					'username'  => $_POST['u_name'],
					'nickname'  => $logind[0] -> nickname,
					'logged_in' => TRUE
			);
			
			$this->session->set_userdata($newdata);
			echo ('login success');
		}
		
	}
	
	function logout() {
		$this->session->sess_destroy();
		echo ('logout success');
	
	}
	
	function show() {
// 		echo $this -> session ->userdata('session_id');
		$data['list'] = $this -> session -> all_userdata();
		$this->load->view('import');
		$this->load->view('header');
		$this->load->view('default/content', $data);
		$this->load->view('footer');
	}
}