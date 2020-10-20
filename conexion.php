<<<<<<< HEAD
<?php
$servername = "localHost";
$database = "masterlend";
$username = "root";
$password = "";
// Create connection
$conn = mysqli_connect($servername, $username, $password, $database);
// Check connection
if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
}
// // echo "Connected successfully";
//  mysqli_close($conn);
=======
<?php
$servername = "localHost";
$database = "masterlend";
$username = "root";
$password = "";
// Create connection
$conn = mysqli_connect($servername, $username, $password, $database);
// Check connection
if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
}
// // echo "Connected successfully";
//  mysqli_close($conn);
>>>>>>> e90219b47302d82c4d9aa683e2636f89eae7be42
?>