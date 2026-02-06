<?php
// Mảng chứa thông tin chi tiết của các tác giả
$tacgia = [
    1 => [
        'ten_day_du' => 'Nguyễn Văn An',
        'tuoi' => 25,
        'que_quan' => 'Hà Nội',
        'so_thich' => 'Đọc sách, viết blog'
    ],
    2 => [
        'ten_day_du' => 'Trần Minh Tài',
        'tuoi' => 28,
        'que_quan' => 'Đà Nẵng',
        'so_thich' => 'Lập trình, chơi game'
    ],
    3 => [
        'ten_day_du' => 'Lê Đức Hải',
        'tuoi' => 30,
        'que_quan' => 'Hải Phòng',
        'so_thich' => 'Du lịch, nhiếp ảnh'
    ],
    4 => [
        'ten_day_du' => 'Phạm Hoàng Minh',
        'tuoi' => 27,
        'que_quan' => 'TP. Hồ Chí Minh',
        'so_thich' => 'Thể thao, âm nhạc'
    ],
    5 => [
        'ten_day_du' => 'Hoàng Thị Lan',
        'tuoi' => 24,
        'que_quan' => 'Huế',
        'so_thich' => 'Vẽ tranh, làm vườn'
    ]
];

// Lấy ID từ URL
$id = isset($_GET['id']) ? (int)$_GET['id'] : 0;

// Kiểm tra ID có hợp lệ không
if (!isset($tacgia[$id])) {
    $thongtin = null;
} else {
    $thongtin = $tacgia[$id];
}
?>

<!DOCTYPE html>
<html lang="vi">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Thông Tin Tác Giả</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <style>
        body {
            background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
            min-height: 100vh;
            padding: 50px 0;
        }
        .info-card {
            background: white;
            border-radius: 15px;
            padding: 40px;
            box-shadow: 0 10px 30px rgba(0,0,0,0.2);
        }
        .info-header {
            background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
            color: white;
            padding: 20px;
            border-radius: 10px;
            margin-bottom: 30px;
            text-align: center;
        }
        .info-item {
            padding: 15px;
            margin: 10px 0;
            background: #f8f9fa;
            border-left: 4px solid #667eea;
            border-radius: 5px;
        }
        .info-label {
            font-weight: bold;
            color: #667eea;
            margin-right: 10px;
        }
        .btn-back {
            background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
            border: none;
            color: white;
            padding: 10px 30px;
            border-radius: 25px;
            transition: all 0.3s;
        }
        .btn-back:hover {
            transform: translateY(-2px);
            box-shadow: 0 5px 15px rgba(0,0,0,0.3);
            color: white;
        }
        .error-message {
            text-align: center;
            color: #dc3545;
            font-size: 18px;
            padding: 20px;
        }
    </style>
</head>
<body>
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="info-card">
                    <?php if ($thongtin): ?>
                        <div class="info-header">
                            <h2> THÔNG TIN TÁC GIẢ</h2>
                        </div>
                        
                        <div class="info-item">
                            <span class="info-label"> Tên đầy đủ:</span>
                            <span><?php echo $thongtin['ten_day_du']; ?></span>
                        </div>
                        
                        <div class="info-item">
                            <span class="info-label"> Tuổi:</span>
                            <span><?php echo $thongtin['tuoi']; ?> tuổi</span>
                        </div>
                        
                        <div class="info-item">
                            <span class="info-label"> Quê quán:</span>
                            <span><?php echo $thongtin['que_quan']; ?></span>
                        </div>
                        
                        <div class="info-item">
                            <span class="info-label"> Sở thích:</span>
                            <span><?php echo $thongtin['so_thich']; ?></span>
                        </div>
                    <?php else: ?>
                        <div class="error-message">
                            <h3> Không tìm thấy thông tin tác giả!</h3>
                            <p>Vui lòng chọn tác giả từ danh sách.</p>
                        </div>
                    <?php endif; ?>
                    
                    <div class="text-center mt-4">
                        <a href="tacgia.php" class="btn btn-back">
                            ← Quay lại danh sách
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>