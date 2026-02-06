<!DOCTYPE html>
<html lang="vi">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Bài 2.3 - Máy Tính</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <style>
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }
        body {
            font-family: 'Segoe UI', Arial, sans-serif;
            background: linear-gradient(135deg, #00008b 0%, #764ba2 100%);
            min-height: 100vh;
            padding: 40px 20px;
            display: flex;
            align-items: center;
        }
        .calculator-container {
            max-width: 700px;
            margin: 0 auto;
            background: white;
            border-radius: 20px;
            box-shadow: 0 20px 60px rgba(0,0,0,0.3);
            overflow: hidden;
        }
        .calculator-header {
            background: linear-gradient(135deg, #00008b 0%, #764ba2 100%);
            color: white;
            padding: 30px;
            text-align: center;
        }
        .calculator-body {
            padding: 40px;
        }
        .input-group-custom {
            display: flex;
            align-items: center;
            gap: 15px;
            margin-bottom: 25px;
        }
        .input-group-custom label {
            font-weight: bold;
            font-size: 1.3em;
            min-width: 60px;
            color: #495057;
        }
        .input-group-custom input {
            flex: 1;
            padding: 15px;
            border: 2px solid #dee2e6;
            border-radius: 10px;
            font-size: 1.2em;
            text-align: center;
            transition: all 0.3s;
        }
        .input-group-custom input:focus {
            outline: none;
            border-color: #00008b;
            box-shadow: 0 0 0 0.2rem rgba(102, 126, 234, 0.25);
        }
        .operators {
            display: grid;
            grid-template-columns: repeat(4, 1fr);
            gap: 15px;
            margin: 30px 0;
        }
        .operator-btn {
            background: white;
            border: 3px solid #00008b;
            color: #00008b;
            padding: 20px;
            font-size: 1.8em;
            font-weight: bold;
            border-radius: 12px;
            cursor: pointer;
            transition: all 0.3s;
        }
        .operator-btn:hover {
            background: #00008b;
            color: white;
            transform: translateY(-3px);
            box-shadow: 0 5px 15px rgba(102, 126, 234, 0.4);
        }
        .operator-btn:active {
            transform: translateY(0);
        }
        .result-box {
            background: linear-gradient(135deg, #f8f9fa 0%, #e9ecef 100%);
            padding: 25px;
            border-radius: 12px;
            border: 3px solid #00008b;
            text-align: center;
            margin-top: 30px;
        }
        .result-box h4 {
            color: #00008b;
            margin-bottom: 15px;
        }
        .result-text {
            font-size: 1.8em;
            font-weight: bold;
            color: #28a745;
        }
        .back-link {
            display: block;
            text-align: center;
            margin-top: 30px;
            padding: 12px;
            background: #f8f9fa;
            border-radius: 10px;
            text-decoration: none;
            color: #00008b;
            font-weight: bold;
            transition: all 0.3s;
        }
        .back-link:hover {
            background: #00008b;
            color: white;
        }
    </style>
</head>
<body>
    <div class="calculator-container">
        <!-- Header -->
        <div class="calculator-header">
            <h1 class="mb-2"> MÁY TÍNH</h1>
            <p class="mb-0">Bài 2.3 - Thực hiện các phép tính cơ bản</p>
        </div>
        
        <!-- Body -->
        <div class="calculator-body">
            <form method="POST" action="">
                <!-- Input A -->
                <div class="input-group-custom">
                    <label for="a">a =</label>
                    <input type="number" 
                           id="a" 
                           name="a" 
                           step="any"
                           value="<?php echo isset($_POST['a']) ? $_POST['a'] : ''; ?>"
                           placeholder="Nhập số a"
                           required>
                </div>
                
                <!-- Input B -->
                <div class="input-group-custom">
                    <label for="b">b =</label>
                    <input type="number" 
                           id="b" 
                           name="b" 
                           step="any"
                           value="<?php echo isset($_POST['b']) ? $_POST['b'] : ''; ?>"
                           placeholder="Nhập số b"
                           required>
                </div>
                
                <!-- Operators -->
                <div class="operators">
                    <button type="submit" name="operator" value="+" class="operator-btn">+</button>
                    <button type="submit" name="operator" value="-" class="operator-btn">−</button>
                    <button type="submit" name="operator" value="*" class="operator-btn">×</button>
                    <button type="submit" name="operator" value="/" class="operator-btn">÷</button>
                </div>
            </form>
            
            <?php
            // Xử lý tính toán
            if ($_SERVER['REQUEST_METHOD'] == 'POST') {
                $a = isset($_POST['a']) ? floatval($_POST['a']) : 0;
                $b = isset($_POST['b']) ? floatval($_POST['b']) : 0;
                $operator = isset($_POST['operator']) ? $_POST['operator'] : '';
                
                $result = 0;
                $operation = '';
                $error = '';
                
                switch ($operator) {
                    case '+':
                        $result = $a + $b;
                        $operation = "$a + $b";
                        break;
                    case '-':
                        $result = $a - $b;
                        $operation = "$a − $b";
                        break;
                    case '*':
                        $result = $a * $b;
                        $operation = "$a × $b";
                        break;
                    case '/':
                        if ($b == 0) {
                            $error = 'Không thể chia cho 0!';
                        } else {
                            $result = $a / $b;
                            $operation = "$a ÷ $b";
                        }
                        break;
                }
                
                // Hiển thị kết quả
                echo '<div class="result-box">';
                echo '<h4> Kết quả:</h4>';
                
                if ($error) {
                    echo '<div class="result-text" style="color: #dc3545;">' . $error . '</div>';
                } else {
                    // Format số để dễ đọc
                    $formatted_result = number_format($result, 2, '.', ',');
                    // Bỏ .00 nếu là số nguyên
                    if (floor($result) == $result) {
                        $formatted_result = number_format($result, 0, '.', ',');
                    }
                    
                    echo '<div class="result-text">' . $operation . ' = ' . $formatted_result . '</div>';
                }
                
                echo '</div>';
            }
            ?>
            
            <a href="../" class="back-link">← Quay lại Chương 2</a>
        </div>
    </div>
</body>
</html>