<?php 
if ( ! defined('BASEPATH')) exit('No direct script access allowed');
class User extends CI_Controller {
	public function __construct(){
		parent::__construct();
		$this->load->model('user_model');
		$this->load->helper('url');
	}

	public function index(){
		$data['request'] = $this->user_model->get_request();
        
		if(($this->session->userdata('user_id')!=""))
		{
			$data['request'] = $this->user_model->get_request();
			$this->load->view('home', $data);
		}
		else
		{
			$this->load->view("register_view");
		}
	}

	public function login(){
		$rules = array(
			array('field'=>'l_email','label'=>'Email','rules'=>'required|valid_email'),
			array('field'=>'l_pass','label'=>'Password','rules'=>'required')
			);
		$this->form_validation->set_rules($rules);
		
		if($this->form_validation->run() == FALSE){
			$this->index();
		}
		else{
			$auth=$this->user_model->login($this->input->post('l_email'),$this->input->post('l_pass'));
			if($auth){
				$this->index();
			}
			else{
				// $this->index();
				echo "function login auth error";
			}
		}
	}


	public function register(){
		$this->load->view('register_view');//loads the register_view.php file in views folder
	}

	public function do_register(){
		$rules = array(
		array('field'=>'username','label'=>'Name','rules'=>'trim|required|min_length[1]|max_length[20]'),
		array('field'=>'email','label'=>'Email','rules'=>'trim|required|valid_email|is_unique[users.email]'),
		array('field'=>'password','label'=>'Password','rules'=>'trim|required|min_length[6]'),
		// array('field'=>'gender','label'=>'Gender','rules'=>'required')
		);

		$this->form_validation->set_rules($rules);
		
			if($this->form_validation->run() == FALSE){
				$this->load->view('register_view');
			}
			else{
				$this->user_model->register_user();
				$this->load->view('success');
			}
	}

	public function logout(){
		$this->session->sess_destroy();
		redirect(site_url());
	}

	public function profile(){
		$this->load->view('home');
	}

	public function get_userdata($username){
		$this->load->model('User_model');
	}

	public function do_request(){

		$rules = array(
		array('field'=>'pickup','label'=>'Pick up location','rules'=>'trim|required'),

		array('field'=>'dropoff','label'=>'Drop off location','rules'=>'trim|required'),

		array('field'=>'when','label'=>'When','rules'=>'trim|required')
		);

		$this->form_validation->set_rules($rules);
		
			if($this->form_validation->run() == FALSE){
				$this->load->view('home');
			}
			else{
				$this->user_model->request();
				$this->index();
			}
	}

	public function view_my_request(){
		$data['my_request'] = $this->user_model->get_my_request();
        
		if(($this->session->userdata('user_id')!=""))
		{
			$user_id = $this->session->userdata('user_id');
			$data['my_request'] = $this->user_model->get_my_request();
			$this->load->view('my_request', $data);
		}
		
	}

	public function view_your_request(){
		$data['your_request'] = $this->user_model->get_your_request();
		if($data!="")
		{
			$data['your_request'] = $this->user_model->get_your_request();
			$this->load->view('your_request_page', $data);
		}
	}

	public function search(){
		$this->load->view('search_date_page');
	}

	public function search_date(){

		$this->user_model->search_date_model();

		$data['your_request'] = $this->user_model->search_date_model();
		if($data!="")
		{
			$data['your_request'] = $this->user_model->search_date_model();
			$this->load->view('your_request_page', $data);
		}

	}

	public function get_request_id(){
		$this->user_model->search_request_id_model();

		$data['your_request'] = $this->user_model->search_request_id_model();
		if($data!="")
		{
			$data['your_request'] = $this->user_model->search_request_id_model();
			$this->load->view('your_request_page', $data);
		}
		// $request_id = $this->uri->segment(3, 0);
	}

}