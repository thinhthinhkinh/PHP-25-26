<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Bài 1</title>
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
        <h1> Bài 1</h1>
        
        <div class="message">
            <?php
                $x = random_int(0, 100);
                $y = random_int(50, 100);

                echo "<p>Giá trị của x là: $x</p>";
                echo "<p>Giá trị của y là: $y</p>";
            ?>
        </div>
        
        <a href="../" class="back-link">← Quay lại</a>
    </div>
</body>
</html>
</body>
</html>