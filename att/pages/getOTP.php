<?php
    include "../includes/db.php";
  
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
        $name = $last_name.", ".$first_name;
    }


    $data[] = array("", "Create Technical Notes", "Customer LAN Migration", "Disco IP Address", "Other", "RDS Completed Order", "Return IP Address", "Site Completion by ND");
    $sql = "SELECT * FROM otp_avpn WHERE TaskCompletedBY = '{$name}'";
    $result = mysqli_query($conn, $sql);
    
    $row = mysqli_fetch_assoc($result);
    $data[] = array('Nov - 2017', (float)$row['Create_Technical_Notes'], (float)$row['Customer_LAN_Migration'], (float)$row['Disco_IP_Address'], (float)$row['Other'], (float)$row['RDS_Completed_Order'], (float)$row['Return_IP_address'], (float)$row['Site_Completion_by_ND']);
//    $data[] = array("Disco IP Address", (float)$row['Disco_IP_Address']);
//    $data[] = array("Other", (float)$row['Other']);
//    $data[] = array("RDS Completed Order", (float)$row['RDS_Completed_Order']);
//    $data[] = array("Return IP Address", (float)$row['Return_IP_address']);
//    $data[] = array("Site Completion by ND", (float)$row['Site_Completion_by_ND']);
    
//      
//    $data[] = array($row[''], (int)$row['']);
    $data[] = array('Dec - 2017', (float)$row['Create_Technical_Notes'], (float)$row['Customer_LAN_Migration'], (float)$row['Disco_IP_Address'], (float)$row['Other'], (float)$row['RDS_Completed_Order'], (float)$row['Return_IP_address'], (float)$row['Site_Completion_by_ND']);

    $data[] = array('Jan - 2018', (float)$row['Create_Technical_Notes'], (float)$row['Customer_LAN_Migration'], (float)$row['Disco_IP_Address'], (float)$row['Other'], (float)$row['RDS_Completed_Order'], (float)$row['Return_IP_address'], (float)$row['Site_Completion_by_ND']);
    echo json_encode($data);
?>
