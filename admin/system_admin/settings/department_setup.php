<?php
		require_once('_header.php');
		
		//script to delete from the table.
		$del = $_GET['del'];
		$result = mysql_query("DELETE FROM department_tbl WHERE ID='$del'",$connection);
?>
		<div class="container_12">
            
            <div style="clear:both;"></div>
                   
            <div class="grid_12">
              
                <!-- Example table -->
                <div class="module">
                	<h2><span>Departments table</span></h2>
                    
                    <div class="module-table-body">
                    	<form action="">
                        <table id="myTable" class="tablesorter">
                        	<thead>
                                <tr>
                                    <th style="width:5%">#</th>
                                    <th style="width:80%">Department</th>
                                    <th style="width:15%"></th>
                                </tr>
                            </thead>
                            <tbody>
                            <?php
                            
							$result = mysql_query("SELECT * FROM department_tbl ORDER BY dep_name ASC",$connection);
       						$row_nr = mysql_num_rows($result);
							if ($row_nr >= 1)
							{
								while($myrow = mysql_fetch_array($result))
								 {
							 			$i = $i + 1;
							
										?>
                           
                                <tr>
                                    <td class="align-center"><?php echo $i; ?></td>
                                    <td><?php echo $myrow['dep_name']; ?></td>
                                    <td>
                                    	<input type="checkbox" />
                                        
                                        <a href="department_setup.php?id=<?php echo $myrow['ID'];?>">
                                        <img src="../images/pencil.gif" tppabs="images/pencil.gif" width="16" height="16" alt="edit" /></a>
                                        <a href="department_setup.php?del=<?php echo $myrow['ID'];?>">
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
                                    <td><a href="">No Departments Added</a></td>
                                    <td>
                                    	
                                    </td>
                                </tr>
                                <?php
							}
							?>
                            </tbody>
                        </table>
                        </form>
                        
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
                     <h2><span>Add New Department</span></h2>
                        
                     <div class="module-body">
                                              
                         <form name="frmDep" id="frmDep" method="post" action="../../include/validate.php">
                            <fieldset>
                                <input name="dep" id="dep" type="text" class="input-medium" />&nbsp;&nbsp;
                                <input class="submit-green" id="action" name="action" type="submit" value="Add Department" />
                            </fieldset>
                         </form>
                     </div>
                      <?php
						}
						else
						{
							$result_chk = mysql_query("SELECT * FROM department_tbl WHERE ID ='" . $id ."'",$connection);
       					
							while($myid = mysql_fetch_array($result_chk))
								 {
									 $name = $myid['dep_name'];
									 $t_id = $myid['ID'];
								 }
					?>
                    <div class="float-right">
                        <a href="department_setup.php" class="button">
                        	<span>Add New Department<img src="../images/plus-small.gif" tppabs="images/plus-small.gif" width="12" height="9" alt="New article" /></span>
                        </a>
                    </div>
                     <div class="module">
                     <h2><span>Edit Department</span></h2>
                     
                       
                     <div class="module-body">
                                              
                         <form name="frmDep" id="frmDep" method="post" action="../../include/validate.php">
                            <fieldset>
                                <input name="dep" id="dep" type="text" class="input-medium" value="<?php echo $name; ?>" />&nbsp;&nbsp;
                                <input type="hidden" name="dep_id" id="dep_id" value="<?php echo $t_id; ?>" />
                                <input class="submit-green" id="action" name="action" type="submit" value="Update Department" />
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