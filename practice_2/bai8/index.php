<!DOCTYPE html>
<html lang="vi">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Bài 8 - Kết Quả Học Tập</title>
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
            background: #ffb6c1;
            padding: 30px;
            border: 1px solid #ddd;
        }
        
        .form-title {
            background: #d946a6;
            color: white;
            text-align: center;
            padding: 10px;
            font-size: 1.3rem;
            font-weight: bold;
            margin-bottom: 20px;
            border: 1px solid #c23a93;
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
            background: #ffffcc !important;
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
        <h3><i>Bài 8</i></h3>
        
        <div class="form-box">
            <div class="form-title">KẾT QUẢ HỌC TẬP</div>
            
            <?php
            $diemHK1 = '';
            $diemHK2 = '';
            $diemTB = '';
            $ketQua = '';
            $xepLoai = '';
            
            if ($_SERVER['REQUEST_METHOD'] == 'POST') {
                $diemHK1 = $_POST['diem_hk1'];
                $diemHK2 = $_POST['diem_hk2'];
                
                // Kiểm tra và tính toán
                if (is_numeric($diemHK1) && is_numeric($diemHK2)) {
                    $hk1 = floatval($diemHK1);
                    $hk2 = floatval($diemHK2);
                    
                    // Kiểm tra điểm hợp lệ (0-10)
                    if ($hk1 >= 0 && $hk1 <= 10 && $hk2 >= 0 && $hk2 <= 10) {
                        // Tính điểm trung bình
                        $diemTB = ($hk1 + $hk2) / 2;
                        $diemTB = round($diemTB, 1);
                        
                        // Xét kết quả
                        if ($diemTB >= 5) {
                            $ketQua = "Được lên lớp";
                        } else {
                            $ketQua = "Ở lại lớp";
                        }
                        
                        // Xếp loại học lực
                        if ($diemTB >= 9) {
                            $xepLoai = "Xuất sắc";
                        } elseif ($diemTB >= 8) {
                            $xepLoai = "Giỏi";
                        } elseif ($diemTB >= 6.5) {
                            $xepLoai = "Khá";
                        } elseif ($diemTB >= 5) {
                            $xepLoai = "Trung bình";
                        } else {
                            $xepLoai = "Yếu";
                        }
                    }
                }
            }
            ?>
            
            <form method="POST" action="">
                <div class="form-group">
                    <label>Điểm HK1:</label>
                    <input type="text" name="diem_hk1" value="<?php echo $diemHK1; ?>">
                </div>
                
                <div class="form-group">
                    <label>Điểm HK2:</label>
                    <input type="text" name="diem_hk2" value="<?php echo $diemHK2; ?>">
                </div>
                
                <div class="form-group">
                    <label>Điểm trung bình:</label>
                    <input type="text" class="result-input" value="<?php echo $diemTB; ?>" readonly>
                </div>
                
                <div class="form-group">
                    <label>Kết quả:</label>
                    <input type="text" class="result-input" value="<?php echo $ketQua; ?>" readonly>
                </div>
                
                <div class="form-group">
                    <label>Xếp loại học lực:</label>
                    <input type="text" class="result-input" value="<?php echo $xepLoai; ?>" readonly>
                </div>
                
                <div class="button-container">
                    <button type="submit">Xem kết quả</button>
                </div>
            </form>
        </div>
        <a href="../" class="back-link">← Quay lại</a>
    </div>
</body>
</html>