<!DOCTYPE html>
<html lang="vi">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>PTUD WEB PHP - HK2 2025-2026</title>
    <style>
        * { margin: 0; padding: 0; box-sizing: border-box; }
        body {
            font-family: 'Segoe UI', Arial, sans-serif;
            background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
            min-height: 100vh;
            padding: 40px 20px;
        }
        .container {
            max-width: 1200px;
            margin: 0 auto;
        }
        .header {
            background: white;
            padding: 40px;
            border-radius: 15px;
            text-align: center;
            margin-bottom: 30px;
            box-shadow: 0 10px 30px rgba(0,0,0,0.2);
        }
        .header h1 {
            color: #667eea;
            font-size: 2.5em;
            margin-bottom: 10px;
        }
        .header p {
            color: #666;
            font-size: 1.1em;
        }
        .chapters {
            display: grid;
            grid-template-columns: repeat(auto-fit, minmax(300px, 1fr));
            gap: 20px;
        }
        .chapter-card {
            background: white;
            padding: 30px;
            border-radius: 15px;
            box-shadow: 0 10px 30px rgba(0,0,0,0.2);
            transition: transform 0.3s, box-shadow 0.3s;
        }
        .chapter-card:hover {
            transform: translateY(-5px);
            box-shadow: 0 15px 40px rgba(0,0,0,0.3);
        }
        .chapter-card h2 {
            color: #667eea;
            margin-bottom: 15px;
            font-size: 1.8em;
        }
        .chapter-card p {
            color: #666;
            margin-bottom: 20px;
            line-height: 1.6;
        }
        .btn {
            display: inline-block;
            background: #667eea;
            color: white;
            padding: 12px 30px;
            text-decoration: none;
            border-radius: 8px;
            transition: all 0.3s;
            font-weight: bold;
        }
        .btn:hover {
            background: #5568d3;
            transform: scale(1.05);
        }
        .btn-disabled {
            background: #999;
            pointer-events: none;
        }
        .info-badge {
            display: inline-block;
            padding: 5px 15px;
            border-radius: 20px;
            font-size: 0.9em;
            margin-top: 10px;
        }
        .badge-active { background: #4CAF50; color: white; }
        .badge-inactive { background: #999; color: white; }
    </style>
</head>
<body>
    <div class="container">
        <div class="header">
            <h1> PHÁT TRIỂN ỨNG DỤNG WEB - PHP</h1>
            <p><strong>Author:</strong> Phạm Võ Trường Thịnh | <strong>Học kỳ:</strong> 2 (2025-2026)</p>
            <p><strong>Ngày cập nhật:</strong> <?php echo date('d/m/Y H:i'); ?></p>
        </div>
        
        <div class="chapters">
            <!-- Chương 1 -->
            <div class="chapter-card">
                <h2> Chương 1</h2>
                <p>PHP Cơ Bản - Biến, kiểu dữ liệu, toán tử, cú pháp cơ bản</p>
                <span class="info-badge badge-active">🟢 Đang học</span>
                <br><br>
                <a href="chuong1/" class="btn">Xem bài tập →</a>
            </div>
            
            <!-- Chương 2 -->
            <div class="chapter-card">
                <h2> Chương 2</h2>
                <p>Phân biệt được phương pháp truyền biến cơ bản - Vận dụng truyền biến qua form và thông qua đường liên kết (link)</p>
                <span class="info-badge badge-active">🟢 Đang học</span>
                <br><br>
                <a href="chuong2/" class="btn">Xem bài tập →</a>
            </div>
            
            <!-- Chương 3 -->
            <div class="chapter-card">
                <h2> Chương 3</h2>
                <p>Functions & Arrays - Hàm và Mảng trong PHP</p>
                <span class="info-badge badge-inactive">⚪ Chưa học</span>
                <br><br>
                <a href="chuong3/" class="btn btn-disabled">Chưa mở →</a>
            </div>
            
            <div class="chapter-card">
                <h2>TEST</h2>
                <a href="test/" class="btn">Xem</a>
            </div>
        </div>
    </div>
</body>
</html>