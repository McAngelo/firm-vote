<?php
		require_once('_header.php');
		require_once('_process.php');
?>
		<div class="container_12">

           <div style="clear:both;"></div>

            <!-- Form elements -->
            <div class="grid_12">

            <!-- On page processing starts here-->
                <?php

					 $check = @$_POST['action'];

								if($check == 'Submit Candidate')
									{
										processed_candidate_form();
									}

								else{
										raw_candidate_form();
									}

					 ?>
                     <!-- On page processing ends here-->

        		<div style="clear:both;"></div>
            </div> <!-- End .grid_12 -->

            <div style="clear:both;"></div>
        </div> <!-- End .container_12 -->

 <?php
 	require_once('_footer.php');
 ?>