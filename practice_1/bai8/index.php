<!DOCTYPE html>
<html lang="vi">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Duyệt Mảng Với Foreach</title>
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
            max-width: 700px;
            width: 100%;
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
            border-bottom: 2px solid #00008b;
        }
        
        .list-item {
            background: #f8f9fa;
            border-left: 4px solid #00008b;
            padding: 15px 20px;
            margin: 10px 0;
            border-radius: 5px;
            font-size: 1.1rem;
        }
        
        .list-item strong {
            color: #00008b;
            margin-right: 10px;
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
        <h1> Duyệt Mảng Với Foreach</h1>
        
        <?php
        $list = array("alpha", "beta", "gamma", "delta", "epsilon");
        ?>
    
        <?php
        foreach ($list as $index => $value) {
            echo "<div class='list-item'>";
            echo "<strong>Phần tử [$index]:</strong> $value";
            echo "</div>";
        }
        ?>
        <a href="../" class="back-link">← Quay lại</a>
    </div>
    
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>