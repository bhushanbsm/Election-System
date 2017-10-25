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
		$this->load->library('upload');
	}
	public function create_election()
	{
		$mname = $this->input->post('mname');
		$mdescription = $this->input->post('mdescription');
		
		$voting_table['error_flag'] = TRUE;
		$voting_table['error_msg'] = "";
			if ($this->upload->do_upload('eimage')) {
				$data['ename'] = $this->input->post('ename');
				$data['edescription'] = $this->input->post('edescription');
				$data['eimage'] = $this->upload->data('file_name');
				$query = $this->admin->create_election($data);
				$mcount = 0;
			if ($query) {
				foreach ( $mname as $key => $value) {
					$mimage="mimage_".$key;
					$data['mname'] = $value;
					$data['mdescription'] = $mdescription[$key];
					if ($this->upload->do_upload($mimage)) {
						$data['mimage'] = $this->upload->data('file_name');
						$this->admin->create_member($data);
						$voting_table['error_msg'] = "Election created successfully";
						$mcount++;
					} else {
						$voting_table['error_msg'] = "First ".$mcount." Members created successfully And other member creation failed."."<br>".$this->upload->display_errors();
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
		$data['voting_table'] = $this->aadhar->get_voting($vid);
		$data['candidate'] = $this->aadhar->get_candidate($vid);
		$data['error_msg'] = "";
		$data['error_flag'] = 0;
		$this->load->view('election_view', $data);

	}
// Function to update data of member
	public function update_member($vid, $id)
	{
		$data['error_msg'] = "";
		$this->form_validation->set_rules('name', 'Member Name', 'required|max_length[32]');
		$this->form_validation->set_rules('description', 'Description', 'required|min_length[15]|max_length[2000]');
		if ($this->form_validation->run() == TRUE) 
		{
			$update['name'] = $this->input->post('name');
			$update['description'] = $this->input->post('description');
			if (!empty($_FILES['image']['name'])) 
			{ 
	//if image to update is selected then do update image first
				if($this->upload->do_upload('image'))
				{
					$update['img_path'] = $this->upload->data('file_name');
				}
				else
				{
					$data['error_msg'] .= "Image not uploaded.<br>"; 
					$data['error_msg'] .= $this->upload->display_errors();
				}
			}
			
			if($this->admin->update_member($update, $id))
			{
				$data['error_msg'] .= "Data Updated Successfully";
			}
			else
			{
				$data['error_msg'] .= "Data Update Failed please try after sometime.";
			}
		} // Validation  close
		$data['voting_table'] = $this->aadhar->get_voting($vid);
		$data['candidate'] = $this->aadhar->get_candidate($vid);
		$data['error_flag'] = 1;
		$this->load->view('election_view', $data);
	} // function update_member close

//Function to update data of Election
	public function update_election($vid)
	{
		$data['error_msg'] = "";
		$this->form_validation->set_rules('electname', 'Election Name', 'required|max_length[32]');
		$this->form_validation->set_rules('electdescription', 'Description', 'required|min_length[15]|max_length[2000]');
		if ($this->form_validation->run() == TRUE) 
		{
			$update['voting_name'] = $this->input->post('electname');
			$update['description'] = $this->input->post('electdescription');
			if(!empty($_FILES['electimage']['name']))
			{
				if($this->upload->do_upload('electimage'))
				{
					$update['img_path'] = $this->upload->data('file_name');
				}
				else
				{
					$data['error_msg'] .= "Image not uploaded.<br>"; 
					$data['error_msg'] .= $this->upload->display_errors();
				}
			}
			
			if($this->admin->update_election($update,$vid))
			{
				$data['error_msg'] .= "Data Updated Successfully";
			}
			else
			{
				$data['error_msg'] .= "Data Update Failed please try after sometime.";
			}
		} // Form validation  close
		$data['voting_table'] = $this->aadhar->get_voting($vid);
		$data['candidate'] = $this->aadhar->get_candidate($vid);
		$data['error_flag'] = 1;
		$this->load->view('election_view', $data);
	} //Function close
//Create new members for selected election 
	public function create_member($vid)
	{
		$mname = $this->input->post('mname');
		$mdescription = $this->input->post('mdescription');
		$data['error_msg'] = "";
		$mcount = 0;
		if(!empty($mname))
		{
				foreach ( $mname as $key => $value) 
				{
					$mimage="mimage_".$key;
					$upload['name'] = $value;
					$upload['description'] = $mdescription[$key];
					if ($this->upload->do_upload($mimage)) {
						$upload['img_path'] = $this->upload->data('file_name');
						$this->admin->create_member_upload($upload,$vid);
						$data['error_msg'] = "Members created successfully";
						$mcount++;
					} else {
						$data['error_msg'] .= "First ".$mcount." Members created successfully And other member creation failed."."<br>".$this->upload->display_errors();
						break;
					}
				}
		}
		$data['voting_table'] = $this->aadhar->get_voting($vid);
		$data['candidate'] = $this->aadhar->get_candidate($vid);
		$data['error_flag'] = 1;
		$this->load->view('election_view', $data);
	}
}