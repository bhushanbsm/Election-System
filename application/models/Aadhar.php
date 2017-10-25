<?php
	/**
	* 
	*/
	class aadhar extends CI_model
	{
		
		function __construct()
		{
			parent::__construct();
			$this->load->database();
		}
//gets aadhar no. from db and if aadhar no is present in db sends True otherwise False
		public function get_aadhar($ano,$vid)
		{
			//$data= array('aadharno' => $this->input->post('aadharno') );
			/*$condition="aadharno =" . "'" . $ano . "' ";
			$condition .= "vid =" . "'" . $vid . "'";
			$this->db->select('*');
			$this->db->from('aadhar');
			$this->db->where($condition);*/
			$query=$this->db->get_where('aadhar', array('aadharno' => $ano, 'vid' => $vid));
			//if atleast one row is present means aadhar no is already present and cannot vote again
			if ($query->num_rows()>=1) {
			 	return TRUE;
			 } else {
			 	return FALSE;
			 }
			  
		}
//adding vote in db
		public function vote($vid)
		{
			$data['id'] = $this->input->post('radiobutton');	
			/*$condition = "name =" . "'" . $data['name'] ."' AND " . "vid =" . "'" . $vid ."'";
			$this->db->where($condition);*/
			$condition = array('id' => $data['id']);
			$query=$this->db->get_where('voting_count', array('id' => $data['id']));	//gets all data from db
			$sdata=$query->row_array();
			$sdata['count']=$sdata['count'] + 1;	//increament the voting counter by 1
			//update data of only selected radio buttons value
			$this->db->set('count', $sdata['count']);	
			$this->db->where($condition);
			$uflag=$this->db->update('voting_count');
			//after updating voting counter aadhar no must be inserted into db
			$iflag=$this->db->insert('aadhar', array('aadharno' => $this->input->post('aadharno'), 'vid' => $vid ));
			//if update and insert is successful return True otherwise False
			if($uflag==TRUE && $iflag==TRUE)
			{
			return TRUE;
			}
			else
			{
				return FALSE;
			}
	}
//to show radio button get candidates name from db
	public function get_candidate($id)
	{
		$condition = "vid =" ."'" . $id . "'";
		$this->db->where($condition);
		$query = $this->db->get('voting_count');
		return $query;
	}

	public function get_login()
	{
		$data['username'] = $this->input->post('username');
		$data['password'] = $this->input->post('password');
		$condition = "username =" . "'" . $data['username'] . "' AND " . "password=" . "'" . $data['password'] . "'";
		$this->db->select('*');
		$this->db->from('login_data');
		$this->db->where($condition);
		$query = $this->db->get();
		if ($query->num_rows() > 0) {
			return TRUE;
		} else {
			return FALSE;
		}
		
	}

	public function get_voting_name()
	{
		//$this->db->order_by('id', 'DESC');
		return $this->db->get('voting_name');
	}
	public function get_voting($vid)
	{
		$this->db->select('*');
		$this->db->from('voting_name');
		$this->db->where('id', $vid);
		$query = $this->db->get();
		return $query->row_array();
	}




	}
?>