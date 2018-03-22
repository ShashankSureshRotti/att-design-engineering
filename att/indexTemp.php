<?php 
    /* Main page with two forms: sign up and log in */
    require 'db.php';
    session_start();
    if(isset($_SESSION['logged_in'])) {
        if($_SESSION['logged_in'] == 1) {
            header("location: ./pages/home.php");
        }
    }
?>

    <!DOCTYPE html>
    <html>
    <head>
        <?php ob_start();?>
        <meta charset="utf-8">
        <meta name="description" content="AT&T Design Engineers">
        <meta name="author" content="AT&T Proprietary"> 
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>AT&amp;T | Design Engineering</title>
        
        <!-- Custom CSS Stylesheet -->
        <?php include 'css/css.html'; ?>
    </head>


<body>
    
    
    <div class="form">
      <img src="dist/img/home_logo.svg" style="margin-bottom: 20px;">
      <ul class="tab-group">
        <li class="tab"><a href="#signup">Sign Up</a></li>
        <li class="tab active"><a href="#login">Log In</a></li>
      </ul>
      
      <div class="tab-content">

         
       
      </div><!-- tab-content -->
    </div> <!-- /form -->
    
    
    
    <script src='http://cdnjs.cloudflare.com/ajax/libs/jquery/2.1.3/jquery.min.js'></script>
    <script src="js/index.js"></script>
</body>
</html>