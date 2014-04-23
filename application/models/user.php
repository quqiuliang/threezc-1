<?php
class User extends CI_Model
{

	function __construct()
	{
		parent::__construct();
		$this -> load -> database();
	}

	function u_insert($arr) {
		$this -> db -> insert('three_user', $arr);
	}

	function u_update($id, $arr) {
		$this -> db -> where('uid', $id);
		$this -> db -> update('three_user', $arr);
	}

	function u_del($id) {
		$this -> db -> where('uid', $id);
		$this -> db -> delete('three_user');
	}

	function u_select($name , $pwd) {
		$this -> db -> where('username', $name);
		$this -> db -> where('password', $pwd);
		$this -> db -> where('status', '1');
		$this -> db -> select('*');
		$query = $this -> db -> get('three_user');
		return $query -> result();
	}
}
