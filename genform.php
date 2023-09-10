   <?php
$host = "localhost";
$username = "chris";
$password = "messi";
$database = "token";

// Connection
$connection = new mysqli($host, $username, $password, $database);

// connection errors
if ($connection->connect_error) {
    die("Connection failed: " . $connection->connect_error);
}

// Retrieve data 
$APL_NO = $_POST['application-number'];
$DEPT = $_POST['department'];
$NAME = $_POST['name'];

// SQL query to insert data into the 'login' table
$sql = "INSERT INTO login (Applicant_no,name,dept) VALUES ('$APL_NO','$NAME','$DEPT')";

if ($connection->query($sql) === TRUE) {
    echo "Record added successfully";
} else {
    echo "Error: ". $sql . "<br>" . $connection->error;
}

// Close the database connection
$connection->close();
?>