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

<?php 
        
    if ($_SERVER['REQUEST_METHOD'] == 'POST') 
    {
        if (isset($_POST['login'])) { //user logging in

            require 'login.php';

        }

        elseif (isset($_POST['register'])) { //user registering

            require 'register.php';

        }
    }
        
?>
<body>
    
    
    <div class="form">
      <img src="dist/img/home_logo.svg" style="margin-bottom: 20px;">
      <ul class="tab-group">
        <li class="tab"><a href="#signup">Sign Up</a></li>
        <li class="tab active"><a href="#login">Log In</a></li>
      </ul>
      
      <div class="tab-content">

         <div id="login">   
          <h1>Welcome Back!</h1>
          
          <form action="index.php" method="post" autocomplete="off">
          
            <div class="field-wrap">
            <label>
              ATT UID<span class="req">*</span>
            </label>
            <input type="text" required autocomplete="off" name="attUID"/>
          </div>
          
          <div class="field-wrap">
            <label>
              Password<span class="req">*</span>
            </label>
            <input type="password" required autocomplete="off" name="password"/>
          </div>
          
          <p class="forgot"><a href="forgot.php">Forgot Password?</a></p>
          
          <button class="button button-block" name="login">Log In</button>
          
          </form>

        </div>
          
        <div id="signup">   
          <h1>Sign Up</h1>
          
          <form action="index.php" method="post" autocomplete="off">
          
          <div class="top-row">
            <div class="field-wrap">
              <label>
                First Name<span class="req">*</span>
              </label>
              <input type="text" required autocomplete="off" name='firstname' />
            </div>
        
            <div class="field-wrap">
              <label>
                Last Name<span class="req">*</span>
              </label>
              <input type="text"required autocomplete="off" name='lastname' />
            </div>
          </div>

          <div class="field-wrap">
            <label>
              ATT UID<span class="req">*</span>
            </label>
            <input type="text"required autocomplete="off" name='attUID' />
          </div>
        
        <div class="field-wrap">
            <label>
              Email<span class="req">*</span>
            </label>
            <input type="email"required autocomplete="off" name='email' />
          </div>
          
          <div class="field-wrap">
            <label>
              Set A Password<span class="req">*</span>
            </label>
            <input type="password"required autocomplete="off" name='password'/>
          </div>
          
          <button type="submit" class="button button-block" name="register">Register</button>
          
          </form>

        </div>
      </div><!-- tab-content -->
    </div> <!-- /form -->
    
    
    
    <script src='http://cdnjs.cloudflare.com/ajax/libs/jquery/2.1.3/jquery.min.js'></script>
    <script src="js/index.js"></script>
</body>
</html>