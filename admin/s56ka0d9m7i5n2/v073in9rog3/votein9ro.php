<?php
		require_once('_header.php');
?>
		<div class="container_12">
            
            <div style="clear:both;"></div>
            
            
            <div style="clear:both;"></div>
            
            <!-- Form elements -->    
            <div class="grid_12">
            
                <div class="module">
                     <h2><span>Voter Registration</span></h2>
                        
                     <div class="module-body">
  		
            <p><table border="1"><?php
            //$result = mysql_query("SELECT * FROM candidates_tbl,  position_tbl WHERE candidates_tbl.student_id = electrates_tbl.ele_ID AND candidates_tbl.position_id = position_tbl.ID ORDER BY page_number ASC",$connection);
			$result = mysql_query("SELECT * FROM candidates_tbl, electrates_tbl, position_tbl 
								   WHERE position_tbl.name = 'President'
								   AND position_tbl.ID = candidates_tbl.position_id
								   AND candidates_tbl.student_id = electrates_tbl.ele_ID 
								   ORDER BY page_number ASC",$connection);
			
       						$row_nr = mysql_num_rows($result);
							
							if ($row_nr >= 1)
							{
								while($myrow = mysql_fetch_array($result))
								 {
							 			$i = $i + 1;
							//student_id position_id image_link
										?>
                           		
                                <tr>
                                    <td  class="align-center" width="30%"><img src="../re6gi7str87at2ion/<?php echo $myrow['image_link']; ?>" width="90" height="90" />
                                    <br /><?php echo $myrow['title'] . " " . $myrow['surname'] . " " . $myrow['firstName'] . " " . $myrow['middleName']; ?></td>
                                    <!--<td class="align-center"><br /><br /><?php echo $myrow['polls']; ?></td>-->
                                    <td width="70%">
                                    <?php
									
									$countvotes = mysql_query("select polls from candidates_tbl WHERE position_id='1'");
									while ($row = mysql_fetch_assoc($countvotes)) 
									{
										$p_totalvotes += $row["polls"];
									}
									
									$get_positions = mysql_query("SELECT * FROM candidates_tbl
														  		  WHERE position_id = '1'",$connection);
									while($r=mysql_fetch_array($get_positions))
									{
										//$p_totalvotes += $r["polls"];
										
										$votes = extract($r);
										$per = $votes * 100 / $p_totalvotes;
										$per = floor($per);
										
										?> <strong><? echo("$votes"); ?></strong><br />
										<div style="background-color: #b6b7bc; width:100%">
										<div style="color:#000; font-size: 14px; text-align: right; height:20px; background-color: #09F; width: <?php echo ($per); ?>%;"><?php echo "<b>".  ("$per%") . "</b>"; ?>
										</div>
										</div>
                                        <?php }
										
										?>
									
                               <?php
								}
							echo("<br />Total votes: <strong>$p_totalvotes</strong></div>"); 
							}
							?></td></tr><br /></table>
            <div style="border: 1px #4e667d solid; left: 180px;	right: 200px; width:600; height:500;">
			<?php
            		
	$poll = mysql_fetch_array(mysql_query("select * from position_tbl WHERE name='President'"));
	$position = $poll['name'];
	
	$countvotes = mysql_query("select polls from candidates_tbl WHERE position_id='1'");
	while ($row = mysql_fetch_assoc($countvotes)) 
	{
    	$p_totalvotes += $row["polls"];
	}
			
	echo("<div class=poll><b>$position<br /></b><br />");
	
	$get_positions = mysql_query("select * from candidates_tbl WHERE name='President'");
	
	while($r=mysql_fetch_array($get_positions)){
	
	
		extract($r);
		$per = $votes * 100 / $p_totalvotes;
		$per = floor($per);
		
		echo htmlspecialchars($surname ." ". $firstName); 
		?> <strong><? echo("$votes"); ?></strong><br />
		<div style="background-color: #b6b7bc;">
        	<div style="color:#000; font-size: 14px; text-align: right;background-color: #09F; width: <? echo($per); ?>%;"><? echo "<b>". ("$per%") . "</b>"; ?>
            </div>
            </div><br />
		<?
			
	}
	
	echo("<br />Total votes: <strong>$p_totalvotes</strong></div>"); 
	
?>
    
        </p></div><br />
                     </div> <!-- End .module-body -->

                </div>  <!-- End .module -->
        		<div style="clear:both;"></div>
            </div> <!-- End .grid_12 -->
                
            <div style="clear:both;"></div>
        </div> <!-- End .container_12 -->
		
 <?php
 	require_once('_footer.php');
 ?>