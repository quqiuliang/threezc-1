<?php
class Blog extends CI_Controller {

	function __construct()
	{
		parent::__construct();
	}

	public function index()
	{
		$data['list'] = array(
				'My Title',
				'My Heading',
				'My Message'
				);
		$this->load->view('import');
		$this->load->view('header');
		$this->load->view('default/content', $data);
		$this->load->view('footer');
	}
}
?>