<!DOCTYPE html>
<html lang="vi">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Chương 1 - PHP Cơ Bản</title>
    <style>
        * { margin: 0; padding: 0; box-sizing: border-box; }
        body {
            font-family: 'Segoe UI', Arial, sans-serif;
            background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
            min-height: 100vh;
            padding: 40px 20px;
        }
        .container {
            max-width: 1000px;
            margin: 0 auto;
        }
        .header {
            background: white;
            padding: 30px;
            border-radius: 15px;
            margin-bottom: 30px;
            box-shadow: 0 10px 30px rgba(0,0,0,0.2);
        }
        .header h1 {
            color: #667eea;
            margin-bottom: 10px;
        }
        .back-link {
            display: inline-block;
            color: #667eea;
            text-decoration: none;
            margin-bottom: 15px;
            font-weight: bold;
        }
        .back-link:hover {
            text-decoration: underline;
        }
        .exercises {
            display: grid;
            gap: 15px;
        }
        .exercise-item {
            background: white;
            padding: 20px;
            border-radius: 10px;
            box-shadow: 0 5px 15px rgba(0,0,0,0.1);
            display: flex;
            justify-content: space-between;
            align-items: center;
            transition: all 0.3s;
        }
        .exercise-item:hover {
            transform: translateX(5px);
            box-shadow: 0 8px 20px rgba(0,0,0,0.2);
        }
        .exercise-info h3 {
            color: #333;
            margin-bottom: 8px;
        }
        .exercise-info p {
            color: #666;
            font-size: 0.95em;
        }
        .btn {
            background: #667eea;
            color: white;
            padding: 10px 25px;
            text-decoration: none;
            border-radius: 8px;
            transition: all 0.3s;
            font-weight: bold;
        }
        .btn:hover {
            background: #5568d3;
        }
        .btn-disabled {
            background: #ccc;
            pointer-events: none;
        }
        .status-badge {
            display: inline-block;
            padding: 5px 12px;
            border-radius: 15px;
            font-size: 0.85em;
            margin-left: 10px;
        }
        .completed { background: #4CAF50; color: white; }
        .pending { background: #FF9800; color: white; }
    </style>
</head>
<body>
    <div class="container">
        <div class="header">
            <a href="../" class="back-link">← Quay lại trang chủ</a>
            <h1> Chương 1: Làm quen với PHP</h1>
            <p>Học về biến, kiểu dữ liệu, toán tử và cú pháp PHP cơ bản</p>
            <p><strong>Ngày:</strong> <?php echo date('d/m/Y'); ?></p>
        </div>
        
        <div class="exercises">
            <!-- Bài 1.1 -->
            <div class="exercise-item">
                <div class="exercise-info">
                    <h3>Bài 1.1: Hello PHP <span class="status-badge completed">Đã làm</span></h3>
                    <p>Viết trang PHP hiển thị câu "Hello PHP"</p>
                </div>
                <a href="bai1_1/" class="btn">Xem</a>
            </div>
            <!-- Bài 1.2 -->
            <div class="exercise-item">
                <div class="exercise-info">
                    <h3>Bài 1.2: Biến và Kiểu Dữ Liệu <span class="status-badge completed">Đã làm</span></h3>
                    <p>Khai báo và hiển thị các loại biến</p>
                </div>
                <a href="bai1_2/" class="btn">Xem</a>
            </div>
            <!-- Bài 1.3 -->
            <div class="exercise-item">
                <div class="exercise-info">
                    <h3>Bài 1.3: Toán Tử Cơ Bản <span class="status-badge completed">Đã làm</span></h3>
                    <p>Tính tổng, hiệu, tích, thương</p>
                </div>
                <a href="bai1_3/" class="btn">Xem</a>
            </div>
            <!-- Bài 1.4 -->
            <div class="exercise-item">
                <div class="exercise-info">
                    <h3>Bài 1.4: Loop <span class="status-badge completed">Đã làm</span></h3>
                    <p>In đậm số chẵn, in nghiêng số lẻ trong range [0;30]</p>
                </div>
                <a href="bai1_4/" class="btn">Xem</a>
            </div>
            <!--Bài 1.5-->
            <div class="exercise-item">
                <div class="exercise-info">
                    <h3>Bài 1.5: Table <span class="status-badge completed">Đang làm</span></h3>
                    <p>Tạo bảng gồm 2 cột và (10-0)+1 hàng để hiển thị giá trị pow(i, i+1)</p>
                </div>
                <a href="bai1_5/" class="btn">Xem</a>
            </div>
        </div>
    </div>
</body>
</html>