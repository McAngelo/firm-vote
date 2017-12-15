<?php
		require_once('_header.php');
		
		$del = $_GET['del'];
		
		$result = mysql_query("DELETE FROM system_tbl WHERE sys_id='$del'",$connection);
?>
		<div class="container_12">
            
            <div style="clear:both;"></div>
                   
            <div class="grid_12">
              
                <!-- Example table -->
                <div class="module">
                	<h2><span>System Name table</span></h2>
                    
                    <div class="module-table-body">
                    	<form action="">
                        <table id="myTable" class="tablesorter">
                        	<thead>
                                <tr>
                                    <th style="width:5%">#</th>
                                    <th style="width:25%">System Name</th>
                                    <th style="width:25%">System Logo</th>
                                    <th style="width:15%">Date set</th>
                                    <th style="width:10%"></th>
                                </tr>
                            </thead>
                            <tbody>
                            <?php
                            
							$result = mysql_query("SELECT * FROM system_tbl ORDER BY sys_name ASC",$connection);
       						$row_nr = mysql_num_rows($result);
							if ($row_nr >= 1)
							{
								while($myrow = mysql_fetch_array($result))
								 {
							 			$i = $i + 1;
							
										?>
                                <tr >
                                   <td  class="align-center"><?php echo $i; ?></td>
                                    <td><?php echo $myrow['sys_name']; ?></td>
                                    <td class="align-center"><img src="../../../assets/<?php echo $myrow['logo']; ?>" /></td>
                                    <td><?php echo $myrow['date_cr']; ?></td>
                                    <td>
                                    	<input type="checkbox" />
                                        
                                        <?php if($myrow['status'] == 0)	{ ?>
                                        <a href="">
                                        <img src="../images/tick-circle.gif" tppabs="images/tick-circle.gif" width="16" height="16" alt="published" /></a>
                                        <?php } else { ?>
                                        <a href="">
                                        <img src="../images/tick-circle.gif" tppabs="images/minus-circle.gif" width="16" height="16" alt="published" /></a>
                                        <?php }?>
                                        <a href="">
                                        <img src="../images/pencil.gif" tppabs="images/pencil.gif" width="16" height="16" alt="edit" /></a>
                                        <a href="poll_setup.php?del=<?php echo $myrow['sys_id'];?>">
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
                                    <td>No System name Added</td>
                                    <td>No Logo</td>
                                    <td>No Date</td>
                                    <td></td>
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
                     <h2><span>Add New System</span></h2>
                        
                     <div class="module-body">
                                              
                         <form name="frmSys" id="frmSys" method="post" enctype="multipart/form-data" action="../../include/validate.php">
                         <table width="200" border="0" cellspacing="0" cellpadding="0">
                         	<tr>
                                <td><label>System Name :</label></td>
                                <td colspan="2"><input name="sys_name" id="sys_name" type="text" class="input-long" /></td>
                                <td><span class="notification-input ni-correct">This is correct, thanks!</span></td>
                              </tr>
                               <tr>
                                <td><label>Logo :</label></td>
                                <td colspan="2"><input name="ufile" type="file" id="ufile" size="35" /></td>
                                <td><span class="notification-input ni-correct">This is correct, thanks!</span></td>
                              </tr>
                         </table>
                             <fieldset>
                                <input class="submit-green" name="action" id="action" type="submit" value="Submit System" /> 
                                <input class="submit-gray" type="reset" value="Cancel" />
                       </fieldset>
                         </form>
                     </div>
                <?php
						}
						else
						{
							$result_chk = mysql_query("SELECT * FROM system_tbl WHERE sys_id ='" . $id ."'",$connection);
       					
							while($myid = mysql_fetch_array($result_chk))
								 {
									 $name = $myid['sys_name'];
									 $t_id = $myid['sys_id'];
								 }
					?>
                    <div class="float-right">
                        <a href="poll_setup.php" class="button">
                        	<span>Add New System<img src="../images/plus-small.gif" tppabs="images/plus-small.gif" width="12" height="9" alt="New article" /></span>
                        </a>
                    </div>
                    <div class="module">
                     <h2><span>Edit System</span></h2>
                        
                     <div class="module-body">
                                              
                         <form name="frmSys" id="frmSys" method="post" action="../../include/validate.php">
                         <table width="200" border="0" cellspacing="0" cellpadding="0">
                         	<tr>
                                <td><label>System Name :</label></td>
                                <td colspan="2"><input name="sys_name" id="sys_name" type="text" class="input-long" value="<?php echo $name; ?>" /><input type="hidden" name="dep_id" id="dep_id" value="<?php echo $t_id; ?>" /></td>
                                <td><span class="notification-input ni-correct">This is correct, thanks!</span></td>
                              </tr>
                               <tr>
                                <td><label>Logo :</label></td>
                                <td colspan="2"><input name="ufile" type="file" id="ufile" size="35" /></td>
                                <td><span class="notification-input ni-correct">This is correct, thanks!</span></td>
                              </tr>
                         </table>
                             <fieldset>
                                <input class="submit-green" name="action" id="action" type="submit" value="Update System" /> 
                                <input class="submit-gray" type="reset" value="Cancel" />
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