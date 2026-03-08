<?php
// ===================================
// PHẦN 1: KHỞI ĐỘNG SESSION
// ===================================
session_start();
?>

<!DOCTYPE html>
<html lang="vi">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Trang Chủ - Quản Lý Sinh Viên</title>
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
        }
        .welcome-box {
            background: white;
            padding: 30px;
            border-radius: 10px;
            box-shadow: 0 2px 10px rgba(0,0,0,0.1);
        }
        .welcome-box h2 {
            color: #2c3e50;
            margin-bottom: 20px;
        }
        .info {
            background: #e8f5e9;
            padding: 20px;
            border-left: 4px solid #4caf50;
            margin-top: 20px;
        }
    </style>
</head>
<body>
    <div class="container">
        <!-- ===================================
             PHẦN 2: MENU BÊN TRÁI
        ==================================== -->
        <div class="sidebar">
            <h3> QUẢN LÝ SINH VIÊN</h3>
            
            <?php if(isset($_SESSION['logged_in'])): ?>
                <!-- ĐÃ ĐĂNG NHẬP -->
                <a href="index.php"> Trang chủ</a>
                <a href="them_sinhvien.php"> Thêm sinh viên</a>
                <a href="danhsach.php"> Danh sách sinh viên</a>
                <a href="logout.php"> Đăng xuất</a>
            <?php else: ?>
                <!-- CHƯA ĐĂNG NHẬP -->
                <a href="login.php"> Đăng nhập</a>
            <?php endif; ?>
        </div>
        
        <!-- ===================================
             PHẦN 3: NỘI DUNG BÊN PHẢI
        ==================================== -->
        <div class="content">
            <div class="welcome-box">
                <?php if(isset($_SESSION['logged_in'])): ?>
                    <!-- ĐÃ ĐĂNG NHẬP -->
                    <h2> Xin chào, <?php echo $_SESSION['username']; ?>!</h2>
                    <p>Chào mừng bạn đến với hệ thống quản lý sinh viên.</p>
                    
                    <!-- <div class="info">
                        <strong> Hướng dẫn sử dụng:</strong>
                        <ul style="margin-left: 20px; margin-top: 10px;">
                            <li>Click <strong>"Thêm sinh viên"</strong> để thêm sinh viên mới</li>
                            <li>Click <strong>"Danh sách sinh viên"</strong> để xem tất cả sinh viên</li>
                            <li>Click <strong>"Đăng xuất"</strong> khi muốn thoát khỏi hệ thống</li>
                        </ul>
                    </div> -->
                    
                <?php else: ?>
                    <!-- CHƯA ĐĂNG NHẬP -->
                    <h2> Bạn chưa đăng nhập!</h2>
                    <p>Vui lòng <a href="login.php" style="color: #667eea;">đăng nhập tại đây</a> để sử dụng hệ thống.</p>
                <?php endif; ?>
            </div>
        </div>
    </div>
</body>
</html>