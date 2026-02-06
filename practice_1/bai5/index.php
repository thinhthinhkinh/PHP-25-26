<!DOCTYPE html>
<html lang="vi">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Bài 5</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
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
            display: flex;
            justify-content: center;
            align-items: center;
            padding: 20px;
        }
        
        .container {
            background: white;
            padding: 50px;
            border-radius: 20px;
            box-shadow: 0 10px 30px rgba(0,0,0,0.3);
            max-width: 600px;
            width: 100%;
        }
        
        h1 {
            color: #667eea;
            text-align: center;
            margin-bottom: 30px;
            font-weight: bold;
        }
        
        .form-label {
            font-weight: 600;
            color: #333;
            margin-bottom: 10px;
            font-size: 1.1rem;
        }
        
        select {
            padding: 12px;
            font-size: 1.1rem;
            border: 2px solid #00008b;
            border-radius: 10px;
            transition: all 0.3s;
        }
        
        select:focus {
            border-color: #764ba2;
            box-shadow: 0 0 0 0.2rem rgba(102, 126, 234, 0.25);
        }
        
        .info-box {
            background: linear-gradient(135deg, #00008b 0%, #764ba2 100%);
            color: white;
            padding: 20px;
            border-radius: 10px;
            margin-top: 25px;
            text-align: center;
        }
        
        .info-box h5 {
            margin: 0 0 10px 0;
            font-size: 1.2rem;
        }
        
        .info-box p {
            margin: 0;
            font-size: 2rem;
            font-weight: bold;
        }
        
        .year-info {
            background: #f8f9fa;
            padding: 15px;
            border-radius: 8px;
            margin-top: 15px;
            border-left: 4px solid #00008b;
        }
        
        .year-info p {
            margin: 5px 0;
            color: #666;
        }
        
        .year-info strong {
            color: #333;
        }
        
        .btn-submit {
            background: linear-gradient(135deg, #00008b 0%, #764ba2 100%);
            border: none;
            padding: 12px 30px;
            font-size: 1.1rem;
            border-radius: 10px;
            margin-top: 20px;
            width: 100%;
            transition: transform 0.2s;
        }
        
        .result-box {
            display: none;
            background: #00008b;
            color: white;
            padding: 20px;
            border-radius: 10px;
            margin-top: 20px;
            text-align: center;
        }
        
        .result-box.show {
            display: block;
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
        <h1>Bài 5</h1>
        
        <?php
            // Lấy năm hiện tại
            $currentYear = date('Y');
            
            // Năm bắt đầu
            $startYear = 1900;
            
            // Xử lý khi form được submit
            $selectedYear = '';
            $yearsFromNow = 0;
            if ($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['year'])) {
                $selectedYear = $_POST['year'];
                $yearsFromNow = $currentYear - $selectedYear;
            }
        ?>
        
        <form method="POST" action="" id="yearForm">
            <div class="mb-4">
                <label for="yearSelect" class="form-label">
                    Chọn năm từ danh sách (<?php echo $startYear; ?> - <?php echo $currentYear; ?>):
                </label>
                
                <select name="year" id="yearSelect" class="form-select form-select-lg" required>
                    <option value="">-- Vui lòng chọn năm --</option>
                    <?php
                        // Vòng lặp tạo các option từ năm hiện tại về 1900
                        for ($year = $currentYear; $year >= $startYear; $year--) {
                            // Đánh dấu năm đã chọn
                            $selected = ($selectedYear == $year) ? 'selected' : '';
                            echo "<option value='$year' $selected>$year</option>";
                        }
                    ?>
                </select>
            </div>
            
            <button type="submit" class="btn btn-primary btn-submit">
                Xác Nhận Năm
            </button>
        </form>
        
        <?php if ($selectedYear): ?>
            <div class="result-box show">
                <h5> Năm Bạn Đã Chọn</h5>
                <p style="font-size: 2.5rem; margin: 10px 0; font-weight: bold;">
                    <?php echo $selectedYear; ?>
                </p>
                <p style="margin: 0; font-size: 1.1rem;">
                    <?php 
                        if ($yearsFromNow == 0) {
                            echo "Đây là năm hiện tại!";
                        } elseif ($yearsFromNow == 1) {
                            echo "Cách đây 1 năm";
                        } else {
                            echo "Cách đây $yearsFromNow năm";
                        }
                    ?>
                </p>
            </div>
        <?php endif; ?>
        
        <div class="year-info">
            <p><strong> Thông tin:</strong></p>
            <p>• Năm hiện tại: <strong><?php echo $currentYear; ?></strong></p>
            <p>• Tổng số năm: <strong><?php echo ($currentYear - $startYear + 1); ?> năm</strong></p>
            <p>• Khoảng: <strong><?php echo $startYear; ?> - <?php echo $currentYear; ?></strong></p>
        </div>
        <a href="../" class="back-link">← Quay lại</a>
    </div>
    

</body>
</html>