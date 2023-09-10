<!DOCTYPE html>
<html>
<head>
    <title>Display Database Data</title>
</head>
<body>
    <h1>Database Data</h1>
    <table border="1">
        <tr>
            <th>applicant Number</th>
            <th>Name</th>
            <th>department</th>
        </tr>
        <?php
        // Your PHP code to fetch data from the database goes here
        $servername = "localhost";
        $username = "chris";
        $password = "messi";
        $dbname = "token";

        $conn = new mysqli($servername, $username, $password, $dbname);

        if ($conn->connect_error) {
            die("Connection failed: " . $conn->connect_error);
        }

        $sql = "SELECT * FROM login";
        $result = $conn->query($sql);

        if ($result->num_rows > 0) {
            while ($row = $result->fetch_assoc()) {
                echo "<tr>";
                echo "<td>" . $row["Applicant_no"] . "</td>";
                echo "<td>" . $row["name"] . "</td>";
                echo "<td>" . $row["dept"] . "</td>";
                echo "</tr>";
            }
        } else {
            echo "<tr><td colspan='3'>No data found</td></tr>";
        }

        $conn->close();
        ?>
    </table>
</body>
</html>
