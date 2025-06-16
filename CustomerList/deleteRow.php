<?php
$id = $_POST["id"];

$host = "localhost";
$user = "root";
$password = "srijanlovessagnik";
$database="billing_system";

$conn = new mysqli($host, $user, $password, $database);

if($conn->connect_error){
    die("Connection failed:" .$conn->connect_error);
}

$sql = "DELETE FROM customer_list WHERE CustID=$id";
if ($conn->query($sql) === TRUE) {
  echo "Record deleted successfully";
} else {
  echo "Error deleting record: " . $conn->error;
}
$conn->close();
?>