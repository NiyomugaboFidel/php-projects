<!DOCTYPE html>
<html>
<head>
    <title>Registered Students - GS Kagugu</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            padding: 20px;
        }
        table {
            width: 100%;
            border-collapse: collapse;
            margin-top: 20px;
        }
        th, td {
            border: 1px solid #ddd;
            padding: 8px;
            text-align: left;
        }
        th {
            background-color: #f4f4f4;
        }
        tr:nth-child(even) {
            background-color: #f9f9f9;
        }
        .header {
            display: flex;
            justify-content: space-between;
            align-items: center;
        }
        .back-btn {
            padding: 8px 15px;
            background-color: #f4f4f4;
            border: 1px solid #ccc;
            border-radius: 4px;
            text-decoration: none;
            color: black;
        }
    </style>
</head>
<body>
    <div class="header">
        <h2>GS Kagugu Registered Students</h2>
        <a href="index.php" class="back-btn">Back to Registration</a>
    </div>
    
    <?php

    $host = "localhost";
    $username = "root";
    $password = "";
    $dbname = "gs_kagugu";
    
    $conn = new mysqli($host, $username, $password, $dbname);
    
    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }
  
    $sql = "SELECT * FROM students ORDER BY id DESC";
    $result = $conn->query($sql);
    
    if ($result->num_rows > 0) {
        echo "<table>
                <tr>
                    <th>ID</th>
                    <th>Student ID</th>
                    <th>Full Names</th>
                    <th>Gender</th>
                    <th>Combination</th>
                    <th>Registration Date</th>
                </tr>";
        
        while($row = $result->fetch_assoc()) {
            echo "<tr>
                    <td>".$row["id"]."</td>
                     <td>".$row["student_id"]."</td>
                    <td>".$row["fullname"]."</td>
                    <td>".$row["gender"]."</td>
                    <td>".$row["combination"]."</td>
                    <td>".$row["registration_date"]."</td>
                </tr>";
        }
        echo "</table>";
    } else {
        echo "<p>No students registered yet.</p>";
    }
    
    $conn->close();
    ?>
</body>
</html>