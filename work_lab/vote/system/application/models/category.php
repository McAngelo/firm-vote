<?php
class Category extends Model {

    function Category()
    {
        // Call the Model constructor
        parent::Model();
    }
    
    function get_list()
    {
		$this->db->select('id, name');
		$this->db->order_by('id', 'ASC');
        $query = $this->db->get('category');
        return $query->result();
    }

	
	function insert_hotels()
    {
        $this->title   = $_POST['title']; // please read the below note
        $this->content = $_POST['content'];
        $this->date    = time();

        $this->db->insert('hotels', $this);
    }

    function update_items()
    {
		$this->votes	+= 1;

        $this->db->update('item', $this, array('votes' => $_POST['votes']));
    }

}
?>