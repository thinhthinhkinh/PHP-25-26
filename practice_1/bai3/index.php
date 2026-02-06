<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Bài 2</title>
</head>
<body>
<!DOCTYPE html>
<html lang="vi">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Bài 1.1 - Hello PHP</title>
    <style>
        *{
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }
        body{
            font-family: 'Segoe UI', Arial, sans-serif;
            background: linear-gradient(135deg, #00008b 0%, #764ba2 100%);
            min-height: 100vh;
            padding: 40px 20px;
            display: flex;
            justify-content: center;
            align-items: center;

        }
        .container{
            background: white;
            padding: 60px;
            border-radius: 20px;
            text-align: center;
            
        }
        h1{
            color: #00008b;
            margin-bottom: 20px;
        }
        .message{
            border-radius: 15px;
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
        <h1> Bài 3</h1>
        
        <div class="message">
        <?php
                        function UCLN($a, $b) {
                            $a = abs($a);
                            $b = abs($b);
                            
                            while ($b != 0) {
                                $temp = $b;
                                $b = $a % $b;
                                $a = $temp;
                            }
                            return $a;
                        }

                        function BCNN($a, $b) {
                            // Tránh chia cho 0
                            if ($a == 0 || $b == 0) {
                                return 0;
                            }
                            
                            // Sử dụng công thức: BCNN = (a * b) / UCLN
                            $ucln = UCLN($a, $b);
                            return abs(($a * $b) / $ucln);
                        }
                        
                        // Tạo 2 số ngẫu nhiên
                        $x = rand(10, 100);
                        $y = rand(10, 100);
                        
                        // Tính UCLN và BCNN
                        $ucln = UCLN($x, $y);
                        $bcnn = BCNN($x, $y);

                        echo "<p>Giá trị của x là: $x</p>";
                        echo "<p>Giá trị của y là: $y</p>"; 
                        echo "<p>Ước chung lớn nhất (UCLN) của $x và $y là: $ucln</p>";
                        echo "<p>Bội chung nhỏ nhất (BCNN) của $x và $y là: $bcnn</p>";
                        ?>
        </div>
        
        <a href="../" class="back-link">← Quay lại</a>
    </div>
</body>
</html>
</body>
</html>