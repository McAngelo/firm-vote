<?php
		require_once('_header.php');
		
		//script to delete from the table.
		$del = $_GET['del'];
		$result = mysql_query("DELETE FROM system_admin_tbl WHERE ele_ID='$del'",$connection);
?>
		<div class="container_12">
            
            <div style="clear:both;"></div>
            
            
            <div style="clear:both;"></div>
            
            <!-- Form elements -->    
            <div class="grid_12">
                             
                <!-- Example table -->
                <div class="module">
                	<h2><span>Electoral Commission Report</span></h2>
                    
                    <div class="module-table-body">
                    	<form action="">
                        <table id="myTable" class="tablesorter">
                        	<thead>
                                <tr>
                                    <th style="width:5%">#</th>
                                    <th style="width:20%">Name</th>
                                    <th style="width:21%">Position</th>
                                    <th style="width:13%">User Name</th>
                                    <th style="width:26%">Total Voters Registered</th>
                                    <th style="width:15%"></th>
                                </tr>
                            </thead>
                            <tbody>
                             <?php
                            
							$result = mysql_query("SELECT * FROM  system_admin_tbl, access_tbl WHERE system_admin_tbl.sysAd_id = access_tbl.acc_id  ORDER BY lastName ASC",$connection);
       						$row_nr = mysql_num_rows($result);
							if ($row_nr >= 1)
							{
								while($myrow = mysql_fetch_array($result))
								 {
							 			$i = $i + 1;
							
										?>
                           
                                <tr>
                                    <td class="align-center"><?php echo $i; ?></td>
                                    <td><?php echo $myrow['title'] . " " . $myrow['lastName'] . " " . $myrow['firstName']; ?></td>
                                    <td><?php echo $myrow['acc_lvl']; ?></td>
                                    <td><?php echo $myrow['userName']; ?></td>
                                   
						<?php 
						
						$sys_admin = $myrow['sysAd_id'];
							$registered = mysql_query("SELECT * FROM  electrates_tbl WHERE registrar_id = $sys_admin",$connection);
       						$total_register = mysql_num_rows($registered);
							if ($total_register >= 1)
							{
                                  echo  '<td>'.  $total_register . '</td>';
							}
							elseif($total_register == 0)
							{
								echo  '<td>No records</td>';
							}
							?>
                                    <td>
                                    	<input type="checkbox" />
                                        
                                        <a href="e26c87re90rt.php?id=<?php echo $myrow['sysAd_id'];?>">
                                        <img src="../images/pencil.gif" tppabs="images/pencil.gif" width="16" height="16" alt="edit" /></a>
                                        <a href="e26c87re90rt.php?del=<?php echo $myrow['sysAd_id'];?>">
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
                                    <td><a href="">No Electoral Commission Member has been Registered</a></td>
                                    <!--<td>
                                    	
                                    </td>-->
                                </tr>
                                <?php
							}
							?>   
                                <!--<tr>
                                    <td class="align-center">1</td>
                                    <td><a href="">Kofi Mensah</a></td>
                                    <td>E.C. Member</td>
                                    <td>Mensah</td>
                                    <td>992</td>
                                    <td>
                                    	<input type="checkbox" />
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