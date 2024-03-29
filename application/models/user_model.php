<?php 
if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class User_model extends CI_Model {
	public function __construct(){
		parent::__construct();
	}

	public function register_user(){
		$data=array(
		'username'=>$this->input->post('username'),
		'email'=>$this->input->post('email'),
		'password'=>md5($this->input->post('password'))
		);
		$this->db->insert('users',$data);
		return true;
	}

	function login($email,$password){
		$this->db->where("email",$email);
		$this->db->where("password",md5($password));
		$query=$this->db->get("users");
		echo "<br>user id isssss ".$this->session->userdata('user_id');
		if($query->num_rows()>0){
			$row=$query->row();
			$userdata = array(
			'user_id'  => $row->id,
			'username'  => $row->username,
			'email'    => $row->email,
			);
			$this->session->set_userdata($userdata);
			return true;
			
			$user_id = $this->session->userdata('user_id');
			$this->load->model('request', $user_id);
			echo "<br>user id isssss ".$this->session->userdata('user_id');
		}
		return false;
	}

	public function request(){

		$data=array(
			'pickup'=>$this->input->post('pickup'),
			'dropoff'=>$this->input->post('dropoff'),
			'when'=>$this->input->post('when'),
			'user_id'=>$this->session->userdata('user_id')
		);
		$this->db->insert('request',$data);

		return true;
	}


	public function get_request($user_id = FALSE)
	{
	        if ($user_id === FALSE)
	        {
	                $query = $this->db->get('request');
	                return $query->result_array();
	        }

	        $query = $this->db->get_where('request', array('user_id' => $user_id));
	        return $query->row_array();
	}

	public function get_my_request($user_id = FALSE)
	{
	        if ($user_id === FALSE)
	        {
	                $query = $this->db->get('request');
	                $this->db->where('user_id', $this->session->userdata('user_id'));
	                return $query->result_array();
	        }
	        return $query->row_array();
	}

	// public function get_your_request($user_id = FALSE)
	// {
	//         if ($user_id === FALSE)
	//         {
	//         	$data = '10';
 //                $query = $this->db->get('request');
 //                $this->db->where('user_id', $data);
 //                return $query->result_array();
	//         }
	//         return $query->row_array();
	// }

	public function search_request_id_model(){

		// $data = $this->input->post('searchDate');

		// // var_dump($data);
		// $query = $this->db->get('request');
  //       $this->db->where('when', $data);
  //       return $query->result_array();

		$data = $this->input->get('request_id');
		// echo $data;

		// var_dump($data);
		$query = $this->db->get('request');
        $this->db->where('request_id', $data);
        return $query->result_array();

	}

	

}