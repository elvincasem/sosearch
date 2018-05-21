
<div id="page-container" class="header-fixed-top sidebar-visible-lg-full">
	
	
	<!--rightsidebar here-->
	<?php //$this->load->view('rightsidebar_view'); ?>
	
	<!--main sidebar here -->
	<?php $this->load->view('leftsidebar_search_view'); ?>

	<!-- Main Container -->
	<div id="main-container">
		  <?php $this->load->view('subheader_view'); ?>

		<!-- Page content -->
		<div id="page-content">
			<?php $this->load->view('inc/subnav_view'); ?>
<!-- Tables Row -->
<div class="row">
   <div class="col-lg-12">
   
   <form method="post" action="search">
			<div class="col-md-1">Search: </div>
             <div class="col-lg-3">
		
				<input type="text" id="keyword" name="keyword" class="form-control" placeholder="Firstname or Lastname" value=""<?php echo $keyword;?>>
			
			
			</div>
			
			
		<div class="col-lg-2">
			<button type="submit" class="btn btn-primary">Search</button>   
		</div>
	</form>
		<div class="row">&nbsp;</div>	
		<div class="row"></div>	
		
            <!-- Partial Responsive Block -->
			
			 
		
            
	<div class="block full">
        <div class="block-title">
			
			<h5>Student List</h5>
			
			
			<?php //print_r($heidirectory);?>
        </div>
        <div class="table-responsive">
            <table id="example-datatable" class="table table-striped table-bordered table-vcenter table-hover">
                <thead>
                    <tr>
						<th>Last Name</th>
						<th>First Name</th>
                        <th>Middle Name</th>
                        <th>Status</th>
                        <th>Program</th>
                        <th>HEI</th>
                        <th>SO ID</th>
                        <th>SO Number/Date Numbered</th>
                        
						
                    </tr>
                </thead>
                <tbody>
				<?php
				
				foreach ($result_list as $so_list):
				//$heiname = strtoupper($hei['instname']);
				echo "<tr class='odd gradeX'>";
				
				echo "<td>".$so_list['lname']."</td>";
				echo "<td>".$so_list['fname']."</td>";
				echo "<td>".$so_list['mname']."</td>";
				echo "<td>".$so_list['status']."</td>";
				echo "<td>".$so_list['ProgName']."</td>";
				echo "<td>".$so_list['InstName']."</td>";
				echo "<td>".$so_list['so_id']."</td>";
				if($so_list['status']=='CANCELLED'){
					echo "<td>".mdate('%F %d, %Y',strtotime($so_list['date_reco_approval']))."</td>";
				}else{
					echo "<td>".$so_list['so_number']." ".mdate('%F %d, %Y',strtotime($so_list['date_numbered']))."</td>";
				}
				
				//echo "<td>".mdate('%F %d, %Y',strtotime($so_list['date_numbered']))."</td>";
				
			
				
				echo "</tr>";
				
				endforeach;
				
				?>
				
				
				
				
                    
                </tbody>
            </table>
        </div>
    </div>
   </div> <!-- end column -->
</div> <!-- end row -->
			
			
			

			
		</div>
		<!-- END Page Content -->
	</div>
	<!-- END Main Container -->
</div>
<!-- END Page Container -->


