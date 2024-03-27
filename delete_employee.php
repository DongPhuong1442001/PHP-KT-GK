<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "ql_nhansu";

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Check if the employee ID is provided
if (isset($_GET['id'])) {
    // Prepare and bind parameters
    $stmt = $conn->prepare("DELETE FROM nhanvien WHERE Ma_NV = ?");
    $stmt->bind_param("s", $employee_id);

    // Set parameter from GET data
    $employee_id = $_GET['id'];

    // Execute SQL
    if ($stmt->execute()) {
        echo "Employee deleted successfully";
    } else {
        echo "Error: " . $stmt->error;
    }

    $stmt->close();
}

$conn->close();
?>
