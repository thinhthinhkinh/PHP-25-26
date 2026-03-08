<?php
// ===================================
// PHẦN 1: BẢO VỆ TRANG
// ===================================
session_start();

if(!isset($_SESSION['logged_in'])){
    header('Location: login.php');
    exit;
}

// ===================================
// PHẦN 2: LẤY DANH SÁCH SINH VIÊN
// ===================================
require_once 'config.php';

try {
    $stmt = $pdo->query("SELECT * FROM sinhvien ORDER BY ngaythem DESC");
    $sinhvien_list = $stmt->fetchAll();
} catch(PDOException $e){
    $error = "Lỗi: " . $e->getMessage();
}
?>

<!DOCTYPE html>
<html lang="vi">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Danh Sách Sinh Viên</title>
    <style>
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }
        body {
            font-family: Arial, sans-serif;
        }
        .container {
            display: flex;
            height: 100vh;
        }
        .sidebar {
            width: 250px;
            background: #2c3e50;
            color: white;
            padding: 20px;
        }
        .sidebar h3 {
            margin-bottom: 20px;
            padding-bottom: 10px;
            border-bottom: 2px solid #34495e;
        }
        .sidebar a {
            display: block;
            color: white;
            text-decoration: none;
            padding: 12px;
            margin-bottom: 5px;
            border-radius: 5px;
            transition: background 0.3s;
        }
        .sidebar a:hover {
            background: #34495e;
        }
        .content {
            flex: 1;
            padding: 30px;
            background: #ecf0f1;
            overflow-y: auto;
        }
        h2 {
            color: #2c3e50;
            margin-bottom: 20px;
        }
        table {
            width: 100%;
            background: white;
            border-collapse: collapse;
            box-shadow: 0 2px 10px rgba(0,0,0,0.1);
            border-radius: 10px;
            overflow: hidden;
        }
        th {
            background: #2c3e50;
            color: white;
            padding: 15px;
            text-align: left;
        }
        td {
            padding: 15px;
            border-bottom: 1px solid #ddd;
        }
        tr:hover {
            background: #f5f5f5;
        }
        img {
            width: 80px;
            height: 80px;
            object-fit: cover;
            border-radius: 5px;
            border: 2px solid #ddd;
        }
        .empty {
            text-align: center;
            padding: 50px;
            color: #999;
        }
    </style>
</head>
<body>
    <div class="container">
        <!-- MENU -->
        <div class="sidebar">
            <h3> QUẢN LÝ SINH VIÊN</h3>
            <a href="index.php"> Trang chủ</a>
            <a href="them_sinhvien.php"> Thêm sinh viên</a>
            <a href="danhsach.php"> Danh sách sinh viên</a>
            <a href="logout.php"> Đăng xuất</a>
        </div>
        
        <!-- NỘI DUNG -->
        <div class="content">
            <h2> DANH SÁCH SINH VIÊN</h2>
            
            <?php if(isset($error)): ?>
                <p style="color: red;"><?php echo $error; ?></p>
            <?php elseif(empty($sinhvien_list)): ?>
                <div class="empty">
                    <h3> Chưa có sinh viên nào</h3>
                    <p>Hãy <a href="them_sinhvien.php">thêm sinh viên mới</a></p>
                </div>
            <?php else: ?>
                <table>
                    <thead>
                        <tr>
                            <th>STT</th>
                            <th>MSSV</th>
                            <th>Họ và tên</th>
                            <th>Lớp</th>
                            <th>Ảnh đại diện</th>
                            <th>Ngày thêm</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php 
                        $stt = 1;
                        foreach($sinhvien_list as $sv): 
                        ?>
                            <tr>
                                <td><?php echo $stt++; ?></td>
                                <td><?php echo $sv['mssv']; ?></td>
                                <td><?php echo $sv['hoten']; ?></td>
                                <td><?php echo $sv['lop']; ?></td>
                                <td>
                                    <?php if($sv['avatar']): ?>
                                        <img src="uploads/<?php echo $sv['avatar']; ?>" alt="Avatar">
                                    <?php else: ?>
                                        <em>Không có ảnh</em>
                                    <?php endif; ?>
                                </td>
                                <td><?php echo date('d/m/Y H:i', strtotime($sv['ngaythem'])); ?></td>
                            </tr>
                        <?php endforeach; ?>
                    </tbody>
                </table>
            <?php endif; ?>
        </div>
    </div>
</body>
</html>
