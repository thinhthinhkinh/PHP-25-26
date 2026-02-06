<!DOCTYPE html>
<html lang="vi">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Bài 2 - Diện Tích và Chu Vi Hình Tròn</title>
    <style>
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }
        
        body {
            font-family: Arial, sans-serif;
            background: #f0f0f0;
            padding: 50px 20px;
        }
        
        .container {
            max-width: 500px;
            margin: 0 auto;
        }
        
        h3 {
            text-align: left;
            margin-bottom: 20px;
            font-style: italic;
        }
        
        .form-box {
            background: #ffe4b5;
            padding: 30px;
            border: 1px solid #ddd;
        }
        
        .form-title {
            background: linear-gradient(to right, #ff9933, #ffcc66);
            color: #8b4513;
            text-align: center;
            padding: 10px;
            font-size: 1.3rem;
            font-weight: bold;
            margin-bottom: 20px;
            border: 1px solid #cc7722;
        }
        
        .form-group {
            margin-bottom: 15px;
            display: flex;
            align-items: center;
        }
        
        .form-group label {
            width: 120px;
            font-weight: normal;
        }
        
        .form-group input {
            flex: 1;
            padding: 5px;
            border: 1px solid #999;
            font-size: 1rem;
        }
        
        .result-input {
            background: #ffcccc !important;
        }
        
        .button-container {
            text-align: center;
            margin-top: 20px;
        }
        
        button {
            padding: 5px 30px;
            font-size: 1rem;
            cursor: pointer;
            border: 1px solid #666;
            background: #ddd;
        }
        
        button:hover {
            background: #ccc;
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
    <div class="container">
        <h3><i>Bài 2</i></h3>
        
        <div class="form-box">
            <div class="form-title">DIỆN TÍCH và CHU VI HÌNH TRÒN</div>
            
            <?php
            $banKinh = '';
            $dienTich = '';
            $chuVi = '';

            if ($_SERVER['REQUEST_METHOD'] == 'POST') {
                $banKinh = $_POST['ban_kinh'];
                
                // Tính diện tích và chu vi
                if (is_numeric($banKinh) && $banKinh > 0) {
                    // Diện tích = π × r²
                    $dienTich = pi() * pow($banKinh, 2);
                    
                    // Chu vi = 2 × π × r
                    $chuVi = 2 * pi() * $banKinh;
                    
                    // Làm tròn kết quả
                    $dienTich = round($dienTich, 2);
                    $chuVi = round($chuVi, 2);
                }
            }
            ?>
            
            <form method="POST" action="">
                <div class="form-group">
                    <label>Bán kính:</label>
                    <input type="text" name="ban_kinh" value="<?php echo $banKinh; ?>">
                </div>
                
                <div class="form-group">
                    <label>Diện tích:</label>
                    <input type="text" class="result-input" value="<?php echo $dienTich; ?>" readonly>
                </div>
                
                <div class="form-group">
                    <label>Chu vi:</label>
                    <input type="text" class="result-input" value="<?php echo $chuVi; ?>" readonly>
                </div>
                
                <div class="button-container">
                    <button type="submit">Tính</button>
                </div>
            </form>
        </div>
        <a href="../" class="back-link">← Quay lại</a>
    </div>
</body>
</html>