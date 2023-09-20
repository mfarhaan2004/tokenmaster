<?php
$host = "localhost";
$username = "login";
$password = "34";
$database = "test";

// Connection
$connection = new mysqli($host, $username, $password, $database);

// connection errors
if ($connection->connect_error) {
    die("Connection failed: " . $connection->connect_error);
}

// Retrieve data 
$APL_NO = $_POST['application-number'];
$NAME = $_POST['name'];
$DEPT = $_POST['department'];

// SQL query to insert data into the 'login' table
$sql = "INSERT INTO login (APL_NO, NAME, DEPT) VALUES ('$APL_NO', '$NAME', '$DEPT')";

if ($connection->query($sql) === TRUE) {
    header("Location: gen.html");
    exit();
} else {
    echo "Error: ". $sql . "<br>" . $connection->error;
}

// Close the database connection
$connection->close();
?>