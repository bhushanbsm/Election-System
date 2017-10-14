<?php
/**
* 
*/
class Admin extends CI_model
{
	
	function __construct()
	{
		parent::__construct();
		$this->load->database();
	}

	public function create_election($data)
	{
		$idata = array('voting_name' => $data['ename'], 'description' => $data['edescription'], 'img_path' => $data['eimage'] );
		if($this->db->insert('voting_name', $idata))
		{
			return TRUE;
		}
		else
		{
			return FALSE;
		}
	}

	public function create_member($data)
	{
		$this->db->select('id');
		$this->db->from('voting_name');
		$this->db->where('voting_name', $data['ename']);
		$vid = $this->db->get();
		$vdata = $vid->row_array();
		$idata = array('vid' => $vdata['id'], 'name' => $data['mname'], 'count' => 0, 'description' => $data['mdescription'], 'img_path' => $data['mimage'] );
		$this->db->insert('voting_count', $idata);
	}
}