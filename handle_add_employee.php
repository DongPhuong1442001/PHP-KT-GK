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

// Prepare and bind parameters
$stmt = $conn->prepare("INSERT INTO nhanvien (Ma_NV, Ten_NV, Phai, Noi_Sinh, Ma_Phong, Luong) VALUES (?, ?, ?, ?, ?, ?)");
$stmt->bind_param("sssssi", $maNV, $tenNV, $phai, $noiSinh, $maPhong, $luong);

// Set parameters from POST data
$maNV = $_POST['maNV'];
$tenNV = $_POST['tenNV'];
$phai = $_POST['phai'];
$noiSinh = $_POST['noiSinh'];
$maPhong = $_POST['maPhong'];
$luong = $_POST['luong'];

// Execute SQL
if ($stmt->execute()) {
    echo "New employee added successfully";
} else {
    echo "Error: " . $stmt->error;
}

$stmt->close();
$conn->close();
?>
