<?php
    /* Displays user information and some useful messages */
    session_start();

    // Check if user is logged in using the session variable
    if ( $_SESSION['logged_in'] != 1 ) {
      $_SESSION['message'] = "You must log in before viewing your profile page!";
      header("location: ../error.php");    
    }
    else {
        // Makes it easier to read
        $att_uid = $_SESSION['att_uid'];
        $first_name = $_SESSION['first_name'];
        $last_name = $_SESSION['last_name'];
        $email = $_SESSION['email'];
        $active = $_SESSION['active_status'];
    }
?>

<!DOCTYPE html>
<html lang="en">

    <head>
        <?php include "../includes/header.php"; ?>        
    </head>
    
    <body>
        
	   <!-- Navigation Panel -->
		<nav class="navbar navbar-inverse navbar-fixed-top">
		  <div class="container-fluid">
			<div class="navbar-header">
			  <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#myNavbar">
				<span class="icon-bar"></span>
				<span class="icon-bar"></span>
				<span class="icon-bar"></span>                        
			  </button>
			  <a class="navbar-brand" href="#"><img src="../dist/img/home_logo.svg" style="height: 36px"></a>
			</div>
			<div class="collapse navbar-collapse" id="myNavbar">
			  <ul class="nav navbar-nav navbar-right">
                  <li><a href="#"><i class="fa fa-user-circle"></i></a></li>
			  </ul>
			</div>
		  </div>
		</nav>
        <!-- End of Nav-Panel -->
        
        <div id="wrapper">
            
            <!-- Side navigation -->
            <div class="sidenav">
                <div class="user-block">
                    <!-- Profile picture -->
                    <img src="../dist/img/nobody.jpg" class="user">
                    <!-- Name -->
                    <h3><?php echo $first_name." ".$last_name; ?></h3>
                    <!-- Designation -->
                    <h5>Static Till Now</h5>
                    <!-- Status Message -->
                    <h6>This is a status message!</h6>
                   
                </div>

<!--
                <form class="search-form" action="#" style="margin:auto;padding: 8px;max-width:100%">
                    <input type="text" placeholder="Search..." name="search">
                    <button type="submit"><i class="fa fa-search"></i></button>
                </form>                     
-->

                <div >
                    <a href="home.php"><i class="fa fa-home fa-fw" style="font-size: 24px"></i> HOME</a><hr>
                    <a href="dashboard.php"><i class="fa fa-tachometer fa-fw" style="font-size: 24px"></i> DASHBOARD</a><hr>
                    <a href="dss.php"><i class="fa fa-file-excel-o fa-fw" style="font-size: 24px"></i> DSS</a><hr>
                    <a href="tools.php"><i class="fa fa-cogs fa-fw" style="font-size: 24px"></i> TOOLS</a><hr>
                    <a href="trainings.php"><i class="fa fa-graduation-cap fa-fw" style="font-size: 24px"></i> TRAININGS</a><hr>
                </div>

                <div class="sidenav-color-block-2">
                    <div style="margin-bottom: 80px; text-align: center">
                        <button type="button" class="btn-custom-left"><i class="fa fa-cog fa-fw"></i> SETTING</button>
                        <button type="button" class="btn-custom-right" onclick="location.href='../logout.php';"><i class="fa fa-sign-out fa-fw"></i> SIGNOUT</button>
                    </div>
                    <img src="../dist/img/AT&T_logo_white.svg" style="height: 24px">             


                    <div style="text-align: center;">
                        <a href="#">TERMS</a><h5>|</h5>
                        <a href="#">PRIVACY</a><h5>|</h5>
                        <a href="#">HELP</a><h5>|</h5>
                        <a href="#">ABOUT</a>
                    </div>
                </div>
            </div>
          
            <!-- Page content -->
            <div id="page-content-wrapper">
                <div class="container-fluid">
                    <div class="panel panel-default">
                        <div class="panel-heading">
                            <div class="row">
                                <div class="col-xs-6">
                                    <h4><i class="fa fa-file-excel-o fa-fw" style="padding-right: 30px"></i> DSS</h4>
                                </div>
                                <div class="col-xs-6">                                    
                                    <div class="form-inline pull-right">
																			<a href="">Import RDS</a> | <a href="">Import DSS</a>
                                    </div>
                                </div>
                            </div>
                        </div>
                        
                        <div class="panel-body">
													<div class="row">
														<div class="col-md-6">
															<form class="form-inline">
																<select class="form-control">
																	<option value="">Select LE</option>
																	<?php 
																		$sql = "SELECT * FROM users";
																		$result = mysqli_query($conn, $sql);
																		while($row = mysqli_fetch_assoc($result)) {
																			$name = $row['first_name']." ".$row['last_name'];
																			
																			echo "<option value='{$name}'>{$name}</option>";
																			
																		}
																	
																	?>
																</select>
																<select class="form-control">
																	<option value="">Select Customer</option>
																	<?php //a query to the DSS table?>
																</select>
																<button type="submit" class="btn btn-info">Go</button>
															</form>
														</div>
														<div class="col-md-6">
															<form class="form-inline pull-right">
																<input class="form-control" type="text" placeholder="Search for Customer">
																<button type="submit" name="custSearch" class="btn btn-info"><i class="fa fa-search"></i></button>
															</form>
														</div>
													</div>
                         	<div class="row test">
                            <table id="dssTable" class="table" cellspacing="0" width="100%">
															<hr>    
                                <thead>
																	<tr>
																		<th rowspan="2">Note</th>
																		<th rowspan="2">ISR#</th>
																		<th rowspan="2">Site</th>
																		<th rowspan="2">Region</th>
																		<th rowspan="2">GRC</th>
																		<th rowspan="2">Site Id</th>
																		<th rowspan="2">Hostname</th>
																		<th rowspan="2">Resiliency</th>
																		
																		<!--Logical Channel-IP Addresses-->
																	
																		<th>Loopback0</th>
																		<th>WEN CER</th>
																		<th>IPv6 Loopback0</th>
																		<th>IPv6 WEN CER</th>
																	
																		<!--Logical Channel Details-->
																	
																		<th>VPN Name</th>
																		<th>VPN GRC</th>
																		<th>CIR</th>
																		<th>CE CoS Profile</th>
																		<th>ASN</th>
																		<th>ASN Override</th>
																		<th>ASN Prepend/ Community</th>
																		<th>BVoIP</th>
																		<th>TDM Card</th>
																		<th>Concurrent Calls</th>
																		<th>CUBE Licences</th>
																		<th>SOR Site ID</th>
																		<th>TC#</th>
																		
																		<!--Router Details-->
																		
																		<th>Package Type</th>
																		<th>Chassis</th>
																		<th>IP Address Handling</th>
																		<th>WOOB</th>
																		
																		<!--Port and Access-->
																		
																		<th>Port Type</th>
																		<th>Port Speed</th>
																		<th>Access Speed</th>
																		<th>Electrical Interface</th>
																		
																		<!--Site Information-->
																		
																		<th>Address</th>
																		<th>City</th>
																		<th>State</th>
																		<th>Country</th>
																		
																		<!--Technical Contact Details-->
																		
																		<th>Technical Contact Name</th>
																		<th>Technical Contact Email</th>
																		
																		<!--Others-->
																		<th>RDS FileName</th>
																		<th>RDS Notes</th> 
																		
																	</tr>
                                </thead>                                 

                                <tbody>

                                </tbody>
                            </table>
													 </div>
                        </div>
                        
                    </div>
                </div>
            </div>
            
        </div>
        
        <?php include "../includes/footer.php"; ?>
    </body>
</html>