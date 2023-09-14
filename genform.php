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
$APL_NO = $_POST['APL_NO'];
$NAME = $_POST['NAME'];
$DEPT = $_POST['DEPT'];

// SQL query to insert data into the 'login' table
$sql = "INSERT INTO login (APL_NO, NAME, DEPT) VALUES ('$APL_NO', '$NAME', '$DEPT')";

if ($connection->query($sql) === TRUE) {
    echo "Record added successfully";
} else {
    echo "Error: ". $sql . "<br>" . $connection->error;
}

// Close the database connection
$connection->close();
?>