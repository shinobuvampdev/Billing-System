<?php
$host = "localhost";
$user = "root";
$password = "srijanlovessagnik";
$database="billing_system";

$custName = $_POST['fname'];
$mbno = $_POST['mbno'];
$pID = $_POST['p-ID'];
$quantity = $_POST['pquantity'];
$tPrice = $_POST['t-price'];

mysqli_report(MYSQLI_REPORT_ERROR | MYSQLI_REPORT_STRICT);
$conn = new mysqli($host, $user, $password, $database);

if($conn->connect_error){
    die("Connection failed:" .$conn->connect_error);
}

$stmt = $conn->prepare("Insert INTO customer_list(CustName, MobileNo, ProductID, Quantity, TotalPrice)
values (?,?,?,?,?)");
$stmt->bind_param("sisii", $custName, $mbno, $pID, $quantity, $tPrice);
echo("Bill Added");
$stmt->execute();
$stmt->close();
$conn->close();

?>