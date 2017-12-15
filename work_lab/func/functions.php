<?php
	// This function prints all the position from the system
	function positions()
	{
		$result = mysql_query("SELECT * FROM position_tbl ORDER BY page_number ASC");
       	$row_nr = mysql_num_rows($result);
							
		if ($row_nr >= 1)
		{
			while($myrow = mysql_fetch_array($result))
			{
				$i = $i + 1;
				$post = $myrow['ID'];
				$name = $myrow['name'];
				$id	  = $myrow['post_name'];

              	echo '<ul>';
                    	candidates($post, $name, $id);
				echo '</ul>';

			}
							
		}
		elseif($row_nr == 0)
		{
				echo '<ul>
						<li>
                            <a href="#">
                            <img src="images/p.jpg" alt="img02" />
                            <h4>Please you do not have any candidates in the system</h4></a>
                        </li>
					</ul>';

		}

	}
	
	// This function prints all the candidates for each position from the system
	function candidates($post, $name, $id)
	{
		$can_result = mysql_query("SELECT * FROM candidates_tbl, electrates_tbl
							   	   WHERE candidates_tbl.position_id ={$post} 
								   AND candidates_tbl.student_id = electrates_tbl.ele_ID
								   ORDER BY place ASC");
       	$row_can = mysql_num_rows($can_result);
							
		if ($row_can >= 1)
		{
			$non = $id . 0;
			$non_name = "No " . $name ;
			$key_non = 0;
			echo '<li>
				  		<input type="radio" name="'. $id .'" id="'. $non .'" value="'. 0 .'" checked="checked"/>';
            echo        "<a href=\"#\" onClick=\"document.getElementById('{$non}').checked= true;\">";
            echo '     <img src="images/p.jpg" alt="img02" />
                        <h4>' . $name . '</h4></a>
                   </li>';
			while($mycan = mysql_fetch_array($can_result))
			{
				$i = $i + 1;
				$can = $id.$i;
				$can_name = $mycan['title'] . " " . $mycan['surname'] . " " . $mycan['firstName'] . " " . $mycan['middleName'];
				$key_id = $mycan['ele_ID'];
              	echo '<li>
                        	<input type="radio" name="'. $id .'" id="'. $can .'" value="'. $key_id .'"/>';
                echo        "<a href=\"#\" onClick=\"document.getElementById('{$can}').checked= true;\">";
                echo '      <img src="../../a/s56ka0d9m7i5n2/re6gi7str87at2ion/'. $mycan['image_link'] .'" />
                            <h4>' . $can_name .'</h4></a>
                     </li>';

			}
							
		}
		elseif($row_can == 0)
		{
				echo '<li>
                            <a href="#">
                            <img src="images/p.jpg" alt="img02" />
                            <h4>There are no candidates for this position</h4></a>
                      </li>';
		}
	}
	
	// This function prints the navigation links to the user
	function navigation()
	{
    	echo '<nav>';
		$result_nav = mysql_query("SELECT name FROM position_tbl ORDER BY page_number ASC");
		$row_nav = mysql_num_rows($result_nav);
												   
			if ($row_nav >= 1)
			{
				while($mynav = mysql_fetch_array($result_nav))
				{
					echo   '<a href="#"  title="'. $mynav['name'] .'"><img src="images/vote-icon.gif" /></a>';
				}
			}
			elseif($row_nav == 0)
			{
				echo '<h4>Please you do not have any candidates in the system</h4>';
			}
            echo '</nav>';
	}

?>