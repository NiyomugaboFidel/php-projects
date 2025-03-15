<?php
$host = "localhost";
$username = "root";
$password = "";
$dbname = "L4SODA";

$conn = new mysqli($host, $username, $password, $dbname);

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}



if ($_SERVER["REQUEST_METHOD"] == "POST") {
    try {
        $conn->begin_transaction();
        
        $firstname = $_POST['firstname'];
        $lastname = $_POST['lastname'];
        $classname = $_POST['classname'];
        $sex = $_POST['sex'];
    
        $stmt = $conn->prepare("INSERT INTO Information (FirstName,LastName,ClassName,Sex) VALUES (?, ?, ?, ?)");
        $stmt->bind_param("ssss", $firstname, $lastname, $classname, $sex);
        
        if ($stmt->execute()) {
            $conn->commit();
            echo "<script>
                alert('Registration successful! Name: " . $firstname . "');
                window.location.href='view_students.php';
            </script>";
        } else {
            throw new Exception("Error executing statement: " . $stmt->error);
        }
        
        $stmt->close();
    } catch (Exception $e) {
        $conn->rollback();
        echo "Error: " . $e->getMessage();
    }
}

$conn->close();
?>
