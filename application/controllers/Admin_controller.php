<?php

/**
* 
*/
class Admin_controller extends CI_controller
{
	
	function __construct()
	{
		parent::__construct();
		$this->load->library('form_validation');
		$this->load->model('admin');
		$this->load->model('aadhar');
	}
	public function create_election()
	{
		$mname = $this->input->post('mname');
		$mdescription = $this->input->post('mdescription');
		
		$this->load->library('upload');

		
		$voting_table['error_flag'] = TRUE;
		$voting_table['error_msg'] = "";
		
		
		
			if ($this->upload->do_upload('eimage')) {
				$data['ename'] = $this->input->post('ename');
				$data['edescription'] = $this->input->post('edescription');
				$data['eimage'] = $_FILES['eimage']['name'];
				$query = $this->admin->create_election($data);
				$mcount=0;
			if ($query) {
				foreach ( $mname as $key => $value) {
					$mimage="mimage_".$key;
					$data['mname'] = $value;
					$data['mdescription'] = $mdescription[$key];
					$data['mimage'] = $_FILES[$mimage]['name'];
					if ($this->upload->do_upload($mimage)) {
						$this->admin->create_member($data);
						$voting_table['error_msg'] = "Election created successfully";
						$mcount++;
					} else {
						$voting_table['error_msg'] = "First ".$mcount." Members created successfully And other member creation failed."."<br>".$this->upload->display_errors();
						echo $this->upload->display_errors();
						break;
					}
					
				}
			
			} else {
				$voting_table['error_msg'] = "Can not create Election this time please try again.";
			}
			
				
			} else {
				$voting_table['error_msg'] = "Can not create Election this time please try again."."<br>".$this->upload->display_errors();
			}
			
			$voting_table['voting_name'] = $this->aadhar->get_voting_name();
			$this->load->view('admin_view', $voting_table);
		
	}

	public function election_view($vid)
	{
		$this->load->view('election_view');

	}
}