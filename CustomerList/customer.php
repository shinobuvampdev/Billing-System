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
    <link rel="stylesheet" type="text/css" href="./customeri.css">
</head>
<body id="bs-ovr">
    <div class="flex-container">
        <div class="container-fluid"> 
            <header class="d-flex justify-content-center py-3 main-header"> 
                <ul class="nav nav-pills"> 
                    <li class="nav-item"><a href="/DBMS%20Project/Main/main.php" class="nav-link" aria-current="page">Billing</a></li>
                    <li class="nav-item"><a href="/DBMS%20Project/Products/product.html" class="nav-link">Products</a></li>
                    <li class="nav-item"><a href="#" class="nav-link active">Billing History</a></li>
                    <li class="nav-item"><a href="/DBMS%20Project/Productlist/productlist.php" class="nav-link">Products List</a></li>
                    <li class="nav-item"><a href="/DBMS%20Project/About/about.html" class="nav-link">About</a></li> 
                </ul> 
            </header> 
        </div>

        <div class="body-container">
            <!-- <?php echo $msg;?> -->
            <h1 class="mt-4">Invoice Records</h1>
            <br>
            <table class="table table-bordered">
                <thead>
                    <tr>
                        <th scope="col">ID</th>
                        <th scope="col">Customer Name</th>
                        <th scope="col">Product Name</th>
                        <th scope="col">Quantity</th>
                        <th scope="col">Total Price</th>
                        <th scope="col"></th>

                    </tr>
                </thead>
                <tbody>
                    <?php
                    $retrieve = "SELECT customer_list.CustID, customer_list.Custname, product_list.ProductName, customer_list.Quantity, customer_list.TotalPrice
                      FROM customer_list INNER JOIN product_list ON customer_list.ProductID = product_list.ProductID";
                    $result=mysqli_query($conn,$retrieve);
                    while ($row = $result->fetch_assoc()):
                    ?>
                        <tr>
                            <td th scope="row"><?php echo $row['CustID']; ?></td>
                            <td><?php echo $row['Custname']; ?></td>
                            <td><?php echo $row['ProductName']; ?></td>
                            <td><?php echo $row['Quantity']; ?></td>
                            <td><?php echo $row['TotalPrice']; ?></td>
                            <td><button class="delete-btn" id=<?php echo $row['CustID']; ?>><image src="trash.svg"/></button></td>
                        </tr>
                    <?php endwhile; ?>
            </tbody>
            </table>
    </div>
    </div>    
    <script src="../Main/main.js"></script>
    <script src="customer.js"></script>
</body>
</html>