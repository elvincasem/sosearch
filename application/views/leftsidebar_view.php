<!-- Main Sidebar -->
                <div id="sidebar">
                    <!-- Sidebar Brand -->
                    <div id="sidebar-brand" class="themed-background">
                        <a href="<?=base_url()?>home" class="sidebar-title sidebar-nav-mini-hide">
						<img src="<?=base_url()?>public/img/ched_logo.png" width="20%">
						<strong>C.H.A.R.M.S.</strong>
                            
                        </a>
                    </div>
                    <!-- END Sidebar Brand -->

                    <!-- Wrapper for scrolling functionality -->
                    <div id="sidebar-scroll">
                        <!-- Sidebar Content -->
                        <div class="sidebar-content">
                            <!-- Sidebar Navigation -->
                            <ul class="sidebar-nav">
								<li>
                                    <a href="<?=base_url()?>home"><i class="gi gi-compass sidebar-nav-icon"></i><span class="sidebar-nav-mini-hide">Dashboard</span></a>
                                </li>
                                <li class="sidebar-separator">
                                    <i class="fa fa-ellipsis-h"></i>
                                </li>
								<!-- Purchases -->
                                <li class="<?php echo $purchasesclass;?>">
                                    <a href="#" class="sidebar-nav-menu"><i class="fa fa-chevron-left sidebar-nav-indicator sidebar-nav-mini-hide"></i><i class="fa fa-ruble sidebar-nav-icon"></i><span class="sidebar-nav-mini-hide">Purchases</span></a>
                                    <ul>
										
										<li>
                                            <a href="<?=base_url()?>purchaserequest" class="<?php echo $prclass;?>"><i class="fa fa-file-text-o sidebar-nav-icon"></i>Purchase Request</a>
                                        </li>
										<li>
                                            <a href="<?=base_url()?>apr" class="<?php echo $aprclass;?>"><i class="fa fa-bank sidebar-nav-icon"></i>Agency Procurement Request</a>
                                        </li>
										<li>
                                            <a href="<?=base_url()?>purchaseorder" class="<?php echo $poclass;?>"><i class="fa fa-file-text-o sidebar-nav-icon"></i>Purchase Order</a>
                                        </li>
										
										
										
									</ul>
								</li>
                               <!-- Asset Management -->
							   <li class="<?php echo $assetmanagementclass;?>">
                                    <a href="#" class="sidebar-nav-menu"><i class="fa fa-chevron-left sidebar-nav-indicator sidebar-nav-mini-hide"></i><i class="fa fa-cube sidebar-nav-icon"></i><span class="sidebar-nav-mini-hide">Asset Management</span></a>
                                    <ul>
										<li>
                                            <a href="<?=base_url()?>receivingassets" class="<?php echo $recevingassetsclass;?>"><i class="fa fa-truck sidebar-nav-icon"></i>Receiving Asset</a>
                                        </li>
										
										<li>
                                            <a href="<?=base_url()?>asset" class="<?php echo $assetclass;?>"><i class="fa fa-desktop sidebar-nav-icon"></i>Group Asset List</a>
                                        </li>
										
										<li>
                                            <a href="<?=base_url()?>property" class="<?php echo $propertyclass;?>"><i class="fa fa-desktop sidebar-nav-icon"></i>Individual Asset List</a>
                                        </li>
										<li>
                                            <a href="<?=base_url()?>par" class="<?php echo $parclass;?>"><i class="fa fa-desktop sidebar-nav-icon"></i>PAR </a>
                                        </li>
										<li>
                                            <a href="<?=base_url()?>ics" class="<?php echo $icsclass;?>"><i class="fa fa-desktop sidebar-nav-icon"></i>ICS</a>
                                        </li>
										<li>
                                            <a href="<?=base_url()?>ptr" class="<?php echo $ptrclass;?>"><i class="fa fa-desktop sidebar-nav-icon"></i>PTR</a>
                                        </li>
										<li>
                                            <a href="<?=base_url()?>rre" class="<?php echo $rreclass;?>"><i class="fa fa-desktop sidebar-nav-icon"></i>RRE</a>
                                        </li>
										
										<li class="hidden<?php //echo $userssubclass;?>">
                                            <a href="<?=base_url()?>panellabels" ><i class="fa fa-gears sidebar-nav-icon"></i>Inventory</a>
                                        </li>
										
										
									</ul>
								</li>
								<!-- Supplies -->
								<li class="<?php echo $supplymanagementclass;?>">
                                    <a href="#" class="sidebar-nav-menu"><i class="fa fa-chevron-left sidebar-nav-indicator sidebar-nav-mini-hide"></i><i class="fa fa-table sidebar-nav-icon"></i><span class="sidebar-nav-mini-hide">Supply Management</span></a>
                                    <ul>
									
										<li>
                                            <a href="<?=base_url()?>receiving" class="<?php echo $receiveclass;?>"><i class="fa fa-truck sidebar-nav-icon"></i>Receiving Supplies</a>
                                        </li>
										<li>
                                            <a  class="<?php echo $requisitionclass;?>" href="<?=base_url()?>requisition" ><i class="fa fa-check-square-o sidebar-nav-icon"></i>Requisition</a>
                                        </li>
										<li>
                                            <a  class="<?php echo $itemsclass;?>" href="<?=base_url()?>items" ><i class="fa fa-briefcase sidebar-nav-icon"></i>Items</a>
                                        </li>
										<li>
                                            <a  href="<?=base_url()?>adjustment" class="<?php echo $adjustmentclass;?>"><i class="fa fa-briefcase sidebar-nav-icon"></i>Adjustment</a>
                                        </li>
										
										
									</ul>
								</li>
								<!-- Reports -->
								<li class="
								<?php echo $reportsclass;?>">
                                    <a href="#" class="sidebar-nav-menu"><i class="fa fa-chevron-left sidebar-nav-indicator sidebar-nav-mini-hide"></i><i class="fa fa-table sidebar-nav-icon"></i><span class="sidebar-nav-mini-hide">Reports</span></a>
                                    <ul>
										<li class="<?php //echo $userssubclass;?>">
                                            <a href="<?=base_url()?>reports/assetissued" ><i class="gi gi-user sidebar-nav-icon"></i>Asset Issued by Employee/Office</a>
                                        </li>
										<li class="<?php //echo $userssubclass;?>">
                                            <a href="<?=base_url()?>reports/purchaserequest" ><i class="gi gi-user sidebar-nav-icon"></i>Purchase Request</a>
                                        </li>
										<li class="<?php //echo $userssubclass;?>">
                                            <a href="<?=base_url()?>reports/utilization" ><i class="gi gi-user sidebar-nav-icon"></i>Utilization of Common-Used Supplies</a>
                                        </li>
										
										<li class="<?php //echo $userssubclass;?>">
                                            <a href="<?=base_url()?>reports/issued" ><i class="gi gi-user sidebar-nav-icon"></i>Report of Supplies and Materials Issued</a>
                                        </li>
										
										<li class="<?php //echo $userssubclass;?>">
                                            <a href="<?=base_url()?>reports/returns" ><i class="gi gi-user sidebar-nav-icon"></i>Returns of Equipment</a>
                                        </li>
										<li class="hidden<?php //echo $userssubclass;?>">
                                            <a href="<?=base_url()?>users" ><i class="gi gi-user sidebar-nav-icon"></i>Low Stock Inventory</a>
                                        </li>
										
										<li class="hidden<?php //echo $userssubclass;?>">
                                            <a href="<?=base_url()?>users" ><i class="gi gi-user sidebar-nav-icon"></i>Low Stock Inventory</a>
                                        </li>
										<li class="hidden<?php //echo $userssubclass;?>">
                                            <a href="<?=base_url()?>panellabels" ><i class="gi gi-user sidebar-nav-icon"></i>Equipment Assignment</a>
                                        </li>
										<li class="hidden<?php //echo $userssubclass;?>">
                                            <a href="<?=base_url()?>panellabels" ><i class="gi gi-user sidebar-nav-icon"></i>Requisition Item by Employee</a>
                                        </li>
										<li class="hidden<?php //echo $userssubclass;?>">
                                            <a href="<?=base_url()?>panellabels" ><i class="gi gi-user sidebar-nav-icon"></i>Most Requested Item</a>
                                        </li>
										<li class="hidden<?php //echo $userssubclass;?>">
                                            <a href="<?=base_url()?>panellabels" ><i class="gi gi-user sidebar-nav-icon"></i>Current Inventory Status</a>
                                        </li>
										
									</ul>
								</li>
								<!-- Settings-->
								<li class="<?php echo $settingsclass;?>">
                                    <a href="#" class="sidebar-nav-menu"><i class="fa fa-chevron-left sidebar-nav-indicator sidebar-nav-mini-hide"></i><i class="fa fa-gear sidebar-nav-icon"></i><span class="sidebar-nav-mini-hide">Settings</span></a>
                                    <ul>
										<li>
                                            <a  class="<?php echo $customizereportclass;?>" href="<?=base_url()?>customreport" ><i class="gi gi-group sidebar-nav-icon"></i>Customize Report</a>
                                        </li>
										<li>
                                            <a  class="<?php echo $warehouseclass;?>" href="<?=base_url()?>warehouse" ><i class="gi gi-user sidebar-nav-icon"></i>Warehouse</a>
                                        </li>
										<li>
                                            <a class="<?php echo $suppliersclass;?>" href="<?=base_url()?>suppliers" ><i class="fa fa-cubes sidebar-nav-icon"></i>Suppliers</a>
                                        </li>
									
										<li>
                                            <a  class="<?php echo $employeesclass;?>" href="<?=base_url()?>employees" ><i class="gi gi-group sidebar-nav-icon"></i>Employees</a>
                                        </li>
										<li>
                                            <a  class="<?php echo $userssubclass;?>" href="<?=base_url()?>users" ><i class="gi gi-user sidebar-nav-icon"></i>Users</a>
                                        </li>
										
										<li class="hidden<?php //echo $userssubclass;?>">
                                            <a href="<?=base_url()?>employees" ><i class="gi gi-settings sidebar-nav-icon"></i>Settings</a>
                                        </li>
										
										
									</ul>
								</li>
								
															
										
                            </ul>
							
							
							
                            <!-- END Sidebar Navigation -->

                        </div>
                        <!-- END Sidebar Content -->
                    </div>
                    <!-- END Wrapper for scrolling functionality -->

                    <!-- Sidebar Extra Info -->
                    <div id="sidebar-extra-info" class="sidebar-content sidebar-nav-mini-hide">
                        
                        <div class="text-center">
                            
                            <small> &copy; <a href="http://chedro1.com" target="_blank">CHARMS v2</a><br>This is a CHED RO1 Initiative and Not For Sale.</small>
                        </div>
                    </div>
                    <!-- END Sidebar Extra Info -->
                </div>
                <!-- END Main Sidebar -->