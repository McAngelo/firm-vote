<?php

class Home extends Controller 
	{
				
		function index()
			{
					
					$this->load->model('Items');
					$this->load->model('Category');
				
					$data['list'] = $this->Category->get_list();
				
				
					if ($this->uri->segment(3) != NULL)
					{
						$gt = $this->uri->segment(3);
						$data['query'] = $this->Items->get_items($gt)->result();
					
						if ($this->Items->get_items($gt)->num_rows()==0)
						$data['error'] = "No items have been added to this poll";
					}
					else
					$data['query'] = $this->Items->get_items()->result();
					$data['user'] = $this->session->userdata('username');
					$this->load->view('home', $data);
				
			}
	}