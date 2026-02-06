<!DOCTYPE html>
<html lang="vi">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Bài 6 - Tính Giai Thừa</title>
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
            width: 150px;
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
        
        .error {
            color: red;
            font-size: 0.9rem;
            margin-top: 5px;
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
        <h3><i>Bài 6</i></h3>
        
        <div class="form-box">
            <div class="form-title">TÍNH GIAI THỪA</div>
            
            <?php
            $n = '';
            $giaiThua = '';
            $error = '';

            if ($_SERVER['REQUEST_METHOD'] == 'POST') {
                $n = trim($_POST['n']);
                
                // Kiểm tra dữ liệu hợp lệ
                if ($n === '') {
                    $error = 'Vui lòng nhập số n!';
                } elseif (!is_numeric($n)) {
                    $error = 'Vui lòng nhập số hợp lệ!';
                } elseif ($n < 0) {
                    $error = 'Số n phải là số nguyên không âm!';
                } elseif (floor($n) != $n) {
                    $error = 'Số n phải là số nguyên!';
                } elseif ($n > 20) {
                    $error = 'Số n quá lớn (tối đa 20)!';
                } else {
                    // Tính giai thừa n!
                    $n_int = intval($n);
                    $giaiThua = 1;
                    
                    for ($i = 1; $i <= $n_int; $i++) {
                        $giaiThua *= $i;
                    }
                    
                    // Định dạng số với dấu phẩy
                    $giaiThua = number_format($giaiThua, 0, ',', '.');
                }
            }
            ?>
            
            <form method="POST" action="">
                <div class="form-group">
                    <label>Nhập n:</label>
                    <input type="text" name="n" value="<?php echo htmlspecialchars($n); ?>">
                </div>
                <?php if ($error): ?>
                    <div class="error"><?php echo $error; ?></div>
                <?php endif; ?>
                
                <div class="form-group">
                    <label>n! =</label>
                    <input type="text" class="result-input" value="<?php echo $giaiThua; ?>" readonly>
                </div>
                
                <div class="button-container">
                    <button type="submit">Tính giai thừa</button>
                </div>
            </form>
        </div>
        <a href="../" class="back-link">← Quay lại</a>
    </div>
</body>
</html>