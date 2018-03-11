<?php
/* Registration process, inserts user info into the database 
   and sends account confirmation email message
 */

// Set session variables to be used on profile.php page
$_SESSION['att_uid'] = $_POST['attUID'];
$_SESSION['email'] = $_POST['email'];
$_SESSION['first_name'] = $_POST['firstname'];
$_SESSION['last_name'] = $_POST['lastname'];

// Escape all $_POST variables to protect against SQL injections
$att_uid = $mysqli->escape_string($_POST['attUID']);
$first_name = $mysqli->escape_string($_POST['firstname']);
$last_name = $mysqli->escape_string($_POST['lastname']);
$email = $mysqli->escape_string($_POST['email']);
$password = $mysqli->escape_string(password_hash($_POST['password'], PASSWORD_BCRYPT));
$hash = $mysqli->escape_string( md5( rand(0,1000) ) );
      
// Check if user with that attuid already exists
$result = $mysqli->query("SELECT * FROM users WHERE att_uid ='{$att_uid}'") or die($mysqli->error());

// We know user email exists if the rows returned are more than 0
if ( $result->num_rows > 0 ) {
    
    $_SESSION['message'] = 'User with this ATT UID already exists!';
    header("location: error.php");
    
}
else { // Email doesn't already exist in a database, proceed...

    // active is 0 by DEFAULT (no need to include it here)
    $sql = "INSERT INTO users (att_uid, first_name, last_name, email, password, hash) " 
            . "VALUES ('$att_uid','$first_name','$last_name','$email','$password', '$hash')";

    // Add user to the database
    if ( $mysqli->query($sql) ){

        $_SESSION['active_status'] = 0; //0 until user activates their account with verify.php
        $_SESSION['logged_in'] = true; // So we know the user has logged in
        $_SESSION['message'] =
                
                 "Confirmation link has been sent to your Manager, please wait until Approved!";

        // Send registration confirmation link (verify.php)
//        $to      = $email;
//        $subject = 'Account Verification ( AT&T Design Engineering )';
//        $headers = "From: developers.arif@gmail.com";
//        $message_body = '
//        Hello '.$first_name.',
//
//        Thank you for signing up!
//
//        Please click this link to activate your account:
//
//        http://localhost/att/verify.php?att_uid='.$att_uid.'&hash='.$hash; 
//      
//        
//
//        mail( $to, $subject, $message_body, $headers);

        header("location: profile.php"); 

    }

    else {
        $_SESSION['message'] = 'Registration failed!';
        header("location: error.php");
    }

}