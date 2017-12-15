<?php

class My_data_page extends Controller{
    function My_data_page(){
    
	parent::Controller();
    $this->load->library('table');
    $this->load->helper('html');
    $this->load->library('Ajax_pagination');
    	}
		
    function index(){
    
	$data['makeColums'] = $this->makeColums();
    $data['getTotalData'] = $this->getTotaData();
    $data['perPage'] = $this->perPage();
    $this->load->view('my_data_page', $data);
    	}
		
    //Pull 'name' field records from table 'contact'
    function getData(){
        
    $page = $this->input->post('page'); //Look at $config['postVar']
    if(!$page):
    $offset = 0;
    else:
    $offset = $page;
    endif;
        
    $sql = "SELECT name FROM contact LIMIT ".$offset.", ".$this->perPage();
    $q = $this->db->query($sql);
    return $q->result();
    }
    
	function getTotalData(){
    
	$sql = "SELECT * FROM people";
    $q = $this->db->query($sql);
    return $q->num_rows();
    }
    
    function perPage(){
         return 10; //define total records per page
      }
    
    //Generate table from array
    function makeColumns(){
         $peoples = $this->getData();
         foreach($peoples as $pep):
         $data[] = $pep->name;
         endforeach;
         return  $this->table->make_columns($data, 6);
    }
} 
?>  