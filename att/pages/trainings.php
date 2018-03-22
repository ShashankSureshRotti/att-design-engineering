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
                                <h4><i class="fa fa-graduation-cap fa-fw" style="padding-right: 30px"></i> TRAININGS</h4>
                            </div>
                            <div class="col-xs-6">                                    
                                <div class="form-inline pull-right">

                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="panel-body">

                        <h3 style="text-align: center">Coming Soon ...</h3>

                    </div>
                </div>
            </div>
            
        </div>
        
        <?php include "../includes/footer.php"; ?>
    </body>
</html>