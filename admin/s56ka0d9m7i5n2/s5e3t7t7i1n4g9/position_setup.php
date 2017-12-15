<?php
		require_once('_header.php');
		
		$del = $_GET['del'];
		
		$result = mysql_query("DELETE FROM department_tbl WHERE ID='$del'",$connection);
?>
		<div class="container_12">
            
            <div style="clear:both;"></div>
                   
            <div class="grid_12">
              
                <!-- Example table -->
                <div class="module">
                	<h2><span>Positions table</span></h2>
                    
                    <div class="module-table-body">
                    	<form action="">
                        <table id="myTable" class="tablesorter">
                        	<thead>
                                <tr>
                                    <th style="width:5%">#</th>
                                    <th style="width:40%">Position Name</th>
                                    <th style="width:30%">Position ID</th>
                                    <th style="width:10%">Ballot Page</th>
                                    <th style="width:15%"></th>
                                </tr>
                            </thead>
                            <tbody>
                            <?php
                            
							$result = mysql_query("SELECT * FROM position_tbl ORDER BY post_name ASC",$connection);
       						$row_nr = mysql_num_rows($result);
							if ($row_nr >= 1)
							{
								while($myrow = mysql_fetch_array($result))
								 {
							 			$i = $i + 1;
							
										?>
                                <tr>
                                    <td class="align-center"><?php echo $i; ?></td>
                                    <td><?php echo $myrow['name']; ?></td>
                                    <td><?php echo $myrow['post_name']; ?></td>
                                    <td><?php echo $myrow['page_number']; ?></td>
                                    <td>
                                    	<input type="checkbox" />
                                        
                                        <a href="position_setup.php?id=<?php echo $myrow['ID'];?>">
                                        <img src="../images/pencil.gif" tppabs="images/pencil.gif" width="16" height="16" alt="edit" /></a>
                                        <a href="position_setup.php?del=<?php echo $myrow['ID'];?>">
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
                                    <td><a href="">No Positions Added</a></td>
                                    <td>
                                    	
                                    </td>
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
                        <div style="clear: both"></div>
                     </div> <!-- End .module-table-body -->
                </div> <!-- End .module -->
                
                               
			</div> <!-- End .grid_12 -->
                
            <!-- Categories list -->
            <div class="grid_6">
                 <?php
						$id = $_GET['id'];
                		if($id == "")
						{
				
				?>
                <div class="module">
                     <h2><span>Add New Position</span></h2>
                        
                     <div class="module-body">
                                              
                         <form name="frmPost" id="frmPost" method="post" action="../../include/validate.php">
                                <fieldset>
                                <table width="200" border="1" cellspacing="0" cellpadding="0">
                                  <tr>
                                    <td>Position Name</td>
                                    <td><input name="position" id="position" type="text" class="input-medium" /></td>
                                  </tr>
                                  <tr>
                                    <td>Place on Ballot Paper</td>
                                    <td><input name="place" id="place" type="text" class="input-short" /></td>
                                  </tr>
                                  <tr>
                                    <td>&nbsp;</td>
                                    <td><input class="submit-green" id="action" name="action" type="submit" value="Add Position" /></td>
                                  </tr>
                                </table>
                                
                            </fieldset>
                         </form>
                     </div>
                      <?php
						}
						else
						{
							$result_chk = mysql_query("SELECT * FROM position_tbl WHERE ID ='" . $id ."'",$connection);
       					
							while($myid = mysql_fetch_array($result_chk))
								 {
									 $name = $myid['name'];
									 $place = $myid['page_number'];
									 $t_id = $myid['ID'];
								 }
					?>
                    <div class="float-right">
                        <a href="position_setup.php" class="button">
                        	<span>Add New Position<img src="../images/plus-small.gif" tppabs="images/plus-small.gif" width="12" height="9" alt="New article" /></span>
                        </a>
                    </div>
                     <div class="module">
                     <h2><span>Edit Position</span></h2>
                     
                       
                     <div class="module-body">
                                              
                         <form name="frmPost" id="frmPost" method="post" action="../../include/validate.php">
                         <table width="200" border="1" cellspacing="0" cellpadding="0">
                                  <tr>
                                    <td>Position Name</td>
                                    <td><input name="position" id="position" type="text" class="input-medium" value="<?php echo $name; ?>" />
                                    <input type="hidden" name="post_id" id="post_id" value="<?php echo $t_id; ?>" /></td>
                                  </tr>
                                  <tr>
                                    <td>Place on Ballot Paper</td>
                                    <td><input name="place" id="place" type="text" class="input-short"  value="<?php echo $place; ?>"/></td>
                                  </tr>
                                  <tr>
                                    <td>&nbsp;</td>
                                    <td><input class="submit-green" id="action" name="action" type="submit" value="Update Position" /></td>
                                  </tr>
                                </table>
                            <fieldset>
                                &nbsp;&nbsp;
                                
                                
                            </fieldset>
                         </form>
                     </div>
                     <?php
						}
					 ?>
                </div> <!-- module -->
                <div style="clear:both;"></div>
			</div> <!-- End .grid_6 -->

            <div style="clear:both;"></div>
		
 <?php
 	require_once('_footer.php');
 ?>