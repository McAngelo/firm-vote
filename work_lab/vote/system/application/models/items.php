<?php
class Items extends Model {

    function Items()
    {
        // Call the Model constructor
        parent::Model();
    }
    
    function get_items($no = 1)
    {
        $query = $this->db->get_where('item', array('category'=>$no));
        return $query;
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