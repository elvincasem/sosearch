
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
   
   <form method="post" action="soedit">
			<div class="col-md-1">Search: </div>
             <div class="col-lg-3">
		
				<input type="text" id="keyword" name="keyword" class="form-control" placeholder="Tracking Number" value=""<?php echo $keyword;?>>
			
			
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
			
			<h5>SO Application Details</h5>
			
			
			<?php //print_r($heidirectory);?>
        </div>
    <div class="form-group">    
		<label class="col-md-2 control-label" for="state-normal">Tracking #:</label>
		<div class="col-md-3">
			 <input type="text" id="so_id"  name="state-normal" class="form-control" tabindex="0" vtabindex="2" placeholder="" value="<?php echo $keyword;?>" disabled>
			
		</div>	
		
		<div class="row"></div>
		
		<label class="col-md-2 control-label" for="state-normal">HEI:</label>
		<div class="col-md-5">
			<select id="instcode" name="example-select2" class="select-select2" style="width: 100%;" data-placeholder="Choose one.." >
							
			<?php
			$instcode = $sodetails['InstCode'];
			foreach ($heilist as $hei_list):
				
				if($hei_list['Instcode']==$instcode){
					
					$selectedhei = "selected='selected'";
					
				}else{
					$selectedhei = "";
				}
			
				echo "<option value='".$hei_list['Instcode']."' $selectedhei>".$hei_list['Institution Name']."</option>";
			
			endforeach;
			?>
			</select>
		</div>	
		<div class="row"></div>	
		<label class="col-md-2 control-label" for="state-normal">Students:</label>
		<div class="col-md-4">
			<select id="number_of_students" name="example-select2" class="select-select2" style="width: 25%;" data-placeholder="Choose one.." >
							<option value="1">1</option>
							<option value="2">2</option>
							<option value="3">3</option>
							<option value="4">4</option>
							<option value="5">5</option>
							<option value="6">6</option>
							<option value="7">7</option>
							<option value="8">8</option>
							<option value="9">9</option>
							<option value="<?php echo $sodetails['number_of_students'];?>" selected="selected"><?php echo $sodetails['number_of_students'];?></option>

			</select>
			
		</div>	
		<div class="row"></div>	
		<label class="col-md-2 control-label" for="state-normal">Graduation Date:</label>
		<div class="col-md-4">
			<select id="grad_month" name="example-select2" class="select-select2" style="width: 25%;" data-placeholder="Choose one.." >
							<option value="1">January</option>
        <option value="2">February</option>
        <option value="3">March</option>
        <option value="4">April</option>
        <option value="5">May</option>
        <option value="6">June</option>
        <option value="7">July</option>
        <option value="8">August</option>
        <option value="9">September</option>
        <option value="10">October</option>
        <option value="11">November</option>
        <option value="12">December</option>
		<option value="<?php echo $sodetails['grad_month'];?>" selected="selected"><?php echo $sodetails['grad_month'];?></option>

			</select>
			<select id="grad_day" name="example-select2" class="select-select2" style="width: 25%;" data-placeholder="Choose one.." >
							<option value="0">0</option>
        <option value="1">1</option>
        <option value="2">2</option>
        <option value="3">3</option>
        <option value="4">4</option>
        <option value="5">5</option>
        <option value="6">6</option>
        <option value="7">7</option>
        <option value="8">8</option>
        <option value="9">9</option>
        <option value="10">10</option>
        <option value="11">11</option>
        <option value="12">12</option>
        <option value="13">13</option>
        <option value="14">14</option>
        <option value="15">15</option>
        <option value="16">16</option>
        <option value="17">17</option>
        <option value="18">18</option>
        <option value="19">19</option>
        <option value="20">20</option>
        <option value="21">21</option>
        <option value="22">22</option>
        <option value="23">23</option>
        <option value="24">24</option>
        <option value="25">25</option>
        <option value="26">26</option>
        <option value="27">27</option>
        <option value="28">28</option>
        <option value="29">29</option>
        <option value="30">30</option>
        <option value="31">31</option>
		<option value="<?php echo $sodetails['grad_day'];?>" selected="selected"><?php echo $sodetails['grad_day'];?></option>


			</select>
			
		<select id="grad_year" name="example-select2" class="select-select2" style="width: 25%;" data-placeholder="Choose one.." >
							<option value="1984">1984</option>
                <option value="1985">1985</option>
                <option value="1986">1986</option>
                <option value="1987">1987</option>
                <option value="1988">1988</option>
                <option value="1989">1989</option>
                <option value="1990">1990</option>
                <option value="1991">1991</option>
                <option value="1992">1992</option>
                <option value="1993">1993</option>
                <option value="1994">1994</option>
                <option value="1995">1995</option>
                <option value="1996">1996</option>
                <option value="1997">1997</option>
                <option value="1998">1998</option>
                <option value="1999">1999</option>
                <option value="2000">2000</option>
                <option value="2001">2001</option>
                <option value="2002">2002</option>
                <option value="2003">2003</option>
                <option value="2004">2004</option>
                <option value="2005">2005</option>
                <option value="2006">2006</option>
                <option value="2007">2007</option>
                <option value="2008">2008</option>
                <option value="2009">2009</option>
                <option value="2010">2010</option>
                <option value="2011">2011</option>
                <option value="2012">2012</option>
                <option value="2013">2013</option>
                <option value="2014">2014</option>
                <option value="2015">2015</option>
                <option value="2016">2016</option>
                <option value="2017">2017</option>
                <option value="2018">2018</option>
                <option value="2019">2019</option>
                <option value="2020">2020</option>
                <option value="2021">2021</option>
                <option value="2022">2022</option>
                <option value="2023">2023</option>
                <option value="2024">2024</option>
                <option value="2025">2025</option>
                <option value="2026">2026</option>
                <option value="2027">2027</option>
                <option value="2028">2028</option>
                <option value="2029">2029</option>
                <option value="2030">2030</option>

