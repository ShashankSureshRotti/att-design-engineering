<!-- Side navigation -->
<div class="sidenav">
    <div class="user-block">
        <!-- Profile picture -->
        <img src="../dist/img/nobody.jpg" class="user">
        <!-- Name -->
        <h3><?php echo $first_name." ".$last_name ;?></h3>
        <!-- Designation -->
        <h5>Administrator</h5>
        <!-- Status Message -->
        <h6>I can modify anything!</h6>
        <hr>
    </div>


    <div style="padding-top: 20px;">
        <a href="../pages/dashboard.php"><i class="fa fa-tachometer fa-fw" style="font-size: 20px"></i> DASHBOARD</a>
        <a href="../pages/manage_users.php"><i class="fa fa-users fa-fw" style="font-size: 20px"></i> MANAGE USERS</a>
        <a href="../pages/manage_tools.php" id="active-menu"><i class="fa fa-cogs fa-fw" style="font-size: 20px"></i> MANAGE TOOLS</a>
    </div>

    <div class="sidenav-color-block">
        <div style="margin-bottom: 120px; text-align: center" id="btnHolder">
            <button type="button" class="btn-switch" onclick="location.href='../../pages/home.php';">HOME</button>
        </div>
        
        <div style="margin-bottom: 80px; text-align: center">
            <button type="button" class="btn-custom-left"><i class="fa fa-cog fa-fw"></i> SETTING</button>
            <button type="button" class="btn-custom-right" onclick="location.href='../../logout.php';"><i class="fa fa-sign-out fa-fw"></i> SIGNOUT</button>
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