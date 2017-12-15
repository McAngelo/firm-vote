<?php
		require_once('_header.php');
		
		//script to delete from the table.
		$del = $_GET['del'];
		$result = mysql_query("DELETE FROM electrates_tbl WHERE ele_ID='$del'",$connection);
?>
		<div class="container_12">
            
            <div style="clear:both;"></div>
            
            
            <div style="clear:both;"></div>
            
            <!-- Form elements -->    
            <div class="grid_12">
             
             <div class="bottom-spacing">
                
                    <!-- Button -->
                    <div class="float-right">
                        <a href="../re6gi7str87at2ion/reg_voter.php" class="button">
                        	<span>New Voter <img src="../images/plus-small.gif" tppabs="../images/plus-small.gif" width="12" height="9" alt="New article" /></span>
                        </a>
                    </div>
                    
                    <!-- Table records filtering -->
                    Filter: 
                    <select class="input-short">
                    	<option value="1" selected="selected">Select filter</option>
                        <option value="2">Created last week</option>
                        <option value="3">Created last month</option>
                        <option value="4">Edited last week</option>
                        <option value="5">Edited last month</option>
                    </select>
                    
                </div>
                
                
                <!-- Example table -->
                <div class="module">
                	<h2><span>All Voters Table</span></h2>
                    
                    <div class="module-table-body">
                    	<form action="">
                        <table id="myTable" class="tablesorter">
                        	<thead>
                                <tr>
                                    <th style="width:5%">#</th>
                                    <th style="width:20%">Voter Name</th>
                                    <th style="width:15%">Student ID</th>
                                    <th style="width:6%">Gender</th>
                                    <th style="width:15%">Department</th>
                                    <th style="width:6%">Level</th>
                                    <th style="width:18%">Date Registered</th>
                                    <th style="width:15%"></th>
                                </tr>
                            </thead>
                            <tbody>
                            <?php
                            
							$result = mysql_query("SELECT * FROM  electrates_tbl,  department_tbl,  level_tbl WHERE electrates_tbl.department = department_tbl.ID AND electrates_tbl.level = level_tbl.ID ORDER BY surname ASC",$connection);
       						$row_nr = mysql_num_rows($result);
							if ($row_nr >= 1)
							{
								while($myrow = mysql_fetch_array($result))
								 {
							 			$i = $i + 1;
							?>
                           
                                <tr>
                                    <td class="align-center"><?php echo $i; ?></td>
                                    <td><?php echo $myrow['title'] . " " . $myrow['surname'] . " " . $myrow['firstName'] . " " . $myrow['middleName']; ?></td>
                                    <td><?php echo $myrow['student_id']; ?></td>
                                    <td><?php echo $myrow['gender']; ?></td>
                                    <td><?php echo $myrow['dep_name']; ?></td>
                                    <td><?php echo $myrow['level']; ?></td>
                                    <td><?php echo $myrow['date']; ?></td>
                                    <td>
                                    	<input type="checkbox" />
                                        
                                        <a href="re90rt.php?id=<?php echo $myrow['ele_ID'];?>">
                                        <img src="../images/pencil.gif" tppabs="images/pencil.gif" width="16" height="16" alt="edit" /></a>
                                        <a href="re90rt.php?del=<?php echo $myrow['ele_ID'];?>">
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
                                    <td><a href="">No Voters have been Registered</a></td>
                                    <td>
                                    	
                                    </td>
                                </tr>
                                <?php
							}
							?>                         
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
                
                
                    <!-- <div class="pagination">           
                		<a href="" class="button"><span><img src="../images/arrow-stop-180-small.gif" tppabs="images/arrow-stop-180-small.gif" height="9" width="12" alt="First" /> First</span></a> 
                        <a href="" class="button"><span><img src="../images/arrow-180-small.gif" tppabs="images/arrow-180-small.gif" height="9" width="12" alt="Previous" /> Prev</span></a>
                        <div class="numbers">
                            <span>Page:</span> 
                            <a href="">1</a> 
                            <span>|</span> 
                            <a href="">2</a> 
                            <span>|</span> 
                            <span>3</span> 
                            <span>|</span> 
                            <a href="">4</a> 
                            <span>|</span> 
                            <a href="">5</a> 
                            <span>|</span> 
                            <a href="">6</a> 
                            <span>|</span> 
                            <a href="">7</a> 
                            <span>|</span> 
                            <span>...</span> 
                            <span>|</span> 
                            <a href="">99</a>
                        </div> 
                        <a href="" class="button"><span>Next <img src="../images/arrow-000-small.gif" tppabs="images/arrow-000-small.gif" height="9" width="12" alt="Next" /></span></a> 
                        <a href="" class="button last"><span>Last <img src="../images/arrow-stop-000-small.gif" tppabs="images/arrow-stop-000-small.gif" height="9" width="12" alt="Last" /></span></a>
                        <div style="clear: both;"></div> 
                     </div>-->
                
                

                
			</div> <!-- End .grid_12 -->
                
                
        		<!--<div style="clear:both;"></div>
            </div>  End .grid_12 -->
                
            <div style="clear:both;"></div>
        </div> <!-- End .container_12 -->
		
 <?php
 	require_once('_footer.php');
 ?>