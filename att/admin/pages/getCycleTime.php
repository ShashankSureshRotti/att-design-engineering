<?php
    $servername = "localhost";
    $username = "root";
    $password = "";
    $dbname = "att";
    
    $conn = mysqli_connect($servername, $username, $password, $dbname);
    
    if (mysqli_connect_errno($conn)) {
        echo "Failed to connect to MySQL: " . mysqli_connect_error();
    }

    $data[] = array('Service', 'Value');
    $sql = "SELECT * FROM pie_chart";
    $result = mysqli_query($conn, $sql);
    
    while( $row = mysqli_fetch_assoc($result)){ 
      
      $data[] = array($row['name'], (int)$row['value']);
      
    }

    echo json_encode($data);
?>
