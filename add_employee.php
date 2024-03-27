<!DOCTYPE html>
<html lang="vi">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Add Employee</title>
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
        <h1>Add Employee</h1>
        <form action="handle_add_employee.php" method="POST">
            <label for="maNV">Mã Nhân Viên:</label>
            <input type="text" id="maNV" name="maNV" required>
            
            <label for="tenNV">Tên Nhân Viên:</label>
            <input type="text" id="tenNV" name="tenNV" required>
            
            <label for="phai">Giới tính:</label>
            <input type="text" id="phai" name="phai" required>
            
            <label for="noiSinh">Nơi Sinh:</label>
            <input type="text" id="noiSinh" name="noiSinh" required>
            
            <label for="maPhong">Mã Phòng:</label>
            <input type="text" id="maPhong" name="maPhong" required>
            
            <label for="luong">Lương:</label>
            <input type="text" id="luong" name="luong" required>
            
            <input type="submit" value="Submit">
        </form>
    </div>
</body>
</html>
