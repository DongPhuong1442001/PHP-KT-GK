<?php
$servername = "localhost"; 
$username = "root"; 
$password = ""; 
$dbname = "ql_nhansu";

$conn = new mysqli($servername, $username, $password, $dbname);

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

$records_per_page = 5;
$current_page = isset($_GET['page']) ? $_GET['page'] : 1;
$offset = ($current_page - 1) * $records_per_page;

$sql = "SELECT nv.*, pb.Ten_Phong 
        FROM nhanvien nv 
        INNER JOIN phongban pb ON nv.Ma_Phong = pb.Ma_Phong 
        LIMIT $offset, $records_per_page";
$result = $conn->query($sql);

$employees = [];
if ($result->num_rows > 0) {
    while ($row = $result->fetch_assoc()) {
        $employees[] = $row;
    }
}

$total_records_sql = "SELECT COUNT(*) as total FROM nhanvien";
$total_result = $conn->query($total_records_sql);
$total_records = $total_result->fetch_assoc()['total'];
$total_pages = ceil($total_records / $records_per_page);

$conn->close();
?>

<!DOCTYPE html>
<html lang="vi">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>THÔNG TIN NHÂN VIÊN</title>
    <style>
        /* Basic CSS styles */
        body {
            font-family: Arial, sans-serif;
            background-color: #f8f9fa;
            margin: 0;
            padding: 0;
        }

        .container {
            margin: 20px auto;
            width: 90%;
            max-width: 1200px;
            background-color: #fff;
            border-radius: 8px;
            box-shadow: 0 2px 4px rgba(0, 0, 0, 0.1);
            padding: 20px;
            box-sizing: border-box;
        }

        table {
            width: 100%;
            border-collapse: collapse;
            margin-top: 20px;
        }

        th, td {
            border: 1px solid #ddd;
            padding: 12px;
            text-align: left;
        }

        th {
            background-color: #f2f2f2;
        }

        img {
            display: block;
            margin: auto;
        }

        .pagination {
            margin-top: 20px;
            text-align: center;
        }

        .pagination a {
            color: black;
            display: inline-block;
            padding: 8px 16px;
            text-decoration: none;
            transition: background-color .3s;
            border: 1px solid #ddd;
            margin-right: 5px;
        }

        .pagination a.active {
            background-color: #4CAF50;
            color: white;
        }

        .pagination a:hover:not(.active) {
            background-color: #ddd;
        }

        /* Button styles */
        .btn {
            padding: 8px 12px;
            border: none;
            cursor: pointer;
            border-radius: 4px;
            text-decoration: none;
            display: inline-block;
            margin-right: 5px;
            transition: background-color 0.3s;
        }

        .btn-primary {
            background-color: #007bff;
            color: #fff;
        }

        .btn-danger {
            background-color: #dc3545;
            color: #fff;
        }

        /* Responsive styles */
        @media only screen and (max-width: 600px) {
            th, td {
                padding: 8px;
            }

            .pagination {
                margin-top: 10px;
            }
        }
    </style>
</head>
<body>
    <div class="container">
        <h1>THÔNG TIN NHÂN VIÊN</h1>

        <!-- Add button -->
        <a href="add_employee.php" class="btn btn-primary">Add</a>

        <table>
            <tr>
                <th>Mã Nhân Viên</th>
                <th>Tên Nhân Viên</th>
                <th>Giới tính</th>
                <th>Nơi Sinh</th>
                <th>Tên Phòng</th>
                <th>Lương</th>
                <th>Action</th> <!-- Action column -->
            </tr>
            <?php foreach ($employees as $employee) : ?>
            <tr>
                <td><?php echo $employee['Ma_NV']; ?></td>
                <td><?php echo $employee['Ten_NV']; ?></td>
                <td><?php if ($employee['Phai'] === 'NAM'): ?>
                        <img src="img/man.jpg" alt="Nam" width="20" height="20">
                    <?php else: ?>
                        <img src="img/woman.jpg" alt="Nữ" width="20" height="20">
                    <?php endif; ?></td>
                <td><?php echo $employee['Noi_Sinh']; ?></td>
                <td><?php echo $employee['Ten_Phong']; ?></td>
                <td><?php echo number_format($employee['Luong'], 0, ',', '.'); ?></td>
                <td>
                    <!-- Edit button -->
                    <a href="edit_employee.php?id=<?php echo $employee['Ma_NV']; ?>" class="btn btn-primary">Edit</a>
                    <!-- Delete button -->
                    <a href="delete_employee.php?id=<?php echo $employee['Ma_NV']; ?>" class="btn btn-danger">Delete</a>
                </td>
            </tr>
            <?php endforeach; ?>
        </table>

        <div class="pagination">
            <?php for ($i = 1; $i <= $total_pages; $i++): ?>
                <a href="?page=<?php echo $i; ?>" <?php if ($i == $current_page) echo 'class="active"'; ?>><?php echo $i; ?></a>
            <?php endfor; ?>
        </div>
    </div>
</body>
</html>


