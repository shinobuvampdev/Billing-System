<?php
$host = "localhost";
$user = "root";
$password = "srijanlovessagnik";
$database="billing_system";

mysqli_report(MYSQLI_REPORT_ERROR | MYSQLI_REPORT_STRICT);
$conn = new mysqli($host, $user, $password, $database);

if($conn->connect_error){
    die("Connection failed:" .$conn->connect_error);
}else{
    $stmt = $conn->prepare("Insert INTO product_list()");
}

?>