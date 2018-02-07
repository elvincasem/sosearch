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