<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Token gen</title>
    <link rel="stylesheet" href="stylesgen.css" />
    <!-- Unicons CSS -->
    <link rel="stylesheet" href="https://unicons.iconscout.com/release/v4.0.0/css/line.css" />
       <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.0/css/all.min.css"/>
   <script src="gen.js" defer></script>
  </head>
  <body>
    <nav class="nav">
      <i class="uil uil-bars navOpenBtn"></i>
      <a href="#" class="logo">Token Gen</a>
      

       <ul class="nav-links">
        <i class="uil uil-times navCloseBtn"></i>
        <li><a href="home.html">Home</a></li>
        <li><a href="generator.html">Generator</a></li>
        <li><a href="admiin.html">Admin</a></li>
        <li><a href="report.html">Report</a></li>
        <li><a href="about.html">Status</a></li>
      </ul>
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
?>
<body>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Data Display</title>
    <style>
        table {
            border-collapse: collapse;
            width: 100%;
        }
        th, td {
            border: 1px solid #ddd;
            padding: 8px;
            text-align: left;
        }
        th {
            background-color: #f2f2f2;
        }
    </style>
    <h1>Data Display</h1>
    <table>
        <tr>
            <th>Applicant_number</th>
            <th>name</th>
            <th>dept</th>
        </tr>
        <?php
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

      <i class="uil uil-search search-icon" id="searchIcon"></i>
      <div class="search-box">
        <i class="uil uil-search search-icon"></i>
        <input type="text" placeholder="Search here..." />
      </div>
    </nav>
    </body>
</html>