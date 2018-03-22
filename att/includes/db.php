<?php
    $servername = "localhost";
    $username = "root";
    $password = "root";
    $dbname = "att";
    
    $conn = mysqli_connect($servername, $username, $password, $dbname);
    
    if (mysqli_connect_errno($conn)) {
        echo "Failed to connect to MySQL: " . mysqli_connect_error();
    }
    
    /*
    try {
        
        $conn = new PDO("mysql:host=$servername;dbname=$dbname", $username, $password);
        // set the PDO error mode to exception
        $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        
        echo "Connected successfully"; 
        
    }
    catch(PDOException $e)
    {
        echo "Connection failed: " . $e->getMessage();
    }
    */
?>