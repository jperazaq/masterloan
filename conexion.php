
<?php
$username = "b9321a99880982";
$password = "bdaa56d9";
$servername = "@us-cdbr-east-02.cleardb.com";
$database = "heroku_07d992e5526fdc5";


// Create connection
$conn = mysqli_connect( $username, $password, $servername, $database);
// Check connection
if (!$conn) {
    die("Connection failed: " . mysqli_connect_error($conn));
}
// // echo "Connected successfully";
//  mysqli_close($conn);



?>

<!-- mysql://b9321a99880982:bdaa56d9@us-cdbr-east-02.cleardb.com/heroku_07d992e5526fdc5?reconnect=true -->