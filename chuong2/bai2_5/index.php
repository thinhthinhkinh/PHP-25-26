<!DOCTYPE html>
<html lang="vi">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Bài 2.5 - Đăng Ký</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <style>
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }
        body {
            font-family: 'Segoe UI', Arial, sans-serif;
            background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
            min-height: 100vh;
            padding: 40px 20px;
        }
        .main-container {
            max-width: 1200px;
            margin: 0 auto;
        }
        .banner {
            background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
            color: white;
            padding: 30px;
            text-align: center;
            border-radius: 15px 15px 0 0;
            box-shadow: 0 5px 15px rgba(0,0,0,0.2);
        }
        .content-wrapper {
            background: white;
            border-radius: 0 0 15px 15px;
            box-shadow: 0 20px 60px rgba(0,0,0,0.3);
            overflow: hidden;
        }
        .content-grid {
            display: grid;
            grid-template-columns: 250px 1fr;
            min-height: 600px;
        }
        .menu {
            background: #f8f9fa;
            padding: 30px 20px;
            border-right: 2px solid #dee2e6;
        }
        .menu h5 {
            color: #667eea;
            margin-bottom: 20px;
            font-weight: bold;
        }
        .menu-item {
            display: block;
            padding: 12px 15px;
            margin-bottom: 10px;
            color: #495057;
            text-decoration: none;
            border-radius: 8px;
            transition: all 0.3s;
        }
        .menu-item:hover {
            background: #667eea;
            color: white;
            transform: translateX(5px);
        }
        .menu-item.active {
            background: #667eea;
            color: white;
        }
        .content-area {
            padding: 50px;
        }
        .form-section {
            background: #f8f9fa;
            padding: 30px;
            border-radius: 10px;
            margin-bottom: 30px;
        }
        .form-section h5 {
            color: #667eea;
            margin-bottom: 20px;
            padding-bottom: 10px;
            border-bottom: 2px solid #667eea;
        }
        .form-label {
            font-weight: 600;
            color: #495057;
            margin-bottom: 8px;
        }
        .form-control, .form-select {
            padding: 10px;
            border: 2px solid #dee2e6;
            border-radius: 8px;
            transition: all 0.3s;
        }
        .form-control:focus, .form-select:focus {
            border-color: #667eea;
            box-shadow: 0 0 0 0.2rem rgba(102, 126, 234, 0.25);
        }
        .btn-submit {
            background: #667eea;
            color: white;
            padding: 12px 40px;
            border: none;
            border-radius: 8px;
            font-weight: bold;
            transition: all 0.3s;
        }
        .btn-submit:hover {
            background: #5568d3;
            transform: translateY(-2px);
            box-shadow: 0 5px 15px rgba(102, 126, 234, 0.4);
        }
        .btn-reset {
            background: #6c757d;
            color: white;
            padding: 12px 40px;
            border: none;
            border-radius: 8px;
            font-weight: bold;
            transition: all 0.3s;
        }
        .btn-reset:hover {
            background: #5a6268;
        }
        .footer {
            background: #f8f9fa;
            padding: 20px;
            text-align: center;
            color: #6c757d;
            border-radius: 0 0 15px 15px;
        }
        .result-box {
            background: #e7f3ff;
            border: 2px solid #667eea;
            border-radius: 10px;
            padding: 30px;
            margin-top: 30px;
        }
        .result-box h4 {
            color: #667eea;
            margin-bottom: 20px;
        }
        .result-box p {
            margin-bottom: 10px;
            line-height: 1.8;
        }
    </style>
