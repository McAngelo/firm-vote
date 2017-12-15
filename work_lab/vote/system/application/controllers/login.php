<?php
include('home.php');
class Login extends Controller {
	
	function login_user()
	{
		
		$username = $this->input->post('usr');
		$password = $this->input->post('pass');
		$query = $this->db->get_where('users', array('userid'=>$username, 'password'=>$password));
		if ($query->num_rows() > 0)
		{
		$userid = $query->row()->userid;
		$this->session->set_userdata('username', $userid);
		Home::index();
		}
		else 
		{
			$data['error1'] = "The username and/or password you entered in invalide";
			$this->load->view('login', $data);
		}
	}

	function index()
	{
		
		$this->load->library('form_validation');
		
		//Check if login form has been submitted
		if (isset($_POST['usr']))
			{
				//Setting validation rules
				$this->form_validation->set_rules('usr', 'Username', 'required|apha-dash|xss_clean');
				$this->form_validation->set_message('required', 'You must enter a username');
				$this->form_validation->set_rules('pass', 'Password', 'required|apha-dash|xss_clean');
				$this->form_validation->set_message('required', 'You must enter a Password');
		
				if ($this->form_validation->run() == false)
				$this->load->view('login');
				else
					{
						Login::login_user();
					}
			}
			else
			$this->load->view('login');
	}
	
	function logout()
	{
		$this->session->sess_destroy();
		$this->load->view('login');
		echo $this->session->userdata('username');
		}
}
?>