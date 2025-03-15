<?php
$host = "localhost";
$username = "root";
$password = "";
$dbname = "gs_kagugu";

$conn = new mysqli($host, $username, $password, $dbname);

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

function generateStudentID($conn) {
    $year = date('y');
    $sql = "SELECT student_id FROM students WHERE student_id LIKE '$year%' ORDER BY student_id DESC LIMIT 1";
    $result = $conn->query($sql);
    
    if ($result->num_rows > 0) {
        $row = $result->fetch_assoc();
        $lastID = substr($row['student_id'], -4);
        $nextID = str_pad((int)$lastID + 1, 4, '0', STR_PAD_LEFT);
    } else {
        $nextID = '0001';
    }
    
    return $year . str_pad($nextID, 8, '0', STR_PAD_LEFT);
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    try {
        $conn->begin_transaction();
        
        $fullname = $_POST['fullname'];
        $gender = $_POST['gender'];
        $combination = $_POST['combination'];
        $student_id = generateStudentID($conn);
        
        $stmt = $conn->prepare("INSERT INTO students (student_id, fullname, gender, combination) VALUES (?, ?, ?, ?)");
        $stmt->bind_param("ssss", $student_id, $fullname, $gender, $combination);
        
        if ($stmt->execute()) {
            $conn->commit();
            echo "<script>
                alert('Registration successful! Student ID: " . $student_id . "');
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
