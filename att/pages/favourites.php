<?php

require_once '../includes/db.php';
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
}

if(isset($_GET['type'], $_GET['id'])) {
  
  $type = $_GET['type'];
  $id = $_GET['id'];
  
  switch($type) {
      
    case 'tool':
       $ins_fav_query =  "INSERT INTO favourites (att_uid, tool_id)
                          SELECT '{$att_uid}', {$id}
                          FROM tools
                          WHERE EXISTS (
                              SELECT tool_id
                              FROM tools
                              WHERE tool_id = {$id})
                          AND NOT EXISTS (
                              SELECT tool_id
                              FROM favourites
                              WHERE att_uid = '{$att_uid}'
                              AND tool_id = {$id})
                          LIMIT 1";
        mysqli_query($conn, $ins_fav_query);
        break;
      
    case 'delete':
      $del_fav_query = "DELETE FROM favourites
                        WHERE att_uid = '{$att_uid}'
                        AND tool_id = {$id}";
      mysqli_query($conn, $del_fav_query);
      break;
      
  }
}

header("Location: tools.php");

?>