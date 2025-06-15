<?php
$host = "localhost";
$user = "root";
$password = "srijanlovessagnik";
$database="billing_system";

mysqli_report(MYSQLI_REPORT_ERROR | MYSQLI_REPORT_STRICT);
$conn = new mysqli($host, $user, $password, $database);

if($conn->connect_error){
    die("Connection failed:" .$conn->connect_error);
}

$retrieve = "SELECT ProductID FROM product_list";
$result = mysqli_query($conn,$retrieve);

$data = array();
if ($result->num_rows > 0) {
    while($row = $result->fetch_assoc()) {
        $data[] = $row['ProductID'];
    }
}

$jsonData = json_encode($data);

header('Content-Type: application/json');
echo $jsonData;

?>