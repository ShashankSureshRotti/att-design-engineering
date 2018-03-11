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
        $first_name = $_SESSION['first_name'];
        $last_name = $_SESSION['last_name'];
        $email = $_SESSION['email'];
        $active = $_SESSION['active_status'];
        $access_type = $_SESSION['access_type'];
        $att_uid = $_SESSION['att_uid'];
    }

    switch ($access_type) {
      case 'Admin':
        include "../includes/admin_homepage.php";
        break;
      
      case 'Manager':
        include "../includes/manager_homepage.php";
        break;
      
      default:
        include "../includes/regular_homepage.php";
    }
?>