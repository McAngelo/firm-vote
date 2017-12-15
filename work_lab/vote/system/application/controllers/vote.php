<?php
include('home.php');

class Vote extends Controller 
{
	
	function index ()
	{
		$cate = $this->input->post('cate');
		$data['cate'] = $this->input->post('cate');
		
		//Check if the user registered in the session has already voted for the category being submitted
		$session_user = $this->session->userdata("username");
		
		if ($session_user != NULL)
		{
			//Check if username exists
			$query = $this->db->get_where('users', array('userid'=>$session_user));
			if ($query->num_rows()>0)
			{
				//If session user is valid, check if user has voted for the category being submitted
				if (Vote::checkVote())
				{
					$id = $this->input->post('id');
					$query = $this->db->get_where('item', array('item_id'=>$id));
					$row = $query->row();
					$sum = $row->votes + 1;
			
					$data = array('votes' => $sum);
					$this->db->where('item_id', $id);
					$this->db->update('item', $data);
			
					$usr = $this->input->post('usr');
					$voted = array('uid'=>$usr,
							'category'=>$cate);
							
					$this->db->insert('voted', $voted);
					Home::index($data);
				}
				else
				{
					$data["error"] = "You can only vote once!";
					Home::index($data);
				}
			}
			}
		//If session_username is null, let the user login again
		else
		$this->load->view('login');		
	}
		
	function checkVote()
	{
		$user = $this->input->post('usr');
		$cate = $this->input->post('cate');
		$query = $this->db->get_where('voted', array('uid'=>$user, 'category'=>$cate));
		if($query->num_rows()>0)
		return false;
		else return true;
	}
}
	
	?>