<option value="<?php echo $sodetails['grad_year'];?>" selected="selected"><?php echo $sodetails['grad_year'];?></option>

			</select>
			
		</div>	
		
		<div class="row"></div>
		
		<label class="col-md-2 control-label" for="state-normal">Last Semester/Academic Year Enrolled:</label>
		<div class="col-md-4">
			<select id="sem_enrolled" name="example-select2" class="select-select2" style="width: 100%;" data-placeholder="Choose one.." >
							
		    <option value="1st Semester">1st Semester</option>
		    <option value="2nd Semester">2nd Semester</option>
		    <option value="Summer">Summer</option>
		    <option value="1st Trimester">1st Trimester</option>
		    <option value="2nd Trimester">2nd Trimester</option>
		    <option value="3rd Trimester">3rd Trimester</option>
<option value="<?php echo $sodetails['sem_enrolled'];?>" selected="selected"><?php echo $sodetails['sem_enrolled'];?></option>
			</select>
			
		</div>	
		<label class="col-md-1 control-label" for="state-normal">Academic Year:</label>
		<div class="col-md-4">
			<select id="acad_year" name="example-select2" class="select-select2" style="width: 100%;" data-placeholder="Choose one.." >
							 <option value="1984-1985">1984-1985</option>
 <option value="1985-1986">1985-1986</option>
 <option value="1986-1987">1986-1987</option>
 <option value="1987-1988">1987-1988</option>
 <option value="1988-1989">1988-1989</option>
 <option value="1989-1990">1989-1990</option>
 <option value="1990-1991">1990-1991</option>
 <option value="1991-1992">1991-1992</option>
 <option value="1992-1993">1992-1993</option>
 <option value="1993-1994">1993-1994</option>
 <option value="1994-1995">1994-1995</option>
 <option value="1995-1996">1995-1996</option>
 <option value="1996-1997">1996-1997</option>
 <option value="1997-1998">1997-1998</option>
 <option value="1998-1999">1998-1999</option>
 <option value="1999-2000">1999-2000</option>
 <option value="2000-2001">2000-2001</option>
 <option value="2001-2002">2001-2002</option>
 <option value="2002-2003">2002-2003</option>
 <option value="2003-2004">2003-2004</option>
 <option value="2004-2005">2004-2005</option>
 <option value="2005-2006">2005-2006</option>
 <option value="2006-2007">2006-2007</option>
 <option value="2007-2008">2007-2008</option>
 <option value="2008-2009">2008-2009</option>
 <option value="2009-2010">2009-2010</option>
 <option value="2010-2011">2010-2011</option>
 <option value="2011-2012">2011-2012</option>
 <option value="2012-2013">2012-2013</option>
 <option value="2013-2014">2013-2014</option>
 <option value="2014-2015">2014-2015</option>
 <option value="2015-2016">2015-2016</option>
 <option value="2016-2017">2016-2017</option>
 <option value="2017-2018">2017-2018</option>
 <option value="2018-2019">2018-2019</option>
 <option value="2019-2020">2019-2020</option>
 <option value="2020-2021">2020-2021</option>
 <option value="2021-2022">2021-2022</option>
 <option value="2022-2023">2022-2023</option>
 <option value="2023-2024">2023-2024</option>
 <option value="2024-2025">2024-2025</option>
 <option value="2025-2026">2025-2026</option>
 <option value="2026-2027">2026-2027</option>
 <option value="2027-2028">2027-2028</option>
 <option value="2028-2029">2028-2029</option>
 <option value="2029-2030">2029-2030</option>
 <option value="2030-2031">2030-2031</option>
