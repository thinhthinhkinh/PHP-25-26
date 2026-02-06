<!DOCTYPE html>
<html lang="vi">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Bài 7 - Giải Phương Trình Bậc Nhất</title>
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
            max-width: 550px;
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
            width: 60px;
            padding: 5px;
            border: 1px solid #999;
            font-size: 1rem;
            text-align: center;
        }
        
        .form-group .equation {
            margin: 0 8px;
            font-size: 1.1rem;
        }
        
        .result-input {
            background: #ffcccc !important;
            width: 100% !important;
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
        <h3><i>Bài 7.</i> Viết trang PHP Giải phương trình bậc nhất.</h3>
        
        <div class="form-box">
            <div class="form-title">GIẢI PHƯƠNG TRÌNH BẬC NHẤT</div>
            
            <?php
            // Khởi tạo biến
            $a = '';
            $b = '';
            $nghiem = '';
            
            // Xử lý khi form được submit
            if ($_SERVER['REQUEST_METHOD'] == 'POST') {
                $a = $_POST['a'];
                $b = $_POST['b'];
                
                // Kiểm tra và giải phương trình ax + b = 0
                if (is_numeric($a) && is_numeric($b)) {
                    if ($a == 0) {
                        if ($b == 0) {
                            $nghiem = "Phương trình vô số nghiệm";
                        } else {
                            $nghiem = "Phương trình vô nghiệm";
                        }
                    } else {
                        // x = -b/a
                        $x = -$b / $a;
                        $nghiem = "x = " . round($x, 2);
                    }
                }
            }
            ?>
            
            <form method="POST" action="">
                <div class="form-group">
                    <label>Phương trình:</label>
                    <input type="text" name="a" value="<?php echo $a; ?>" style="width: 60px;">
                    <span class="equation">x +</span>
                    <input type="text" name="b" value="<?php echo $b; ?>" style="width: 60px;">
                    <span class="equation">= 0</span>
                </div>
                
                <div class="form-group">
                    <label>Nghiệm:</label>
                    <input type="text" class="result-input" value="<?php echo $nghiem; ?>" readonly>
                </div>
                
                <div class="button-container">
                    <button type="submit">Giải phương trình</button>
                </div>
            </form>
        </div>
        <a href="../" class="back-link">← Quay lại</a>
    </div>
</body>
</html>