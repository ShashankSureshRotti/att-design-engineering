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


    $data[] = array("", "Create Technical Notes", "Customer LAN Migration", "Disco IP Address", "Other", "RDS Completed Order", "Return IP Address", "Site Completion by ND", "BCEC", "Review for Network Impact", "Order Validation", "Data Staging", "Change Process Order LE", "Update Config", "TID", "T and T", "Screen for Batch Script", "Review for Network Impact", "Provide Physical site Design", "Provide Config Instructions", "Modify SDD", "LMAC", "Create SDP", "Create RTR Configs", "Create EL", "Create and Execute Batch Script", "AH and Other");


   


    $sql = "SELECT * FROM completed_avpn WHERE TaskCompletedBY = '{$name}'";
    $result = mysqli_query($conn, $sql);
    
    $row = mysqli_fetch_assoc($result);
    $data[] = array('AVPN', (float)$row['Create_Technical_Notes'], (float)$row['Customer_LAN_Migration'], (float)$row['Disco_IP_Address'], (float)$row['Other'], (float)$row['RDS_Completed_Order'], (float)$row['Return_IP_address'], (float)$row['Site_Completion_by_ND'], 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0);



    $sql = "SELECT * FROM completed_evpn WHERE TaskCompletedBY = '{$name}'";
    $result = mysqli_query($conn, $sql);
    
    $row = mysqli_fetch_assoc($result);
    $data[] = array('EVPN', (float)$row['Create_Technical_Notes'], 0, (float)$row['Disco_IP_address'], 0, 0, 0, 0, (float)$row['BCEC'], (float)$row['Review_for_Network_Impact'], 0, 0 ,0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0);




    $sql = "SELECT * FROM completed_flex WHERE TaskCompletedBY = '{$name}'";
    $result = mysqli_query($conn, $sql);
    
    $row = mysqli_fetch_assoc($result);
    $data[] = array('Flexware', 0, 0, 0, 0, 0, 0, 0, 0, 0, (float)$row['Order_Validation'], (float)$row['Data_Staging'], (float)$row['Change_Process_Order_LE'], 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0);

    $sql = "SELECT * FROM completed WHERE TaskCompletedBY = '{$name}'";
    $result = mysqli_query($conn, $sql);
    
    $row = mysqli_fetch_assoc($result);
    $data[] = array('MRS', 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, (float)$row['Update_Config'], (float)$row['TID'], (float)$row['T_and_T'], (float)$row['Screen_for_Batch_Script'], (float)$row['Review_for_network_Impact'], (float)$row['Provide_Physical_site_Design'], (float)$row['Provide_Config_Instructions'], (float)$row['Modify_SDD'], (float)$row['LMAC'], (float)$row['Create_SDP'], (float)$row['Create_RTR_Configs'], (float)$row['Create_EL'], (float)$row['Create_and_Execute_Batch_Script'], (float)$row['AH_and_other']);
 
//	5   Update_Config	
//	6	TID	
//	7	T_and_T
//	8	Screen_for_Batch_Script	
//	9	Review_for_network_Impact	
//	10	Provide_Physical_site_Design
//	11	Provide_Config_Instructions	
//	12	Modify_SDD	
//	13	LMAC	
//	14	Create_SDP	
//	15	Create_RTR_Configs
//	16	Create_EL	
//	17	Create_and_Execute_Batch_Script
//	18	AH_and_other








    
    echo json_encode($data);
?>
