
            <div id="page-container" class="header-fixed-top sidebar-visible-lg-full">
                
				
				<!--rightsidebar here-->
				<?php //$this->load->view('rightsidebar_view'); ?>
				
                <!--main sidebar here -->
				<?php $this->load->view('leftsidebar_search_view.php'); ?>

                <!-- Main Container -->
                <div id="main-container">
                   <?php $this->load->view('subheader_view'); ?>

                    <!-- Page content -->
                    <div id="page-content">
					<div class="col-lg-2">
		 <?php $monthname = date('F',mktime(0, 0, 0, $current_month_filter+1, 0, 0)); ?>
			<select class="form-control" id="monthfilter">
			
				<?php echo "<option value='".$current_month_filter."'>".$monthname."</option>";?>
				<option value="01">January</option>
				<option value="02">February</option>
				<option value="03">March</option>
				<option value="04">April</option>
				<option value="05">May</option>
				<option value="06">June</option>
				<option value="07">July</option>
				<option value="08">August</option>
				<option value="09">September</option>
				<option value="10">October</option>
				<option value="11">November</option>
				<option value="12">December</option>
				
			</select>
			
		</div>	
		 <div class="col-lg-2">
			<select class="form-control" id="yearfilter">
				<option value="2016">2016</option>
				<option value="2017">2017</option>
				<?php echo "<option value='".$current_year_filter."' selected='selected'>".$current_year_filter."</option>";?>
				<?php
					foreach($yearapplied_list as $year_applied):
						echo "<option value='".$year_applied['yearapplied']."'>".$year_applied['yearapplied']."</option>";
					endforeach;
				?>
			</select>
			
		</div>
		<div class="col-lg-2">
			<button type="button" class="btn btn-primary" onclick="changeyear();">View</button>   
		</div>
		
		<div class="row"></div>
		
		
					<!-- Block Tabs -->
                                <div class="block full">
                                    <!-- Block Tabs Title -->
                                    <div class="block-title">
                                        <div class="block-options pull-right">
                                            <a href="javascript:void(0)" class="btn btn-effect-ripple btn-default" data-toggle="tooltip" title="Settings"><i class="fa fa-cog"></i></a>
                                        </div>
                                        <ul class="nav nav-tabs" data-toggle="tabs">
                                            <li class="active"><a href="#block-tabs-home">Communication by Employee</a></li>
                                            <li><a href="#block-tabs-profile">Summary</a></li>
                                           <!-- <li><a href="#block-tabs-profile">Detailed</a></li> -->
                                            
                                            
                                        </ul>
                                    </div>
                                    <!-- END Block Tabs Title -->

                                    <!-- Tabs Content -->
                                    <div class="tab-content">
                                        <div class="tab-pane active" id="block-tabs-home">
										 <!-- First Row -->
                        <div class="row">
						
						<div class="col-lg-12">
                                <div class="widget">
                                    <div class="widget-content widget-content-mini themed-background-dark-default text-light text-center">
                                        <i class="fa fa-bar-chart-o"></i> <strong>Communication by Employee</strong>
                                    </div>
									
                                    <div class="widget-content themed-background-muted">
                                       <div id="chart-container" ></div>
                                    </div>
									<!--
                                    <div class="widget-content">
                                        <div class="row text-center">
                                            <div class="col-xs-4">
                                                <h3 class="widget-heading"><i class="gi gi-book_open text-muted push"></i> <br><small>17k Sales</small></h3>
                                            </div>
                                            <div class="col-xs-4">
                                                <h3 class="widget-heading"><i class="gi gi-wallet text-muted push"></i> <br><small>$41k Earnings</small></h3>
                                            </div>
                                            <div class="col-xs-4">
                                                <h3 class="widget-heading"><i class="gi gi-life_preserver text-muted push"></i> <br><small>3165 Tickets</small></h3>
                                            </div>
                                        </div>
                                    </div> -->
                                </div>
                            </div>
							

                        
						</div>
								<!-- end content tab -->
										
										
										
										</div> <!-- end first tab -->
                                        <div class="tab-pane" id="block-tabs-profile">
										
										<!-- Tables Row -->
    <div class="row">
        <div class="col-lg-12">
            <!-- Partial Responsive Block -->
            
	<div class="block full">
        <div class="block-title">
            <h1>Result</h1>
        </div>
        <div class="table-responsive">
            <table id="example-datatable" class="table table-striped table-bordered table-vcenter table-hover">
                <thead>
                    <tr>
						
						
						<th>Employee Name</th>
						<th>Title</th>
						<th>Time Encoded</th>
						<th>Action Taken</th>
						<th>Action Date</th>
                    </tr>
                </thead>
                <tbody>
                    
					
					<?php
				
				foreach ($commlisttable as $listtable):
				//$heiname = strtoupper($prog['mainprogram']);
				echo "<tr>";
				echo "<td>".$listtable['fname']." ".$listtable['lname']."</td>";
				echo "<td>".$listtable['title']."</td>";
				echo "<td>".$listtable['datetime_encoded']."</td>";
				echo "<td>".$listtable['action_taken']."</td>";
				echo "<td>".$listtable['action_date']."</td>";
				
				
				
				//echo "<td></td> ";
				//echo "<td><a href='heibyregion/instprofile/".$totalhei['region_db']."/ACTIVE' type='button' class='btn btn-effect-ripple btn-success' title='Download HEI'><i class='fa fa-download'></i></a></td> ";
				//echo "<td><a href='heibyregion/instprofile/".$totalhei['region_db']."/ALL' type='button' class='btn btn-effect-ripple btn-success' title='Download HEI'><i class='fa fa-download'></i></a></td> ";

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
                                        <div class="tab-pane" id="block-tabs-settings">
										
										
										
										
										
										
										
										
										
										</div>
                                    </div>
                                    <!-- END Tabs Content -->
                                </div>
                                <!-- END Block Tabs -->
					
					
					
					
                       
					
					
					
					
					
					
					
					
					
					
					
					
					
					
					</div>
                    <!-- END Page Content -->
                </div>
                <!-- END Main Container -->
            </div>
            <!-- END Page Container -->
       
<?php
//print_r($totalheiperregion);
echo "<input type='hidden' id='region' value='".$employeelist."'>";
echo "<input type='hidden' id='region_values' value='".$commlist."'>";

?>