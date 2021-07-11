<?php echo $header; ?>
              
<body class="index-page sidebar-collapse">
	<div style="background-image:url('<?php echo $baseurl ?>assets/img/bg0.jpg')">
		<!----nav bar ----->
		<nav style="background-color:#9c27b0" class="navbar navbar-color-on-scroll  navbar-expand-lg " color-on-scroll="100" id="sectionsNav">
			<div class="container">
			  <div class="navbar-translate">
				<a class="navbar-brand" href="index.html">
				  <font color="red">Hotline:</font><font color="black">xxxxx.xxx@gmail.com</font> 
			<div class="ripple-container"></div></a>
				<button class="navbar-toggler" type="button" data-toggle="collapse" aria-expanded="false" aria-label="Toggle navigation">
				  <span class="sr-only">Toggle navigation</span>
				  <span class="navbar-toggler-icon"></span>
				  <span class="navbar-toggler-icon"></span>
				  <span class="navbar-toggler-icon"></span>
				</button>
			  </div>
			  <div class="collapse navbar-collapse">
				<ul class="navbar-nav ml-auto">
			 
				<!----profile option----->
				  <li class="dropdown nav-item">
					<a href="#" class="dropdown-toggle nav-link" data-toggle="dropdown">
					  <i class="material-icons">account_circle</i>Profile
					</a>
					<div class="dropdown-menu dropdown-with-icons">
					 
					  <a href="examples/profile-page.html" class="dropdown-item">
						<i class="material-icons">account_circle</i> Profile settings
					  </a>
					  <a href="examples/profile-page.html" class="dropdown-item">
						<i class="material-icons">account_circle</i> Messages
					  </a>
					  <a href="<?php echo $baseurl?>Admin/admin_logout" class="dropdown-item">
						<i class="material-icons">account_circle</i> Logout
					  </a>
				   
					</div>
				  </li>
				
				</ul>
			  </div>
			</div>
		  </nav>

		  <!-----logo here--->
		  <div class="container">
			<div id="uqueue">
				<div >
					<img src="<?php echo $baseurl ?>assets/img/U-QUEUE LOGO.png" height="100px" width="400px" >
				</div>	  
			</div>
			<br>
		  </div>
	  </div>
	
	  <!----Dropdown menu here---->
		<nav class="navbar navbar-expand-lg bg-primary">
		  <div class="container">
		  	<div class="collapse navbar-collapse">
			  <ul class="navbar-nav">
				
				<li class="dropdown nav-item">
				  <a href="#pablo" class="dropdown-toggle nav-link" data-toggle="dropdown">Create</a>
				  <div class="dropdown-menu">
					<a href="#pablo" class="clickme dropdown-item" onclick="fun_create_counter()">Create Counter</a>
					<a href="#pablo" class="dropdown-item" onclick="fun_create_service()">Create Service</a>
				  </div>
				</li>
				<li class="nav-item"><a href="<?php echo $baseurl ?>index.php/admin/show_queue" class="nav-link">Queue</a></li>
				<li class="nav-item"><a href="<?php echo $baseurl ?>index.php/admin/show_services" class="nav-link">Services</a></li>
				<li class="nav-item"><a href="<?php echo $baseurl ?>index.php/admin/show_report" class="nav-link">Report</a></li>

			  </ul>

			</div>
			
		  </div>
		</nav>
	  <?php if(isset($_SESSION['error'])){ ?>

		<div class="text-center text-danger"><?php echo $_SESSION['error']; ?></div>
	  <?php $this->session->sess_destroy(); } ?>
		<!---blog contents--->
		<div class="container">
			<div class="row">
				<div class="col-sm-7">
					<!----card----->
					<?php $i=0; ?>
					<?php foreach($counters as $counter){ ?>
								<div id="counter_card">
									<div id="<?php echo "c".$counter->id; ?>">
									
										<div>
											<div class="card">
											  <div class="card-body ">
												<h6 class="card-category text-danger" align="right">
												  <!--<img height="20px" width="20px" src=">-->
												  <?php echo $counter->status; ?>
												</h6>
												<h3 class="card-title">
												  Counter No: <?php echo $counter->counter_no; ?>
												</h3>
											  </div>
											  <div class="card-footer ">
												<div class="author">
												  <a href="#pablo">
													<span><font color="blue" >Counter assigned to </font>: <?php echo $counter->sdc; ?></span>
												  </a>
												</div>
												<div class="stats ml-auto">
													Total Served: <?php echo $counter->total_served; ?>
												</div>
												
												<div class="stats ml-auto">
													<button id="<?php echo "btn".$i; ?>" onclick="fun(<?php echo $counter->id?>)" value="<?php echo $counter->id?>">View Counter Details</button>
												</div>
											  </div>
											</div>
										</div>
									</div>
									
									<div id="<?php echo "viewc".$counter->id; ?>" class="card fixed" style="display:none;">
										<div class="card-body">
											<div class="stats ml-auto" align="right">
												<button id="<?php echo "btn2".$i; ?>" onclick="fun2(<?php echo $counter->id?>)" value="<?php echo $counter->id?>">close</button>
											</div>
											<h2>Counter No: <?php echo $counter->counter_no; ?></h2>
											<p>Counter ID:<?php echo $counter->id; ?></p>
											<h5>Services Assigned:</h5>
											<div class="scrollmenu">
											  <a href="#">Service Type 1</a>
											  <a href="#">Service Type 2</a>
											  <a href="#">Service Type 3</a>
											  <a href="#">Service Type 4</a>
											  <a href="#">Service Type 5</a>
											  <a href="#">Service Type 6</a>
											</div>
											<br>
											<h6><b>Assigned to:</b><?php echo $counter->sdc; ?></h6>
											<h6><b>Total served:</b><?php echo $counter->total_served;?></h6>
											<h6><b>Start time:</b><?php echo $counter->start_time;?></h6>
											<h6><b>End time:</b><?php echo $counter->end_time;?></h6>
											<h6><b>Status:</b><?php echo $counter->status;?><img height="20px" width="20px" src="assets/img/red_dot.png"></h6>
											<br><br>
											<div align="right">
												<button  class="btn btn-primary">Edit<div class="ripple-container"></div></button>	
												<button  class="btn btn-primary">Delete<div class="ripple-container"></div></button>
											</div>
										</div>
									 </div>									
									
								</div>
					<?php 
					
						$i=$i+1;
					} ?>
				</div>
				<div class="col-sm-4">
					<!----Notice---->
					<div class="card card-pricing card-background" style="background-image: url('<?php echo $baseurl; ?>assets/img/back.jpg')">
					  <div class="card-body">
						<h6 class="card-category text-info">Notice</h6>
						<div id="counter_details" ></div>
							<font color="white">
								<h1>Welcome</h1>
								<p>Hello Admin! Have a good day!</p>
							</font>
						<!---
						<h1 class="card-title"><small>$</small>89</h1>
						<ul>
						  <li><b>100</b> Projects</li>
						  <li><b>5</b> Team Members</li>
						  <li><b>55</b> Personal Contacts</li>
						  <li><b>5.000</b> Messages</li>
						</ul>
						<a href="#pablo" class="btn btn-danger">
						  Get Updated
						</a>
						--->
					  </div>
					</div>
				</div>
			</div>
		</div>
		<div id="create_counter" class="fixed card " style="display:none">
			<div class="card-body">
				<div class="stats ml-auto" align="right">
					<button onclick="closecreate()" >close</button>
				</div>
				<h1>Create Counter</h1>
                 <div class="row justify-content-center">
					<div class="col-lg-6 col-sm-4">
						<form class="form-group" method="post" action="<?php echo $baseurl;?>Admin/create/counter">
							<input type="text" placeholder="Counter number" name='counternum' class="form-control"><br>
							<input type="text" placeholder="Assign SDC" name='sdc' class="form-control">
							<input type="submit" class="btn btn-primary" value="Create">
						</form>
					</div>
                   </div>
				<br>

			</div>
		</div>
		<div id="create_service" class="fixed card " style="display:none">
			<div class="card-body">
				<div class="stats ml-auto" align="right">
					<button onclick="closeservice()" >close</button>
				</div>
				<h1>Create Service</h1>
				<br>
                 <div class="row justify-content-center">
					<div class="col-lg-6 col-sm-4">
						<form class="form-group" method="post" action="<?php echo $baseurl;?>Admin/create/service">
							<input type="text" placeholder="Enter service type" name='servicetype' class="form-control"><br>
							<input type="text" placeholder="Enter Service details" name='servicdetails' class="form-control">
							<input type="submit" class="btn btn-primary">
						</form>
					</div>
                   </div>
				<br>
			</div>
		</div>
		
		
		<div class="fixed1" id="black_back" style="display:none;">
		</div>
		
		
		
	<script>
		function fun(c_id){
			var x=document.getElementById("viewc"+c_id);
			var y=document.getElementById("c"+c_id);
			var z =document.getElementById("black_back");
			z.style.display ="block";
			x.style.display = "block";
			y.style.display = "none";
			
		}
		function fun2(c_id){
			var x=document.getElementById("viewc"+c_id);
			var y=document.getElementById("c"+c_id);
			var z =document.getElementById("black_back");
			z.style.display ="none";
			x.style.display = "none";
			y.style.display = "block"
		}
		function fun_create_counter(){
			var x=document.getElementById("create_counter");
			var z =document.getElementById("black_back");
			x.style.display ="block";
			z.style.display ="block";
			
		}
		function closecreate(){
			var x=document.getElementById("create_counter");
			var z =document.getElementById("black_back");
			x.style.display ="none";
			z.style.display ="none";
		}
		function fun_create_service(){
			var x=document.getElementById("create_service");
			var z =document.getElementById("black_back");
			x.style.display ="block";
			z.style.display ="block";
			
		}
		function closeservice(){
			var x=document.getElementById("create_service");
			var z =document.getElementById("black_back");
			x.style.display ="none";
			z.style.display ="none";
		}
	</script>
  <?php echo $footer; ?>