<!DOCTYPE html>
<html lang="vi">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Danh Sách Tác Giả</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <style>
        body {
            background: linear-gradient(135deg, White 0%, #764ba2 100%);
            min-height: 100vh;
            padding: 50px 0;
        }
        .author-card {
            background: white;
            border-radius: 15px;
            padding: 40px;
            box-shadow: 0 10px 30px rgba(0,0,0,0.2);
        }
        .author-list {
            list-style: none;
            padding: 0;
        }
        .author-list li {
            margin: 15px 0;
        }
        .author-link {
            display: block;
            padding: 15px 20px;
            background: linear-gradient(135deg, #00008b 0%, #764ba2 100%);
            color: white;
            text-decoration: none;
            border-radius: 10px;
            transition: all 0.3s;
            font-size: 18px;
            font-weight: 500;
        }
        .author-link:hover {
            transform: translateX(10px);
            box-shadow: 0 5px 15px rgba(0,0,0,0.3);
            color: white;
        }
        h2 {
            color: #00008b;
            margin-bottom: 30px;
            font-weight: bold;
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
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="author-card">
                    <h2 class="text-center"> DANH SÁCH TÁC GIẢ</h2>
                    
                    <ul class="author-list">
                        <li>
                            <a href="thongtin.php?id=1" class="author-link">
                                 An
                            </a>
                        </li>
                        <li>
                            <a href="thongtin.php?id=2" class="author-link">
                                 Tài
                            </a>
                        </li>
                        <li>
                            <a href="thongtin.php?id=3" class="author-link">
                                 Hải
                            </a>
                        </li>
                        <li>
                            <a href="thongtin.php?id=4" class="author-link">
                                 Minh
                            </a>
                        </li>
                        <li>
                            <a href="thongtin.php?id=5" class="author-link">
                                 Lan
                            </a>
                        </li>
                    </ul>
                </div>
                
            </div>
            
        </div>
        <a href="../" class="back-link">← Quay lại</a>
    </div>
    

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>