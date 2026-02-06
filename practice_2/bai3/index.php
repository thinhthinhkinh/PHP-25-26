<!DOCTYPE html>
<html lang="vi">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Bài 3 - Nhận Dạng Tam Giác</title>
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
            flex: 1;
            padding: 5px;
            border: 1px solid #999;
            font-size: 1rem;
        }
        
        .form-group span {
            margin-left: 5px;
            color: #666;
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
        <h3><i>Bài 3</i></h3>
        
        <div class="form-box">
            <div class="form-title">NHẬN DẠNG TAM GIÁC</div>
            
            <?php
            $canh1 = '';
            $canh2 = '';
            $canh3 = '';
            $loaiTamGiac = '';

            if ($_SERVER['REQUEST_METHOD'] == 'POST') {
                $canh1 = $_POST['canh1'];
                $canh2 = $_POST['canh2'];
                $canh3 = $_POST['canh3'];
                
                // Kiểm tra input hợp lệ
                if (is_numeric($canh1) && is_numeric($canh2) && is_numeric($canh3)) {
                    $a = floatval($canh1);
                    $b = floatval($canh2);
                    $c = floatval($canh3);
                    
                    // Kiểm tra có phải tam giác không
                    if ($a > 0 && $b > 0 && $c > 0 && 
                        $a + $b > $c && $b + $c > $a && $a + $c > $b) {
                        
                        // Tam giác đều
                        if ($a == $b && $b == $c) {
                            $loaiTamGiac = "Tam giác đều";
                        }
                        // Tam giác vuông cân
                        else if (($a == $b && $a*$a + $b*$b == $c*$c) ||
                                 ($b == $c && $b*$b + $c*$c == $a*$a) ||
                                 ($a == $c && $a*$a + $c*$c == $b*$b)) {
                            $loaiTamGiac = "Tam giác vuông cân";
                        }
                        // Tam giác vuông
                        else if (abs($a*$a + $b*$b - $c*$c) < 0.0001 ||
                                 abs($b*$b + $c*$c - $a*$a) < 0.0001 ||
                                 abs($a*$a + $c*$c - $b*$b) < 0.0001) {
                            $loaiTamGiac = "Tam giác vuông";
                        }
                        // Tam giác cân
                        else if ($a == $b || $b == $c || $a == $c) {
                            $loaiTamGiac = "Tam giác cân";
                        }
                        // Tam giác thường
                        else {
                            $loaiTamGiac = "Tam giác thường";
                        }
                    } else {
                        $loaiTamGiac = "Không phải tam giác";
                    }
                } else {
                    $loaiTamGiac = "Vui lòng nhập số hợp lệ";
                }
            }
            ?>
            
            <form method="POST" action="">
                <div class="form-group">
                    <label>Cạnh 1:</label>
                    <input type="text" name="canh1" value="<?php echo $canh1; ?>">
                    <span>(cm)</span>
                </div>
                
                <div class="form-group">
                    <label>Cạnh 2:</label>
                    <input type="text" name="canh2" value="<?php echo $canh2; ?>">
                    <span>(cm)</span>
                </div>
                
                <div class="form-group">
                    <label>Cạnh 3:</label>
                    <input type="text" name="canh3" value="<?php echo $canh3; ?>">
                    <span>(cm)</span>
                </div>
                
                <div class="form-group">
                    <label>Loại tam giác:</label>
                    <input type="text" class="result-input" value="<?php echo $loaiTamGiac; ?>" readonly>
                </div>
                
                <div class="button-container">
                    <button type="submit">Nhận dạng</button>
                </div>
            </form>
        </div>
        <a href="../" class="back-link">← Quay lại</a>
    </div>
</body>
</html>