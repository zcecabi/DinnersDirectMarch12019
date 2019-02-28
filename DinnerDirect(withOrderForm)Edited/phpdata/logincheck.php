<?php

//making this a function

require_once('databasephp.php');
session_start();

//ALTER THE TABLE DEFAULT VALUES FOR ALL THE REQUIRED COLUMNS 05/02/2019
mysqli_query($link,"ALTER TABLE customers
/*ALTER COLUMN store_id SET DEFAULT NULL,
ALTER COLUMN address_id SET DEFAULT NULL,
ALTER COLUMN active SET DEFAULT '1',
ALTER COLUMN create_date SET DEFAULT CURRENT_TIMESTAMP*/
))");

//$firstName = $_POST['first_name'] ?? '1'; //dataphp 7.0
//$familyName = $_POST['last_name'] ?? '1';
$emailSql=$_POST['email']; //want to retrieve email
$passwordSQL=$_POST['password'];
/*$qryAdd = "INSERT INTO customer (first_name, last_name, email) VALUES (";
$qryAdd .= "'" . $firstName . "', '" . $familyName . "', '" . $emailSql . "')";*/

$qryFind = "SELECT * FROM customers ";
$qryFind .= " WHERE password = '" . $passwordSQL ."' AND email = '" . $emailSql . "'";

$connection = connectToDb();

//Check if the name exists
$result = mysqli_query($connection, $qryFind);
if (empty($result)){
    echo "The result is empty";
}
if (mysqli_num_rows($result) > 0) {
    echo "You are Logged In";
    $user = mysqli_fetch_assoc($result);
    echo "Welcome";
    echo $user['first_name'];
    echo $user['last_name'];
    $userID=$user['customerID'];
    $_SESSION['userID']=$userID;
    echo $userID; //test to make sure customer id in sql database corresponds
    //header('Location: http://localhost/DinnersDirecHuiEn/startbootstrap-shop-homepage-gh-pages/index.html');
    //exit;
} else {
        echo "Cannot find the selected user. Please try again or create a new account.";
        echo "$emailSql, $passwordSQL";
        closeDb($connection);
}
?>
<meta http-equiv="refresh" content="1;url=../index.html">
