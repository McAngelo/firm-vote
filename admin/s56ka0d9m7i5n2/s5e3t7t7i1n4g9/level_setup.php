<?php
		require_once('_header.php');
		
		$del = $_GET['del'];
		
		$result = mysql_query("DELETE FROM level_tbl WHERE ID='$del'",$connection);
?>
		<div class="container_12">
            
            <div style="clear:both;"></div>
                   
            <div class="grid_12">
              
                <!-- Example table -->
                <div class="module">
                	<h2><span>Levels table</span></h2>
                    
                    <div class="module-table-body">
                    	<form action="">
                        <table id="myTable" class="tablesorter">
                        	<thead>
                                <tr>
                                    <th style="width:5%">#</th>
                                    <th style="width:80%">Level</th>
                                    <th style="width:15%"></th>
                                </tr>
                            </thead>
                            
                            <tbody>
                            <?php
                            
							$result = mysql_query("SELECT * FROM level_tbl ORDER BY level ASC",$connection);
       						$row_nr = mysql_num_rows($result);
							if ($row_nr >= 1)
							{
								while($myrow = mysql_fetch_array($result))
								 {
							 			$i = $i + 1;
							
										?>
                           
                            
                                <tr>
                                    <td class="align-center"><?php echo $i; ?></td>
                                    <td><?php echo $myrow['level']; ?></td>
                                    <td>
                                    	<input type="checkbox" />
                                        
                                        <a href="level_setup.php?id=<?php echo $myrow['ID'];?>">
                                        <img src="../images/pencil.gif" tppabs="images/pencil.gif" width="16" height="16" alt="edit" /></a>
                                        <a href="level_setup.php?del=<?php echo $myrow['ID'];?>">
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
                                    <td>No Levels Added</td>
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
                
                     <h2><span>Add New Level</span></h2>
                        
                     <div class="module-body">
                                              
                         <form name="frmLevel" id="frmLevel" method="post" action="../../include/validate.php">
                            <fieldset>
                                <input name="lvl" id="lvl" type="text" class="input-medium" />&nbsp;&nbsp;
                                <input class="submit-green" name="action" id="action" type="submit" value="Add Level" />
                            </fieldset>
                         </form>
                     </div> 
                     </div> <!-- module -->
                <div style="clear:both;"></div>
                    <?php
						}
						else
						{
							$result_chk = mysql_query("SELECT * FROM level_tbl WHERE ID ='" . $id ."'",$connection);
       					
							while($myid = mysql_fetch_array($result_chk))
								 {
									 $name = $myid['level'];
									 $t_id = $myid['ID'];
								 }
					?>
                    
                    <div class="float-right">
                        <a href="level_setup.php" class="button">
                        	<span>Add New Level<img src="../images/plus-small.gif" tppabs="images/plus-small.gif" width="12" height="9" alt="New article" /></span>
                        </a>
                    </div>
                   <div class="module">
                
                     <h2><span>Edit Level</span></h2>
                        
                     <div class="module-body">
                                              
                         <form name="frmLevel" id="frmLevel" method="post" action="../../include/validate.php">
                            <fieldset>
                                <input name="lvl" id="lvl" type="text" class="input-medium" value="<?php echo $name; ?>" />&nbsp;&nbsp;
                                <input type="hidden" name="lvl_id" id="lvl_id" value="<?php echo $t_id; ?>" />
                                <input class="submit-green" name="action" id="action" type="submit" value="Update Level" />
                            </fieldset>
                         </form>
                     </div> 
                     </div> <!-- module -->
                <div style="clear:both;"></div>
                     <?php
						}
					 ?>
               
			</div> <!-- End .grid_6 -->

            <div style="clear:both;"></div>
		
 <?php
 	require_once('_footer.php');
 ?>