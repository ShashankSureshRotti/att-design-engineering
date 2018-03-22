<?php 
/* Verifies registered user email, the link to this page
   is included in the register.php email message 
*/
require 'db.php';
session_start();

// Check if user is logged in using the session variable
    if ( $_SESSION['logged_in'] != 1 ) {
      $_SESSION['message'] = "You must log in to activate the Account!";
      $_SESSION['redirect_uri'] = $_SERVER['REQUEST_URI'];
        
      header("location: error.php");    
    }
    else {
        
        if(isset($_SESSION['redirect_uri'])) {
          unset($_SESSION['redirect_uri']);
        }
        // Makes it easier to read
        $first_name = $_SESSION['first_name'];
        $last_name = $_SESSION['last_name'];
        $user_name = $first_name." ".$last_name;
        $email = $_SESSION['email'];
        $active = $_SESSION['active_status'];
        $access_type = $_SESSION['access_type'];
        $att_uid = $_SESSION['att_uid'];
    

// Make sure email and hash variables aren't empty
if(isset($_GET['att_uid']) && !empty($_GET['att_uid']) AND isset($_GET['hash']) && !empty($_GET['hash']))
{
    $att_uid = $mysqli->escape_string($_GET['att_uid']); 
    $hash = $mysqli->escape_string($_GET['hash']); 
    
    // Select user with matching att_uid and hash, who hasn't verified their account yet (active = 0)
    $result = $mysqli->query("SELECT * FROM users WHERE att_uid='$att_uid' AND hash='$hash' AND active_status = 0");

    if ( $result->num_rows == 0 )
    { 
        $_SESSION['message'] = "Account has already been activated or the URL is invalid!";

        header("location: error.php");
    }
    else {
      
        $_SESSION['message'] = "The account has been activated!";
        date_default_timezone_set("Asia/Kolkata");
        $timestamp = date("Y-m-d H:i:s", time());
        
        // Set the user status to active (active = 1)
        $mysqli->query("UPDATE users SET active_status='1', approved_by ='{$user_name}', approved_on = '{$timestamp}' WHERE att_uid='$att_uid'") or die($mysqli->error);
        header("location: success.php");
    }
}
else {
    $_SESSION['message'] = "Invalid parameters provided for account verification!";
    header("location: error.php");
}
      
    }
?>