<?php

$pid = $_POST['pid'];
$pname = $_POST['pname'];
$pprice = $_POST['pprice'];


$host = "localhost";
$user = "root";
$password = "srijanlovessagnik";
$database="billing_system";

$conn = new mysqli($host, $user, $password, $database);

if($conn->connect_error){
    die("Connection failed:" .$conn->connect_error);
}else{

    $stmt = $conn->prepare("Insert INTO product_list(ProductID, ProductName, ProductPrice)
    values (?,?,?)");
    $stmt->bind_param("ssi", $pid, $pname, $pprice);
    echo("Product Added");
    $stmt->execute();
    $stmt->close();
    $conn->close();
}

?>