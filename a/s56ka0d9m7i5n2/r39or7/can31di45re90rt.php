<?php
		require_once('_header.php');
?>
		<div class="container_12">
            
            <div style="clear:both;"></div>
            
            
            <div style="clear:both;"></div>
            
            <!-- Form elements -->    
            <div class="grid_12">
                             
                <!-- Example table -->
                <div class="module">
                	<h2><span>Candidates Report</span></h2>
                    
                    <div class="module-table-body">
                    	<form action="">
                        <table id="myTable" class="tablesorter">
                        	<thead>
                                <tr>
                                    <th style="width:5%">#</th>
                                    <th style="width:20%">Candidate Name</th>
                                    <th style="width:13%">Picture</th>
                                    <th style="width:13%">Student ID</th>
                                    <th style="width:15%">Position</th>
                                    <th style="width:10%">Place on Ballot</th>
                                    <th style="width:10%">Number of Votes</th>
                                    <th style="width:15%"></th>
                                </tr>
                            </thead>
                            <tbody>
                             <?php
                            
							$result = mysql_query("SELECT * FROM candidates_tbl, electrates_tbl, position_tbl WHERE candidates_tbl.student_id = electrates_tbl.ele_ID AND candidates_tbl.position_id = position_tbl.ID ORDER BY page_number ASC",$connection);
       						$row_nr = mysql_num_rows($result);
							if ($row_nr >= 1)
							{
								while($myrow = mysql_fetch_array($result))
								 {
							 			$i = $i + 1;
							//student_id position_id image_link
										?>
                           
                                <tr>
                                    <td class="align-center"><br /><br /><?php echo $i; ?></td>
                                    <td><br /><br /><?php echo $myrow['title'] . " " . $myrow['surname'] . " " . $myrow['firstName'] . " " . $myrow['middleName']; ?></td>
                                    <td  class="align-center"><img src="../re6gi7str87at2ion/<?php echo $myrow['image_link']; ?>" width="90" height="90" /></td>
                                    <td class="align-center"><br /><br /><?php echo $myrow['student_id']; ?></td>
                                    <td class="align-center"><br /><br /><?php echo $myrow['name']; ?></td>
                                    <td class="align-center"><br /><br /><?php echo $myrow['place']; ?></td>
                                    <td class="align-center"><br /><br /><?php echo $myrow['polls']; ?></td>
                                    <td class="align-center"><br /><br />
                                    	<input type="checkbox" />
                                        
                                        <a href="can31di45re90rt.php?id=<?php echo $myrow['can_ID'];?>">
                                        <img src="../images/pencil.gif" tppabs="images/pencil.gif" width="16" height="16" alt="edit" /></a>
                                        <a href="can31di45re90rt.php?del=<?php echo $myrow['can_ID'];?>">
                                        <img src="../images/bin.gif" tppabs="images/bin.gif" width="16" height="16" alt="delete" /></a>
                                    </td>
                                </tr>
                               <?php
								}
							
							}
								 elseif($row_nr == 0)
							{
								?>
                                <tr>
                                    <td class="align-center">0</td>
                                    <td><a href="">No Candidates have been Registered</a></td>
                                    <!--<td>
                                    	
                                    </td>-->
                                </tr>
                                <?php
							}
							?>  
                                <!--<tr>
                                    <td class="align-center"><br /><br /><br />1</td>
                                    <td><a href=""><br /><br /><br />Mr. Michael Johnson</a></td>
                                    <td><img src="../images/tick-circle.gif" tppabs="images/minus-circle.gif" width="144" height="150" alt="published" /></td>
                                    <td><br /><br /><br />208CS01002981</td>
                                    <td><br /><br /><br />President</td>
                                    <td><br /><br /><br />Computer science<br />
										Level 300</td>
                                    
                                    <td align="center">
                                    	<br /><br /><br /><input type="checkbox" />
                                    </td>
                                </tr>-->
                                
                            </tbody>
                        </table>
                        </form>
                        <div class="pager" id="pager">
                            <form action="">
                                <div>
                                <img class="first" src="../images/arrow-stop-180.gif" tppabs="../images/arrow-stop-180.gif" alt="first"/>
                                <img class="prev" src="../images/arrow-180.gif" tppabs="../images/arrow-180.gif" alt="prev"/> 
                                <input type="text" class="pagedisplay input-short align-center"/>
                                <img class="next" src="../images/arrow.gif" tppabs="../images/arrow.gif" alt="next"/>
                                <img class="last" src="../images/arrow-stop.gif" tppabs="../images/arrow-stop.gif" alt="last"/> 
                                <select class="pagesize input-short align-center">
                                    <option value="10" selected="selected">10</option>
                                    <option value="20">20</option>
                                    <option value="30">30</option>
                                    <option value="40">40</option>
                                </select>
                                </div>
                            </form>
                        </div>
                        <div class="table-apply">
                            <form action="">
                            <div>
                            <span>Apply action to selected:</span> 
                            <select class="input-medium">
                                <option value="1" selected="selected">Select action</option>
                                <option value="2">Delete</option>
                            </select>
                            </div>
                            </form>
                        </div>
                        <div style="clear: both"></div>
                     </div> <!-- End .module-table-body -->
                </div> <!-- End .module -->
                                
			</div> <!-- End .grid_12 -->
                
                
        		<!--<div style="clear:both;"></div>
            </div>  End .grid_12 -->
                
            <div style="clear:both;"></div>
        </div> <!-- End .container_12 -->
		
 <?php
 	require_once('_footer.php');
 ?>