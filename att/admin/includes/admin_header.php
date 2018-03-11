<?php ob_start();?>
<?php
    /* Displays user information and some useful messages */
    session_start();

    // Check if user is logged in using the session variable
    if ( ($_SESSION['logged_in'] != 1) ) {

        $_SESSION['message'] = "You must Log in to access this page!";
        header("location: ../../error.php"); 
      
    } else {
        //check for accesstype
        if ($_SESSION['access_type'] != 'Admin'){
            
            $_SESSION['message'] = "You must be an Admin to access this page!";
        
            header("location: ../../error.php"); 
        } else {
        
            // Makes it easier to read
            $first_name = $_SESSION['first_name'];
            $last_name = $_SESSION['last_name'];
            $email = $_SESSION['email'];
            $active = $_SESSION['active_status'];
            $full_name = $first_name." ".$last_name;
        }
    }


    
?>
<meta charset="utf-8">
<meta name="description" content="AT&T Design Engineers">
<meta name="author" content="AT&T Proprietary"> 
<meta name="viewport" content="width=device-width, initial-scale=1">

<title>AT&amp;T | Design Engineering</title>

<!-- Bootstrap Latest compiled and minified CSS -->
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">

<!-- Custom CSS Stylesheet -->
<link rel="stylesheet" href="../dist/css/admin_styles.css">

<!-- Font-Awesome integration -->
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">

<!-- Custom google font LATO -->
<link  rel="stylesheet" href="https://fonts.googleapis.com/css?family=Lato">

<!-- Integration of Jquery DataTables -->
<link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/v/bs/jq-3.2.1/dt-1.10.16/fh-3.1.3/r-2.2.1/datatables.min.css"/>

<!-- PHP connect to database -->
<?php include "../includes/db.php";?>