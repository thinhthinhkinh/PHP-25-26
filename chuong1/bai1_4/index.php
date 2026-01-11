<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Bài 1.4</title>
    <style>
        *{
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }
        body{
            font-family: 'Segoe UI', Arial, sans-serif;
            background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
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
            color: #667eea;
            margin-bottom: 20px;
        }
        .message{
            border-radius: 15px;
        }

        .back-link{
            display: inline-block;
            margin-top: 25px;
            color: #667eea;
            text-decoration: none;
            transition: all 0.3s;
            border: 2px solid #667eea;
            border-radius: 8px;
            padding: 12px 25px;
        }
        .back-link:hover{
            background: #667eea;
            color: white;
        }
    </style>
</head>
<body>
    <div class="container">
        <h1>Bài 1.4</h1>
        <div class="message">
            <?php
                for($i = 0; $i<31; $i++){
                    echo ($i % 2 == 0) ? "<i> $i </i>" : "<b> $i </b>";
                }
            ?>
        </div>
        <a href="../" class="back-link">← Quay lại</a>
    </div>
</body>
</html>