<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $newUsername = $_POST["new-username"];
    $email = $_POST["email"];
    $newPassword = $_POST["new-password"];
    
    // Validate the data (you can add more validation as needed)
    if (empty($newUsername) || empty($email) || empty($newPassword)) {
        // Handle validation errors on the client-side (JavaScript)
    } else {
        // Hash the password
        $hashedPassword = password_hash($newPassword, PASSWORD_DEFAULT);

        // Connect to your database (replace with your database credentials)
        $dbHost = "localhost";
        $dbUser = "mel";
        $dbPassword = "mel123";
        $dbName = "token";

        $conn = new mysqli($dbHost, $dbUser, $dbPassword, $dbName);

        if ($conn->connect_error) {
            // Handle database connection error on the client-side (JavaScript)
        } else {
            // Check if the username already exists
            $checkQuery = "SELECT * FROM users WHERE username = ?";
            $stmtCheck = $conn->prepare($checkQuery);
            $stmtCheck->bind_param("s", $newUsername);
            $stmtCheck->execute();
            $result = $stmtCheck->get_result();

            if ($result->num_rows == 0) {
                // Insert the new user into the database using prepared statement
                $insertQuery = "INSERT INTO users (username, email, password) VALUES (?, ?, ?)";
                $stmtInsert = $conn->prepare($insertQuery);
                $stmtInsert->bind_param("sss", $newUsername, $email, $hashedPassword);

                if ($stmtInsert->execute()) {
                    
                } else {
                    // Handle database insertion error on the client-side (JavaScript)
                }
            } else {
                // Handle username already exists on the client-side (JavaScript)
            }

            $conn->close();
        }
    }
}
?>
/





