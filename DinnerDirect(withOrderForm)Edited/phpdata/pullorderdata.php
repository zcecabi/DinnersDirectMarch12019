<?php

require_once('databasephp.php');
$connection = connectToDb();
session_start();

//$srch_term = $_GET['srch-term'] ?? '1'; //PHP 7.0
//$srch= $_GET['srch-term'] ?? '1'; //dataphp 7.0
//echo "$srch";

$userIDpullorderdatainstance=$_SESSION['userID'];//$y is any declared variable
echo $userIDpullorderdatainstance;


$query = "SELECT * FROM orders ord
INNER JOIN customers cus /*alias of cus for customer*/
    on ord.customerID = cus.customerID
WHERE customerID = '" . $userIDpullorderdatainstance."'";


//search database
//check if the variable has not been initalized
$result = mysqli_query($connection, $query);
if (empty($result)){
    exit("databasePhp query failed, the result does not exist.");

}

$user = mysqli_fetch_assoc($result);
if (empty($user)) {

    exit("database Php query failed, result does not exist.");

}
//testing
echo "Successful Search!";

// Free the results from memory
mysqli_free_result($result);

// Close the connection
//mysqli_close($connection);

?>
<html>
<head>

    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>Welcome to Dinners Direct</title>

    <!-- Bootstrap core CSS -->
    <link href="../vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">

    <!-- Custom styles for this template -->
    <link href="../css/shop-homepage.css" rel="stylesheet">

</head>

<body>

<!-- Navigation -->
<nav class="navbar navbar-expand-lg navbar-dark bg-dark fixed-top">
    < class="container">
    <a class="navbar-brand" href="../index.html">Dinners Direct</a>
    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarResponsive" aria-controls="navbarResponsive" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
    </button>
    <div class=index.html" collapse="navbar-collapse" id="navbarResponsive" >
        <ul class="navbar-nav ml-auto">
            <li class="nav-item active">
                <a class="nav-link" href="../index.html">Home
                    <span class="sr-only">(current)</span>
                </a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="../about.html">About</a>
            </li>

            <li class="nav-item">
                <a class="nav-link" href="../MyAccount.html">MyAccount</a>
            </li>

            <li class="nav-item">
                <a class="nav-link" href="../createnewaccount.html">Create a New Account</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="../order.html">Order</a>
                <!--<a class="nav-link text-uppercase text-expanded" href="products.html">Products</a>!-->
            </li>
        </ul>
    </div>
    </div>
</nav>


<!-- Page Content -->
<div class="container">
    <h1> Past Orders</h1>
    <table class="table" >
        <tr>
            <th>Customer ID</th>

        </tr>
        <tr>
            <td><?php echo $user['customerID'] ?></td>
        </tr>

        <tr>
            <th>Order Item ID</th>
        </tr>
        <tr>
            <td><?php echo $user['orderitemID'] ?></td>
        </tr>

        <tr>
            <th>Date Ordered</th>
        </tr>
        <tr>
            <td><?php echo $user['DateOrdered'] ?></td>
        </tr>
        <tr>
            <th>Amount Paid</th>
        </tr>
        <tr>
            <td><?php echo $user['amountPaid'] ?></td>
        </tr>




    </table>
    <div class="row">

    </div>

</div>


<!-- /.container -->


<!-- Bootstrap core JavaScript -->
<script src="../vendor/jquery/jquery.min.js"></script>
<script src="../vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

</body>
</html>











