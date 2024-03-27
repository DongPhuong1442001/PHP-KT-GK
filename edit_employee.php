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

// Fetch employee data based on ID
$employee_id = $_GET['id'];
$sql = "SELECT * FROM nhanvien WHERE Ma_NV = ?";
$stmt = $conn->prepare($sql);
$stmt->bind_param("s", $employee_id);
$stmt->execute();
$result = $stmt->get_result();
$employee = $result->fetch_assoc();
?>

<!DOCTYPE html>
<html lang="vi">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit Employee</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f7f7f7;
            margin: 0;
            padding: 0;
        }

        .container {
            margin: 20px auto;
            width: 80%;
            background-color: #fff;
            padding: 20px;
            border-radius: 8px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
        }

        h1 {
            text-align: center;
        }

        form {
            max-width: 400px;
            margin: 0 auto;
        }

        label {
            font-weight: bold;
            margin-bottom: 8px;
            display: block;
        }

        input[type="text"] {
            width: 100%;
            padding: 8px;
            margin-bottom: 16px;
            border: 1px solid #ccc;
            border-radius: 4px;
            box-sizing: border-box;
        }

        input[type="submit"] {
            background-color: #007bff;
            color: #fff;
            border: none;
            padding: 10px 20px;
            border-radius: 4px;
            cursor: pointer;
        }

        input[type="submit"]:hover {
            background-color: #0056b3;
        }
    </style>
</head>
<body>
    <div class="container">
        <h1>Edit Employee</h1>
        <form action="handle_edit_employee.php" method="POST">
            <input type="hidden" name="id" value="<?php echo $employee_id; ?>">
            <label for="maNV">Mã Nhân Viên:</label><br>
            <input type="text" id="maNV" name="maNV" value="<?php echo $employee['Ma_NV']; ?>" required><br>
            
            <label for="tenNV">Tên Nhân Viên:</label><br>
            <input type="text" id="tenNV" name="tenNV" value="<?php echo $employee['Ten_NV']; ?>" required><br>
            
            <label for="phai">Giới tính:</label><br>
            <input type="text" id="phai" name="phai" value="<?php echo $employee['Phai']; ?>" required><br>
            
            <label for="noiSinh">Nơi Sinh:</label><br>
            <input type="text" id="noiSinh" name="noiSinh" value="<?php echo $employee['Noi_Sinh']; ?>" required><br>
            
            <label for="maPhong">Mã Phòng:</label><br>
            <input type="text" id="maPhong" name="maPhong" value="<?php echo $employee['Ma_Phong']; ?>" required><br>
            
            <label for="luong">Lương:</label><br>
            <input type="text" id="luong" name="luong" value="<?php echo $employee['Luong']; ?>" required><br><br>
            
            <input type="submit" value="Submit">
        </form>
    </div>
</body>
</html>
