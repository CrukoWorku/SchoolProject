<?php
    $servername = "localhost"; //IP ADDRESS sa server
    $username = "root";
    $password = "";
    $dbname = "dbcrud";

    //establish connection to database
    $conn = new mysqli($servername,$username,$password,$dbname);

    if($conn->connect_error){
        die("Opps! an error occured : ".$conn->connect_error);
    }
?>
