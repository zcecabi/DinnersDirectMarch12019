<?php

session_start();
require_once("dbConnect.php");
$db_handle = new DBConnect();
$conn = $db_handle -> connectDB();

if($_SERVER['REQUEST_METHOD']=$_POST){
    $delivery = $_POST['dt'];
}

if(isset($_SESSION["cart_item"])){

    foreach ($_SESSION["cart_item"] as $item => $value ){
        echo $item." => ".$value. "<br>";
        $item_id = $_SESSION["cart_item"][$item]['ID'];

        $item_quantity = $_SESSION["cart_item"][$item]['quantity'];

        $item_price = $_SESSION["cart_item"][$item]['price'];

        $item_date = $delivery;

        $query = "INSERT INTO ordersthis (item_id, quantity, price, time_date) " .
          "VALUES ('$item_id', '$item_quantity', '$item_price', '$item_date')";
        mysqli_query($conn, $query);

          //$value is the array that has the information
          //under foreach loop we can access the array one by one
          //array_walk_recursive($value,"myfunction"); //this one helps us visualise the array to debug

      }
}