</head>
<body>
    <div class="main-container">
        <!-- Banner -->
        <div class="banner">
            <h1 class="mb-2">BANNER WEBSITE</h1>
            <p class="mb-0">Bài 2.5 - Form Đăng Ký Thành Viên</p>
        </div>
        
        <!-- Content Wrapper -->
        <div class="content-wrapper">
            <div class="content-grid">
                <!-- Menu -->
                <div class="menu">
                    <h5>Menu</h5>
                    <a href="#" class="menu-item">Trang chủ</a>
                    <a href="#" class="menu-item active">Đăng ký</a>
                    <a href="#" class="menu-item">Đăng nhập</a>
                </div>
                
                <!-- Content Area -->
                <div class="content-area">
                    <h2 class="text-center mb-4" style="color: #667eea;">THÔNG TIN ĐĂNG KÝ</h2>
                    
                    <?php
                    // Xử lý form khi submit
                    $errors = [];
                    $success = false;
                    
                    if ($_SERVER['REQUEST_METHOD'] == 'POST') {
                        // Lấy dữ liệu từ form
                        $email = isset($_POST['email']) ? trim($_POST['email']) : '';
                        $password = isset($_POST['password']) ? trim($_POST['password']) : '';
                        $password_confirm = isset($_POST['password_confirm']) ? trim($_POST['password_confirm']) : '';
                        $hoten = isset($_POST['hoten']) ? trim($_POST['hoten']) : '';
                        $quequan = isset($_POST['quequan']) ? trim($_POST['quequan']) : '';
                        $dienthoai = isset($_POST['dienthoai']) ? trim($_POST['dienthoai']) : '';
                        $gioitinh = isset($_POST['gioitinh']) ? $_POST['gioitinh'] : '';
                        $sothich = isset($_POST['sothich']) ? $_POST['sothich'] : [];
                        
                        // Validate
                        if (empty($email)) {
                            $errors[] = 'Email không được để trống';
                        } elseif (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
                            $errors[] = 'Email không hợp lệ';
                        }
                        
                        if (empty($password)) {
                            $errors[] = 'Password không được để trống';
                        } elseif (strlen($password) < 6) {
                            $errors[] = 'Password phải có ít nhất 6 ký tự';
                        }
                        
                        if ($password !== $password_confirm) {
                            $errors[] = 'Password nhập lại không khớp';
                        }
                        
                        if (empty($hoten)) {
                            $errors[] = 'Họ tên không được để trống';
                        }
                        
                        if (empty($quequan)) {
                            $errors[] = 'Quê quán không được để trống';
                        }
                        
                        if (empty($dienthoai)) {
                            $errors[] = 'Điện thoại không được để trống';
                        }
                        
                        if (empty($gioitinh)) {
                            $errors[] = 'Vui lòng chọn giới tính';
                        }
                        
                        // Nếu không có lỗi
                        if (empty($errors)) {
                            $success = true;
                        }
                    }
                    ?>
                    
                    <?php if (!empty($errors)): ?>
                        <div class="alert alert-danger">
                            <h5>❌ Có lỗi xảy ra:</h5>
                            <ul class="mb-0">
                                <?php foreach ($errors as $error): ?>
                                    <li><?php echo $error; ?></li>
                                <?php endforeach; ?>
                            </ul>
                        </div>
                    <?php endif; ?>
                    
                    <?php if ($success): ?>
                        <div class="result-box">
                            <h4>🎉 Đăng ký thành công!</h4>
                            <p><strong>Email:</strong> <?php echo htmlspecialchars($email); ?></p>
                            <p><strong>Họ tên:</strong> <?php echo htmlspecialchars($hoten); ?></p>
                            <p><strong>Quê quán:</strong> <?php echo htmlspecialchars($quequan); ?></p>
                            <p><strong>Điện thoại:</strong> <?php echo htmlspecialchars($dienthoai); ?></p>
                            <p><strong>Giới tính:</strong> <?php echo $gioitinh == 'Nam' ? '👨 Nam' : '👩 Nữ'; ?></p>
                            <?php if (!empty($sothich)): ?>
                                <p><strong>Sở thích:</strong> <?php echo implode(', ', $sothich); ?></p>
                            <?php endif; ?>
                        </div>
                    <?php endif; ?>
                    
                    <!-- Form đăng ký -->
                    <form method="POST" action="">
                        <!-- Thông tin tài khoản -->
                        <div class="form-section">
                            <h5>🔐 Thông tin tài khoản</h5>
                            <div class="row g-3">
                                <div class="col-md-12">
                                    <label for="email" class="form-label">Email *</label>
                                    <input type="email" 
                                           class="form-control" 
                                           id="email" 
                                           name="email" 
                                           value="<?php echo isset($email) ? htmlspecialchars($email) : ''; ?>"
                                           placeholder="example@email.com"
                                           required>
                                </div>
                                
                                <div class="col-md-6">
                                    <label for="password" class="form-label">Password *</label>
                                    <input type="password" 
                                           class="form-control" 
                                           id="password" 
                                           name="password" 
                                           placeholder="Tối thiểu 6 ký tự"
                                           required>
                                </div>
                                
                                <div class="col-md-6">
                                    <label for="password_confirm" class="form-label">Nhập lại password *</label>
                                    <input type="password" 
                                           class="form-control" 
                                           id="password_confirm" 
                                           name="password_confirm" 
                                           placeholder="Nhập lại password"
                                           required>
                                </div>
                            </div>
                        </div>
                        
                        <!-- Thông tin cá nhân -->
                        <div class="form-section">
                            <h5>👤 Thông tin cá nhân</h5>
                            <div class="row g-3">
                                <div class="col-md-6">
                                    <label for="hoten" class="form-label">Họ tên *</label>
                                    <input type="text" 
                                           class="form-control" 
                                           id="hoten" 
                                           name="hoten" 
                                           value="<?php echo isset($hoten) ? htmlspecialchars($hoten) : ''; ?>"
                                           placeholder="Nguyễn Văn A"
                                           required>
                                </div>
                                
                                <div class="col-md-6">
                                    <label for="quequan" class="form-label">Quê quán *</label>
                                    <select class="form-select" id="quequan" name="quequan" required>
                                        <option value="">Chọn Tỉnh/Thành phố</option>
                                        <option value="Hà Nội" <?php echo (isset($quequan) && $quequan == 'Hà Nội') ? 'selected' : ''; ?>>Hà Nội</option>
                                        <option value="TP.HCM" <?php echo (isset($quequan) && $quequan == 'TP.HCM') ? 'selected' : ''; ?>>TP.HCM</option>
                                        <option value="Đà Nẵng" <?php echo (isset($quequan) && $quequan == 'Đà Nẵng') ? 'selected' : ''; ?>>Đà Nẵng</option>
                                        <option value="Cần Thơ" <?php echo (isset($quequan) && $quequan == 'Cần Thơ') ? 'selected' : ''; ?>>Cần Thơ</option>
                                        <option value="Khác" <?php echo (isset($quequan) && $quequan == 'Khác') ? 'selected' : ''; ?>>Khác</option>
                                    </select>
                                </div>
                                
                                <div class="col-md-12">
                                    <label for="dienthoai" class="form-label">Điện thoại *</label>
                                    <input type="tel" 
                                           class="form-control" 
                                           id="dienthoai" 
                                           name="dienthoai" 
                                           value="<?php echo isset($dienthoai) ? htmlspecialchars($dienthoai) : ''; ?>"
                                           placeholder="0901234567"
                                           required>
                                </div>
                                
                                <div class="col-md-12">
                                    <label class="form-label">Giới tính *</label>
                                    <div>
                                        <div class="form-check form-check-inline">
                                            <input class="form-check-input" 
                                                   type="radio" 
                                                   name="gioitinh" 
                                                   id="nam" 
                                                   value="Nam"
                                                   <?php echo (isset($gioitinh) && $gioitinh == 'Nam') ? 'checked' : ''; ?>
                                                   required>
                                            <label class="form-check-label" for="nam">Nam</label>
                                        </div>
                                        <div class="form-check form-check-inline">
                                            <input class="form-check-input" 
                                                   type="radio" 
                                                   name="gioitinh" 
                                                   id="nu" 
                                                   value="Nữ"
                                                   <?php echo (isset($gioitinh) && $gioitinh == 'Nữ') ? 'checked' : ''; ?>
                                                   required>
                                            <label class="form-check-label" for="nu">Nữ</label>
                                        </div>
                                    </div>
                                </div>
                                
                                <div class="col-md-12">
                                    <label class="form-label">Sở thích</label>
                                    <div>
                                        <div class="form-check">
                                            <input class="form-check-input" 
                                                   type="checkbox" 
                                                   name="sothich[]" 
                                                   value="Màu xanh" 
                                                   id="xanh"
                                                   <?php echo (isset($sothich) && in_array('Màu xanh', $sothich)) ? 'checked' : ''; ?>>
                                            <label class="form-check-label" for="xanh">Màu xanh</label>
                                        </div>
                                        <div class="form-check">
                                            <input class="form-check-input" 
                                                   type="checkbox" 
                                                   name="sothich[]" 
                                                   value="Màu đỏ" 
                                                   id="do"
                                                   <?php echo (isset($sothich) && in_array('Màu đỏ', $sothich)) ? 'checked' : ''; ?>>
                                            <label class="form-check-label" for="do">Màu đỏ</label>
                                        </div>
                                        <div class="form-check">
                                            <input class="form-check-input" 
                                                   type="checkbox" 
                                                   name="sothich[]" 
                                                   value="Động quê" 
                                                   id="dongque"
                                                   <?php echo (isset($sothich) && in_array('Động quê', $sothich)) ? 'checked' : ''; ?>>
                                            <label class="form-check-label" for="dongque">Động quê</label>
                                        </div>
                                        <div class="form-check">
                                            <input class="form-check-input" 
                                                   type="checkbox" 
                                                   name="sothich[]" 
                                                   value="Cao nguyên" 
                                                   id="caonguyen"
                                                   <?php echo (isset($sothich) && in_array('Cao nguyên', $sothich)) ? 'checked' : ''; ?>>
                                            <label class="form-check-label" for="caonguyen">Cao nguyên</label>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        
                        <!-- Buttons -->
                        <div class="row g-3">
                            <div class="col-md-6">
                                <button type="submit" class="btn-submit w-100">Đăng ký</button>
                            </div>
                            <div class="col-md-6">
                                <button type="reset" class="btn-reset w-100">Làm lại</button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
        
        <!-- Footer -->
        <div class="footer">
            <p class="mb-0">Footer website - Bài 2.5: Form Đăng Ký | 
                <a href="../" style="color: #667eea; text-decoration: none;">← Quay lại</a>
            </p>
        </div>
    </div>
</body>
</html>
