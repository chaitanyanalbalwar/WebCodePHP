<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Welcome extends CI_Controller {

	/**
	 * Index Page for this controller.
	 *
	 * Maps to the following URL
	 * 		http://example.com/index.php/welcome
	 *	- or -
	 * 		http://example.com/index.php/welcome/index
	 *	- or -
	 * Since this controller is set as the default controller in
	 * config/routes.php, it's displayed at http://example.com/
	 *
	 * So any other public methods not prefixed with an underscore will
	 * map to /index.php/welcome/<method_name>
	 * @see https://codeigniter.com/user_guide/general/urls.html
	 */
	public function index()
	{
	    error_reporting(0);
	    	    $this->load->model('Home_model');
	    	    $id='';
		$data['restaurant'] = $this->home_model->fetch_restaurants_categorywise($id);

	    $data['pincode_array']=$this->home_model->check_pincode();

		$this->load->view('index',$data);
	}
	
	public function cancellation_and_refund()
	{
		$this->load->view('cancellation_and_refund');
	}
}
