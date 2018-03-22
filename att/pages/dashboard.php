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
        
        <script type="text/javascript">
          google.charts.load('current', {'packages':['bar']});
          google.charts.setOnLoadCallback(drawOTPChart);
          google.charts.setOnLoadCallback(drawCycleTimeChart);
          google.charts.setOnLoadCallback(drawProductivityChart);

          function drawOTPChart() {

            var jsonData = $.ajax({
              url: "getOTP.php",
              dataType: "json",
              async: false
              }).responseText;

            var data = google.visualization.arrayToDataTable(
              $.parseJSON(jsonData)
            );

            var options = {
                height: 250,
                bar: {groupWidth: "70%"},
            };

            var chart = new google.charts.Bar(document.getElementById('chart_OTP'));

            chart.draw(data, google.charts.Bar.convertOptions(options));
          }
        
          function drawCycleTimeChart() {

            var jsonData = $.ajax({
              url: "getCycleTime.php",
              dataType: "json",
              async: false
              }).responseText;

            var data = google.visualization.arrayToDataTable(
              $.parseJSON(jsonData)
            );

            var options = {
                height: 200, 
                legend: {position: 'none'}
            };

            var chart = new google.charts.Bar(document.getElementById('chart_CycleTime'));

            chart.draw(data, google.charts.Bar.convertOptions(options));
          }
        
          function drawProductivityChart() {

            var jsonData = $.ajax({
              url: "getProductivity.php",
              dataType: "json",
              async: false
              }).responseText;

            var data = google.visualization.arrayToDataTable(
              $.parseJSON(jsonData)
            );

            var options = {
                height: 200, 
                legend: {position: 'none'},
                isStacked: true,

                series: {
                   0:{color:'#8ec127'},
                   1:{color:'#d41243'},
                   2:{color:'#f47835'},
                   3:{color:'#a200ff'},
                   4:{color:'#00aedb'},
                   5:{color:'#66cc66'},
                   6:{color:'#6b7a8f'}
                 },            
            };

            var chart = new google.charts.Bar(document.getElementById('chart_Productivity'));

            chart.draw(data, google.charts.Bar.convertOptions(options));
          }
      </script>     
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
                    <!-- TopMost Cards -->
                    <div class="row">
                        <div class="col-md-3" style="padding:0;">
                          <div class="card">
                            <div class="card-green">
                                <h4><b>Approvals</b></h4>
                              <p><span style="font-size: 40px; font-weight: 600">21</span> pending</p> <hr><a href="#">View More <i class="fa fa-chevron-circle-right"></i></a>
                                <div class="card-icon">
                                  <img src="../admin/dist/img/user.svg" height="100px"/>        
                                </div>
                            </div>                      
                          </div>                   
                        </div>
                        <div class="col-md-3" style="padding-right:0;">
                          <div class="card">
                            <div class="card-yellow">

                                <h4><b>Tools</b></h4>
                              <p><span style="font-size: 40px; font-weight: 600">75</span> total</p>
                              <hr>
                              <a href="#">View More <i class="fa fa-chevron-circle-right"></i></a> 
                                <div class="card-icon">
                                  <img src="../admin/dist/img/card_settings.svg" height="100px"/>
                                </div>

                            </div>                      
                          </div>              
                        </div>
                        <div class="col-md-3" style="padding-right:0;">
                          <div class="card">
                            <div class="card-orange">
                              <h4><b>Services</b></h4>
                              <p><span style="font-size: 40px; font-weight: 600">4</span> pending</p><hr>
                              <a href="#">View More <i class="fa fa-chevron-circle-right"></i></a>                          
                              <div class="card-icon">
                                <img src="../admin/dist/img/share.svg" height="100px"/>        
                              </div>
                            </div>                      
                          </div>
                        </div>
                        <div class="col-md-3">
                          <div class="card">
                            <div class="card-blue">

                                <h4><b>Something Cool</b></h4>
                              <p><span style="font-size: 40px; font-weight: 600">15</span> pending</p> <hr>
                              <a href="#">View More <i class="fa fa-chevron-circle-right"></i></a>    
                                <div class="card-icon">
                                  <img src="../admin/dist/img/cool.svg" height="100px"/>        
                                </div>
                            </div>                      
                          </div>
                        </div>
                    </div>
                    <!-- OneTime Performance Graph -->
                    <div class="row">
                        <div class="col-md-12">
                          <div class="panel panel-default">
                            <div class="panel-heading">
                              <h5><i class="fa fa-calendar"></i> On Time Performance</h5>                            
                            </div>
                            <div class="panel-body" id="chart_OTP"></div>
                          </div>
                        </div>
                    </div>
										<!-- CycleTime Graph -->
										<div class="row">
												<div class="col-md-12">
												</div>
										</div>
                </div>
            </div>
            
        </div>
        
        <?php include "../includes/footer.php"; ?>
    </body>
</html>