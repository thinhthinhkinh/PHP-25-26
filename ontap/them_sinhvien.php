<?php
// ===================================
// PHẦN 1: BẢO VỆ TRANG
// ===================================
session_start();

// Nếu chưa đăng nhập → Chuyển về login
if(!isset($_SESSION['logged_in'])){
    header('Location: login.php');
    exit;
}

// ===================================
// PHẦN 2: KẾT NỐI DATABASE
// ===================================
require_once 'config.php';

// ===================================
// PHẦN 3: XỬ LÝ THÊM SINH VIÊN
// ===================================
$success = '';
$error = '';

if(isset($_POST['themsv'])){
    $mssv = trim($_POST['mssv']);
    $hoten = trim($_POST['hoten']);
    $lop = trim($_POST['lop']);
    
    // Validate dữ liệu
    if(empty($mssv) || empty($hoten) || empty($lop)){
        $error = "Vui lòng điền đầy đủ thông tin!";
    } else {
        // Xử lý upload ảnh
        $avatar = '';
        
        if($_FILES['avatar']['error'] == 0){
            // Lấy extension
            $ext = strtolower(pathinfo($_FILES['avatar']['name'], PATHINFO_EXTENSION));
            
            // Validate loại file
            $allowed = array('jpg', 'jpeg', 'png');
            if(!in_array($ext, $allowed)){
                $error = "Chỉ chấp nhận file jpg, jpeg, png!";
            }
            // Validate kích thước
            elseif($_FILES['avatar']['size'] > 1024 * 1024){
                $error = "File vượt quá 1MB!";
            }
            else {
                // Tạo thư mục
                $upload_dir = "uploads/";
                if(!file_exists($upload_dir)){
                    mkdir($upload_dir, 0777, true);
                }
                
                // Đổi tên file: sv_mssv.ext
                $avatar = "sv_" . $mssv . "." . $ext;
                
                // Upload
                $target = $upload_dir . $avatar;
                if(!move_uploaded_file($_FILES['avatar']['tmp_name'], $target)){
                    $error = "Upload ảnh thất bại!";
                }
            }
        } else {
            $error = "Vui lòng chọn ảnh đại diện!";
        }
        
        // Nếu không có lỗi → Lưu database
        if(empty($error)){
            try {
                $stmt = $pdo->prepare("INSERT INTO sinhvien (mssv, hoten, lop, avatar) VALUES (?, ?, ?, ?)");
                $stmt->execute([$mssv, $hoten, $lop, $avatar]);
                
                $success = "Thêm sinh viên thành công!";
                
                // Reset form
                $mssv = $hoten = $lop = '';
                
            } catch(PDOException $e){
                if($e->getCode() == 23000){
                    $error = "MSSV đã tồn tại!";
                } else {
                    $error = "Lỗi: " . $e->getMessage();
                }
            }
        }
    }
}
?>

<!DOCTYPE html>
<html lang="vi">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Thêm Sinh Viên</title>
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
        .form-box {
            background: white;
            padding: 30px;
            border-radius: 10px;
            box-shadow: 0 2px 10px rgba(0,0,0,0.1);
            max-width: 600px;
        }
        h2 {
            color: #2c3e50;
            margin-bottom: 20px;
        }
        .form-group {
            margin-bottom: 20px;
        }
        label {
            display: block;
            margin-bottom: 5px;
            color: #555;
            font-weight: bold;
        }
        input[type="text"],
        input[type="file"] {
            width: 100%;
            padding: 10px;
            border: 1px solid #ddd;
            border-radius: 5px;
        }
        button {
            padding: 12px 30px;
            border: none;
            border-radius: 5px;
            cursor: pointer;
            font-size: 16px;
            margin-right: 10px;
        }
        button[type="submit"] {
            background: #4caf50;
            color: white;
        }
        button[type="reset"] {
            background: #ddd;
            color: #333;
        }
        .success {
            background: #d4edda;
            color: #155724;
            padding: 15px;
            border-radius: 5px;
            margin-bottom: 20px;
            border: 1px solid #c3e6cb;
        }
        .error {
            background: #f8d7da;
            color: #721c24;
            padding: 15px;
            border-radius: 5px;
            margin-bottom: 20px;
            border: 1px solid #f5c6cb;
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
            <div class="form-box">
                <h2> THÊM SINH VIÊN MỚI</h2>
                
                <?php if($success): ?>
                    <div class="success"> <?php echo $success; ?></div>
                <?php endif; ?>
                
                <?php if($error): ?>
                    <div class="error"> <?php echo $error; ?></div>
                <?php endif; ?>
                
                <form method="POST" enctype="multipart/form-data">
                    <div class="form-group">
                        <label>MSSV (*)</label>
                        <input type="text" name="mssv" value="<?php echo isset($mssv) ? $mssv : ''; ?>" required>
                    </div>
                    
                    <div class="form-group">
                        <label>Họ và tên (*)</label>
                        <input type="text" name="hoten" value="<?php echo isset($hoten) ? $hoten : ''; ?>" required>
                    </div>
                    
                    <div class="form-group">
                        <label>Lớp (*)</label>
                        <input type="text" name="lop" value="<?php echo isset($lop) ? $lop : ''; ?>" required>
                    </div>
                    
                    <div class="form-group">
                        <label>Ảnh đại diện (*)</label>
                        <input type="file" name="avatar" accept="image/*" required>
                        <small style="color: #666;">Chỉ chấp nhận jpg, jpeg, png. Tối đa 1MB.</small>
                    </div>
                    
                    <button type="submit" name="themsv">Thêm sinh viên</button>
                    <button type="reset">Nhập lại</button>
                </form>
            </div>
        </div>
    </div>
</body>
</html>