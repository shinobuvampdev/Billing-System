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

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Billing System</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.6/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-4Q6Gf2aSP4eDXB8Miphtr37CMZZQ5oXLH2yaXMJ2w8e2ZtHTl7GptT4jmndRuHDT" crossorigin="anonymous">
    <link rel="stylesheet" type="text/css" href="./main.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>
</head>
<body id="bs-ovr">
    <div class="flex-container">
        <div class="container-fluid"> 
            <header class="d-flex justify-content-center py-3 main-header"> 
                <ul class="nav nav-pills"> 
                    <li class="nav-item"><a href="" class="nav-link active" aria-current="page">Billing</a></li>
                    <li class="nav-item"><a href="/DBMS%20Project/Products/product.html" class="nav-link">Products</a></li>
                    <li class="nav-item"><a href="/DBMS%20Project/CustomerList/customer.php" class="nav-link">Billing History</a></li>
                    <li class="nav-item"><a href="/DBMS%20Project/Productlist/productlist.php" class="nav-link">Products List</a></li>
                    <li class="nav-item"><a href="/DBMS%20Project/About/about.html" class="nav-link">About</a></li> 
                </ul> 
            </header> 
        </div>
        
        <div class="billing-container">
            <form action="connect.php" method="post" target="_blank">
                <div class="form-container">
                    <h1 class="billing-header">Billing Information</h1>

                    <div class="form-part">
                        <label for="fname">Name:</label><br>
                        <input type="text" id="fname" name="fname" required><br>
                    </div>
                    <div class="form-part">
                        <label for="mbno">Mobile Number:</label><br>
                        <input type="text" id="mbno" name="mbno" required>
                    </div>
                    <div class="form-part">
                        <label for="fname form-part">Product:</label><br>
                        <div class="dropdown">
                            <button class="dropbtn form-part" id="select-btn"></button>
                            <div class="dropdown-content">
                                <?php
                                    $retrieve = "SELECT ProductName FROM product_list";
                                    $result=mysqli_query($conn,$retrieve);
                                    while ($row = $result->fetch_assoc()):
                                    ?>
                                    <button type="button" class="btn items-btn"><?php echo $row['ProductName']; ?></button>
                                <?php endwhile; ?>
                            </div>
                        </div>
                    </div>

                    <div class="form-part">
                        <label for="p-ID">Product ID:</label><br>
                        <input type="text" id="p-ID" name="p-ID" readonly>
                    </div>

                    <div class="form-part">
                        <label for="p-price">Product Price:</label><br>
                        <input type="text" id="p-price" name="p-price" readonly>
                    </div>

                    <div class="form-part">
                        <label for="pquantity">Product Quantity:</label><br>
                        <input type="text" id="pquantity" name="pquantity" required><br>
                    </div>
                    <div class="form-part totalPrice">
                        <label for="t-price">Total Price:</label><br>
                        <input type="text" id="t-price" name="t-price" readonly>
                    </div>

                    <button type="submit" class="btn btn-primary form-button">Submit</button>
                </div>
            </form>
        </div>
    </div>

    <script type="text/javascript" src="stuff.js"></script>
</body>
</html>