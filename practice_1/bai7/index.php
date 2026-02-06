<!DOCTYPE html>
<html lang="vi">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Bài 7</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <style>
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }
        
        body {
            font-family: 'Segoe UI', Arial, sans-serif;
            background: linear-gradient(135deg, #00008b 0%, #4169e1 100%);
            min-height: 100vh;
            padding: 40px 20px;
        }
        
        .container {
            background: white;
            padding: 40px;
            border-radius: 20px;
            box-shadow: 0 10px 30px rgba(0,0,0,0.3);
            max-width: 1000px;
        }
        
        h1 {
            color: #00008b;
            text-align: center;
            margin-bottom: 30px;
            font-weight: bold;
        }
        
        h4 {
            color: #00008b;
            margin-top: 25px;
            margin-bottom: 15px;
            padding-bottom: 10px;
            border-bottom: 3px solid #00008b;
        }
        
        .number-badge {
            display: inline-block;
            background: #00008b;
            color: white;
            padding: 8px 15px;
            margin: 5px;
            border-radius: 8px;
            font-size: 1.1rem;
            font-weight: bold;
        }
        
        .even-number {
            background: #28a745;
        }
        
        .odd-number {
            background: #dc3545;
        }
        
        .result-box {
            background: #f8f9fa;
            border-left: 4px solid #00008b;
            padding: 15px;
            margin: 15px 0;
            border-radius: 5px;
        }
        
        .result-box p {
            margin: 8px 0;
            font-size: 1.1rem;
        }
        
        .result-box strong {
            color: #00008b;
        }
        
        .info-header {
            background: #00008b;
            color: white;
            padding: 15px;
            border-radius: 10px;
            margin-bottom: 25px;
            text-align: center;
        }
        
        .reversed-badge {
            background: #6c757d;
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
        <h1>Bài 7</h1>
        
        <?php
        // ========================= CÁC HÀM XỬ LÝ =========================
        
        /**
         * Hàm a: Xuất mảng lên trang Web
         */
        function xuatMang($arr) {
            echo "<div class='text-center'>";
            foreach ($arr as $value) {
                echo "<span class='number-badge'>$value</span>";
            }
            echo "</div>";
        }
        
        /**
         * Hàm b: Đếm tổng số chẵn có trong mảng
         */
        function demSoChan($arr) {
            $count = 0;
            foreach ($arr as $value) {
                if ($value % 2 == 0) {
                    $count++;
                }
            }
            return $count;
        }
        
        /**
         * Hàm c: Tính tổng của các số lẻ trong mảng
         */
        function tongSoLe($arr) {
            $sum = 0;
            foreach ($arr as $value) {
                if ($value % 2 != 0) {
                    $sum += $value;
                }
            }
            return $sum;
        }
        
        /**
         * Hàm d: Xuất ra giá trị lớn nhất, nhỏ nhất của mảng
         */
        function timMinMax($arr) {
            return array(
                'min' => min($arr),
                'max' => max($arr)
            );
        }
        
        /**
         * Hàm e: Xuất đảo ngược các giá trị trong mảng
         */
        function daoNguocMang($arr) {
            return array_reverse($arr);
        }
        
        /**
         * Hàm hiển thị các số chẵn với màu xanh lá
         */
        function hienThiSoChan($arr) {
            echo "<div class='text-center'>";
            foreach ($arr as $value) {
                if ($value % 2 == 0) {
                    echo "<span class='number-badge even-number'>$value</span>";
                }
            }
            echo "</div>";
        }
        
        /**
         * Hàm hiển thị các số lẻ với màu đỏ
         */
        function hienThiSoLe($arr) {
            echo "<div class='text-center'>";
            foreach ($arr as $value) {
                if ($value % 2 != 0) {
                    echo "<span class='number-badge odd-number'>$value</span>";
                }
            }
            echo "</div>";
        }
        
        $n = 15;
        
        // Tạo mảng n phần tử ngẫu nhiên từ 1 đến 100
        $arr = array();
        for ($i = 0; $i < $n; $i++) {
            $arr[] = rand(1, 100);
        }
        
        // Thực hiện các hàm
        $soChan = demSoChan($arr);
        $tongLe = tongSoLe($arr);
        $minMax = timMinMax($arr);
        $arrReversed = daoNguocMang($arr);
        ?>
        
        <!-- Thông tin mảng -->
        <div class="info-header">
            <h5 style="margin: 0;"> Mảng gồm <?php echo $n; ?> phần tử ngẫu nhiên (1-100)</h5>
        </div>
        
        <!-- a. Xuất mảng -->
        <h4>a. Xuất Mảng:</h4>
        <?php xuatMang($arr); ?>
        
        <!-- b. Đếm số chẵn -->
        <h4>b. Đếm Tổng Số Chẵn:</h4>
        <div class="result-box">
            <p><strong>Số lượng số chẵn:</strong> <?php echo $soChan; ?> số</p>
            <p><strong>Các số chẵn:</strong></p>
            <?php hienThiSoChan($arr); ?>
        </div>
        
        <!-- c. Tổng số lẻ -->
        <h4>c. Tính Tổng Các Số Lẻ:</h4>
        <div class="result-box">
            <p><strong>Tổng các số lẻ:</strong> <?php echo $tongLe; ?></p>
            <p><strong>Các số lẻ:</strong></p>
            <?php hienThiSoLe($arr); ?>
        </div>
        
        <!-- d. Min, Max -->
        <h4>d. Giá Trị Lớn Nhất & Nhỏ Nhất:</h4>
        <div class="result-box">
            <p><strong>Giá trị nhỏ nhất (Min):</strong> <?php echo $minMax['min']; ?></p>
            <p><strong>Giá trị lớn nhất (Max):</strong> <?php echo $minMax['max']; ?></p>
            <p><strong>Khoảng cách:</strong> <?php echo ($minMax['max'] - $minMax['min']); ?></p>
        </div>
        
        <!-- e. Đảo ngược mảng -->
        <h4>e. Đảo Ngược Mảng:</h4>
        <div class="result-box">
            <p><strong>Mảng gốc:</strong></p>
            <?php xuatMang($arr); ?>
            <p style="margin-top: 15px;"><strong>Mảng đảo ngược:</strong></p>
            <div class='text-center'>
            <?php
                foreach ($arrReversed as $value) {
                    echo "<span class='number-badge reversed-badge'>$value</span>";
                }
            ?>
            </div>
        </div>
    
        <a href="../" class="back-link">← Quay lại</a>
    </div>
    
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>