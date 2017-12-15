<?php
		require_once('_header.php');
		require_once('_process.php');
?>
		<div class="container_12">
            
            <div style="clear:both;"></div>
            
            
            <div style="clear:both;"></div>
             <div class="grid_12">
            
                
                     <?php 
					 
					 $check = $_POST['action'];
					 
								if($check == 'Submit')
									{
										processed_form(); 
									}
									
								else{
										raw_form(); 
									}
							
					 ?>
                     
        		<div style="clear:both;"></div>
            </div> <!-- End .grid_12 -->
                
            <div style="clear:both;"></div>
        </div> <!-- End .container_12 -->
		
 <?php
 	require_once('_footer.php');
 ?>