<option value="<?php echo $sodetails['acad_year'];?>" selected="selected"><?php echo $sodetails['acad_year'];?></option>

			</select>
			
		</div>	
		
		
		<div class="row"></div>
		
		<label class="col-md-2 control-label" for="state-normal">Program:</label>
		<div class="col-md-6">
			<select id="prog_id" name="example-select2" class="select-select2" style="width: 100%;" data-placeholder="Choose one.." >
							<option value=""></option>
			<?php
			
			$prog_id = $sodetails['prog_id'];
			
				
			
			
			foreach ($programlist as $prog_list):
				
				if($prog_list['ProgID']==$prog_id){
					
					$selectedprog = "selected='selected'";
					
				}else{
					$selectedprog = "";
				}
			
				echo "<option value='".$prog_list['ProgID']."' $selectedprog>".$prog_list['InstName']."-".$prog_list['ProgName']."(".$prog_list['GP_GR_Positive'].") </option>";
			
			endforeach;
			
			?>
			
			
			</select>
			
		</div>	
		<?php //print_r($sodetails);?>
		<div class="row"></div>
		<label class="col-md-2 control-label" for="state-normal">Supervisor:</label>
		<div class="col-md-4">
			<select id="assigned_to" name="example-select2" class="select-select2" style="width: 100%;" data-placeholder="Choose one.." >
							<option value=""></option>
			<?php
			
			$assigned_to = $sodetails['assigned_to'];
			
				
			
			
			foreach ($memberlist as $mem_list):
				
				if($mem_list['member_id']==$assigned_to){
					
					$selectedprog = "selected='selected'";
					
				}else{
					$selectedprog = "";
				}
			
				echo "<option value='".$mem_list['member_id']."' $selectedprog>".$mem_list['member_id']."-".$mem_list['firstname']." ".$mem_list['lastname']." (".$mem_list['login'].")</option>";
			
			endforeach;
			
			?>
			
			
			</select>
			
		</div>	
		<div class="row"></div>
		<label class="col-md-2 control-label" for="state-normal">Status:</label>
		<div class="col-md-4">
			<select id="sostatus" name="example-select2" class="select-select2" style="width: 100%;" data-placeholder="Choose one.." disabled>
							
			<?php
			$so_status = $sodetails['status'];
			
			foreach ($statuslist as $slist):
				
				if($slist['status']==$so_status){
					
					$selectedstat = "selected='selected'";
					
				}else{
					$selectedstat = "";
				}
			
				echo "<option value='".$slist['status']."' $selectedstat>".$slist['status']."</option>";
			
			endforeach;
			
			?>
			
			
			</select>
			
		</div>	
	
						
								<button id="savedrbutton" class="btn btn-primary" title="Update" onclick="updateso();" ><i class="fa fa-floppy-o"></i> Update</button>
						
						 
						 
		<div class="row"></div>
	</div>	
		
    </div>		 
		
            
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
                        <th>Action</th>
                        <th>Program</th>
                        <th>HEI</th>
                        <th>SO Number/Date Numbered</th>
                        <th>Remarks</th>
                        
						
                    </tr>
                </thead>
                <tbody>
				<?php
				
				foreach ($result_list as $so_list):
				//$heiname = strtoupper($hei['instname']);
				
				
				echo "<tr class='odd gradeX'>";
				
				echo "<td><input type='text' id='lname-".$so_list['index']."' class='form-control' value='".$so_list['lname']."'></td>";
				echo "<td><input type='text' id='fname-".$so_list['index']."' class='form-control' value='".$so_list['fname']."'></td>";
				echo "<td><input type='text' id='mname-".$so_list['index']."' class='form-control' value='".$so_list['mname']."'></td>";
				
				
				//echo "<td>".$so_list['status']."</td>";
				echo "<td>
				<select id='name_status-".$so_list['index']."' name='xample-select2' class='select-select2' style='width: 100%;' data-placeholder='Choose one..' >";
							
			
			$so_status_names = $so_list['status'];
			
			foreach ($statuslist_names as $slist_names):
				
				if($slist_names['status']==$so_status_names){
					
					$selectednames = "selected='selected'";
					
				}else{
					$selectednames = "";
				}
			
				echo "<option value='".$slist_names['status']."' $selectednames>".$slist_names['status']."</option>";
			
			endforeach;
			
			
			
			
				echo "</select></td>";
				echo "<td class='center'> 
					
					<button class='btn btn-primary notification' title='Update Name' id='notification' onClick='updatename(".$so_list['index'].")'><i class='fa fa-floppy-o'></i></button>
					
					<button class='btn btn-danger notification' title='Delete Name' id='notification' onClick='deletename(".$so_list['index'].")'><i class='fa fa-times'></i></button>
				</td>";
				echo "<td>".$so_list['ProgName']."</td>";
				echo "<td>".$so_list['InstName']."</td>";
				
				echo "<td>".$so_list['so_number']." ".mdate('%F %d, %Y',strtotime($so_list['date_numbered']))."</td>";
				//echo "<td>".mdate('%F %d, %Y',strtotime($so_list['date_numbered']))."</td>";
				echo "<td>".$so_list['remarks']."</td>";
			
				
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


