<?php

$host = "localhost";
$user = "root";
$password = "srijanlovessagnik";
$database="billing_system";

$conn = new mysqli($host, $user, $password, $database);

if($conn->connect_error){
    die("Connection failed:" .$conn->connect_error);
}
?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Billing System</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.6/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-4Q6Gf2aSP4eDXB8Miphtr37CMZZQ5oXLH2yaXMJ2w8e2ZtHTl7GptT4jmndRuHDT" crossorigin="anonymous">
    <link rel="stylesheet" type="text/css" href="../Main/main.css">
    <link rel="stylesheet" type="text/css" href="./productlist.css">
</head>
<body id="bs-ovr">
    <div class="flex-container">
        <div class="container-fluid"> 
            <header class="d-flex justify-content-center py-3 main-header"> 
                <ul class="nav nav-pills"> 
                    <li class="nav-item"><a href="../Main/main.php" class="nav-link" aria-current="page">Billing</a></li>
                    <li class="nav-item"><a href="/DBMS%20Project/Products/product.html" class="nav-link">Products</a></li>
                    <li class="nav-item"><a href="/DBMS%20Project/CustomerList/customer.php" class="nav-link">Billing History</a></li>
                    <li class="nav-item"><a href="#" class="nav-link  active">Products List</a></li>
                    <li class="nav-item"><a href="/DBMS%20Project/About/about.html" class="nav-link">About</a></li> 
                </ul> 
            </header> 
        </div>

        <div class="body-container">
            <!-- <?php echo $msg;?> -->
            <h1 class="mt-4">Products Record</h1>
            <br>
            <h1>Total Quantity Sold: <?php 
                $sql = "SELECT SUM(SellingQ) AS total FROM product_list";
                $result = $conn->query($sql);

                if ($result->num_rows > 0) {
                $row = $result->fetch_assoc();
                $sum = $row["total"];
                echo $sum;
                } else {
                $sum = 0;
                }
            ?> </h1>
            <br>
            <table class="table table-bordered">
                <thead>
                    <tr>
                        <th scope="col">Product ID</th>
                        <th scope="col">Product Name</th>
                        <th scope="col">Price</th>
                        <th scope="col">Quantity Sold</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                    // $retrieve1 = "CREATE VIEW productList AS SELECT * FROM product_list"; --Write in Exam Sheet
                    $retrieve = "SELECT * FROM product_list";
                    $result=mysqli_query($conn,$retrieve);
                    while ($row = $result->fetch_assoc()):
                    ?>
                        <tr>
                            <td th scope="row"><?php echo $row['ProductID']; ?></td>
                            <td><?php echo $row['ProductName']; ?></td>
                            <td><?php echo $row['ProductPrice']; ?></td>
                            <td><?php echo $row['SellingQ']; ?></td>
                        </tr>
                    <?php endwhile; ?>
            </tbody>
            </table>
        
        </div>
        
    </div>
    <script src="../Main/main.js"></script>
</body>
</html>