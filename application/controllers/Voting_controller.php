<?php
	/**
	* 
	*/
	class Voting_controller extends CI_controller
	{
		
		function __construct()
		{
			parent::__construct();
			$this->load->library('form_validation');
			$this->load->model('aadhar');
			
		}

		public function index()
		{
			$voting_table['voting_name']=$this->aadhar->get_voting_name();
			$voting_table['error_msg'] = FALSE;
			$this->load->view('home', $voting_table);
		}
//do voting process here
		public function voting($vid)
		{
			//form validation aadhar no. if aadhar is already present in db then false result and stop
			$this->form_validation->set_rules('aadharno', 'Aadhar', 'trim|required|min_length[12]|max_length[12]');
			if ($this->form_validation->run() == FALSE) {
				$data['result']="";
			} else 
			{	
				$ano = $this->input->post('aadharno');
				if ($this->aadhar->get_aadhar($ano,$vid) == TRUE) 
				{
					$data['result'] = 'This Aadhar no. already voted.';
				} 
				else 
				{
				//if result is true add vote and aadhar no to db
					$vote_result=$this->aadhar->vote($vid);
				//if voting process is successful show success msg otherwise show error and reload page
					if ($vote_result==FALSE) {
						$data['result']="Voting Failed please try again later";
					} else {
						$data['result']="Your voting is done";
					}
				}
					
			}
			$data['id']=$vid;
			$data['candidate'] = $this->aadhar->get_candidate($vid);
			$this->load->view('voting_header',$data);
		}
//check for aadhar no in db if aadhar no is present send True otherwise False
		public function check_aadhar($str)
		{
			if ($this->aadhar->get_aadhar($str) == TRUE) {
				$this->form_validation->set_message('check_aadhar','This Aadhar no. already voted.');
				return FALSE;
			} else {
				return TRUE;
			}
		}

		function login()
		{
			$this->form_validation->set_rules('username', 'Username', 'required|min_length[5]|max_length[12]');
			$this->form_validation->set_rules('password', 'Password', 'required|min_length[5]|max_length[12]|callback_check_login');
			$voting_table['voting_name'] = $this->aadhar->get_voting_name();
			if ($this->form_validation->run() == False) {
				$voting_table['error_msg'] = TRUE;
				$this->load->view('home', $voting_table);
			} else {
				$voting_table['error_msg'] = NULL;
				$voting_table['error_flag'] = FALSE;
				$this->load->view('admin_view', $voting_table);
			}
		}

		public function check_login($str)
		{
			if ($this->aadhar->get_login() == TRUE) {
				return TRUE;
			} else {
				$this->form_validation->set_message('check_login','Incorrect Username or Password.');
				return FALSE;
			}
			
		}

		public function voting_home($id)
		{
			//get names of candidate from database to show in list
			$data['candidate'] = $this->aadhar->get_candidate($id);
			//reset result to NULL it is not needed first time
			$data['result'] = "";
			$data['id'] = $id;
			$this->load->view('voting_header',$data);

		}

		public function result($id,$vname)
		{
			$data['candidate'] = $this->aadhar->get_candidate($id);
			$data['id'] = $id;
			$data['voting_name'] = urldecode($vname);
			$this->load->view('result_view',$data);
		}
		
	}