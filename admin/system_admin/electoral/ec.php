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
                     <form action="">
                      
                            <table width="200" border="0" cellspacing="0" cellpadding="0">
                               <tr>
                                <td><label>First Name :</label></td>
                                <td colspan="2"><input type="text" class="input-medium" /></td>
                                <td><span class="notification-input ni-correct">This is correct, thanks!</span></td>
                              </tr>
                              <tr>
                                <td><label>Last Name :</label></td>
                                <td colspan="2"><input type="text" class="input-medium" /></td>
                                <td><span class="notification-input ni-correct">This is correct, thanks!</span></td>
                              </tr>                         
                              <tr> 
                                <td><label>Middle Name :</label></td>
                                <td colspan="2"><input type="text" class="input-medium" /></td>
                                <td><span class="notification-input ni-error">Sorry, try again.</span></td>
                              </tr>
                              <tr>
                                <td><legend>Gender</legend></td>
                                <td><label><input type="radio" name="c" checked="checked" /> Male</label></td>
                                <td><label><input type="radio" name="c" /> Female</label></td>
                                <td>&nbsp;</td>
                              </tr>
                              <tr>
                                <td><label>Department</label></td>
                                <td colspan="2"><select class="input-medium">
                                    <option value="1">Option 1</option>
                                    <option value="2">Option 2</option>
                                    <option value="3">Option 3</option>
                                    <option value="4">Option 4</option>
                                </select></td>
                                <td><span class="notification-input ni-error">Sorry, try again.</span></td>
                              </tr>
                              <tr>
                                <td><label>Level</label></td>
                                <td colspan="2"><select name="select" class="input-medium">
                                  <option value="1">Option 1</option>
                                  <option value="2">Option 2</option>
                                  <option value="3">Option 3</option>
                                  <option value="4">Option 4</option>
                                </select></td>
                                <td><span class="notification-input ni-error">Sorry, try again.</span></td>
                              </tr>
                              <tr>
                                <td><label>Student ID :</label></td>
                                <td colspan="2"><input type="text" class="input-short" /></td>
                                <td><span class="notification-input ni-correct">This is correct, thanks!</span></td>
                              </tr>
                            </table>
                            
                            <fieldset>
                                <input class="submit-green" type="submit" value="Submit" /> 
                                <input class="submit-gray" type="submit" value="Cancel" />
                       </fieldset>
                       </form>
                     </div> <!-- End .module-body -->

                </div>  <!-- End .module -->
        		<div style="clear:both;"></div>
            </div> <!-- End .grid_12 -->
                
            <div style="clear:both;"></div>
        </div> <!-- End .container_12 -->
		
 <?php
 	require_once('_footer.php');
 ?>