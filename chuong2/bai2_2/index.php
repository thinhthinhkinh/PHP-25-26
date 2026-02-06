<!DOCTYPE html>
<html lang="vi">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Bài 2.2 - Login</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <style>
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }
        body {
            font-family: 'Segoe UI', Arial, sans-serif;
            background: linear-gradient(135deg, white 0%, #764ba2 100%);
            min-height: 100vh;
            display: flex;
            align-items: center;
            padding: 20px;
        }
        .main-container {
            max-width: 1200px;
            margin: 0 auto;
            width: 100%;
        }
        .banner {
            background: linear-gradient(135deg, #00008b 0%, #764ba2 100%);
            color: white;
            padding: 30px;
            text-align: center;
            border-radius: 15px 15px 0 0;
            box-shadow: 0 5px 15px rgba(0,0,0,0.2);
        }
        .content-wrapper {
            background: white;
            box-shadow: 0 20px 60px rgba(0,0,0,0.3);
            overflow: hidden;
        }
        .content-grid {
            display: grid;
            grid-template-columns: 250px 1fr;
            min-height: 500px;
        }
        .menu {
            background: #f8f9fa;
            padding: 30px 20px;
            border-right: 2px solid #dee2e6;
        }
        .menu h5 {
            color: #00008b;
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
            background: #00008b;
            color: white;
            /* transform: translateX(5px); */
        }
        .content-area {
            padding: 50px;
        }
        .login-form {
            max-width: 500px;
            margin: 0 auto;
        }
        .form-label {
            font-weight: 600;
            color: #495057;
            margin-bottom: 8px;
        }
        .form-control {
            padding: 12px;
            border: 2px solid #dee2e6;
            border-radius: 8px;
            transition: all 0.3s;
        }
        .form-control:focus {
            border-color: #00008b;
            box-shadow: 0 0 0 0.2rem rgba(102, 126, 234, 0.25);
        }
        .btn-login {
            background: #00008b;
            color: white;
            padding: 12px 40px;
            border: none;
            border-radius: 8px;
            font-weight: bold;
            transition: all 0.3s;
            width: 100%;
        }
        .btn-login:hover {
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
            width: 100%;
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
        .alert {
            border-radius: 10px;
            padding: 15px 20px;
            margin-bottom: 25px;
        }
        .form-check-label {
            margin-left: 5px;
        }
        .back-link{
            display: inline-block;
            margin-top: 25px;
            color: #00008b;
            text-decoration: none;
            transition: all 0.3s;
            border: 2px solid #00008b;
            border-radius: 8px;
            padding: 12px 25px;
        }
        .back-link:hover{
            background: #00008b;
            color: white;
        }
    </style>
</head>
<body>
    <div class="main-container">
        <!-- Banner -->
        <div class="banner">
            <h1 class="mb-2">BANNER WEBSITE</h1>
            <p class="mb-0">Bài 2.2 - Trang Đăng Nhập</p>
        </div>
        
        <!-- Content Wrapper -->
        <div class="content-wrapper">
            <div class="content-grid">
                <!-- Menu -->
                <div class="menu">
                    <h5>Menu</h5>
                    <a href="#" class="menu-item">Trang chủ</a>
                    <a href="#" class="menu-item">Đăng ký</a>
                    <a href="#" class="menu-item active">Đăng nhập</a>
                </div>
                
                <!-- Content Area -->
                <div class="content-area">
                    <h2 class="text-center mb-4" style="color: #00008b;">THÔNG TIN ĐĂNG NHẬP</h2>
                    
                    <?php
                    // Xử lý đăng nhập
                    $message = '';
                    $messageType = '';
                    
                    if ($_SERVER['REQUEST_METHOD'] == 'POST') {
                        $email = isset($_POST['email']) ? trim($_POST['email']) : '';
                        $password = isset($_POST['password']) ? trim($_POST['password']) : '';
                        
                        // Thông tin đăng nhập đúng
                        $correct_email = 'abc@gmail.com';
                        $correct_password = '123456';
                        
                        // Kiểm tra
                        if ($email === $correct_email && $password === $correct_password) {
                            $message = '🎉 Chúc mừng đăng nhập thành công!';
                            $messageType = 'success';
                        } else {
                            $message = '❌ Đăng nhập thất bại! Email hoặc mật khẩu không đúng.';
                            $messageType = 'danger';
                        }
                    }
                    ?>
                    
                    <!-- Hiển thị thông báo -->
                    <?php if ($message): ?>
                        <div class="alert alert-<?php echo $messageType; ?>" role="alert">
                            <strong><?php echo $message; ?></strong>
                            <?php if ($messageType === 'danger'): ?>
                                <br><small>Gợi ý: Email: abc@gmail.com | Password: 123456</small>
                            <?php endif; ?>
                        </div>
                    <?php endif; ?>
                    
                    <!-- Form đăng nhập -->
                    <div class="login-form">
                        <form method="POST" action="">
                            <div class="mb-4">
                                <label for="email" class="form-label">Email</label>
                                <input type="email" 
                                       class="form-control" 
                                       id="email" 
                                       name="email" 
                                       placeholder="abc@gmail.com"
                                       required>
                            </div>
                            
                            <div class="mb-4">
                                <label for="password" class="form-label">Password</label>
                                <input type="password" 
                                       class="form-control" 
                                       id="password" 
                                       name="password" 
                                       placeholder="Nhập mật khẩu"
                                       required>
                            </div>
                            
                            <div class="mb-4">
                                <div class="form-check">
                                    <input class="form-check-input" 
                                           type="checkbox" 
                                           id="remember" 
                                           name="remember">
                                    <label class="form-check-label" for="remember">
                                        Nhớ thông tin đăng nhập
                                    </label>
                                </div>
                            </div>
                            
                            <div class="row g-3">
                                <div class="col-md-6">
                                    <button type="submit" class="btn-login">Đăng nhập</button>
                                </div>
                                <div class="col-md-6">
                                    <button type="reset" class="btn-reset">Làm lại</button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
        
        <!-- Footer -->
        <div class="footer">
            <p class="mb-0">
                <a href="../" class="back-link">← Quay lại</a>
    </div>
</body>
</html>