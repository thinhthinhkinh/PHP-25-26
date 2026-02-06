<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Bài 2</title>
    <link rel="stylesheet" href="../../bootstrap-5.3.8-dist/css/bootstrap.min.css">
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
        <h1> Bài 4</h1>
        <table class="table table-striped table-hover">
                    <thead>
                        <tr>
                            <th>i</th>
                            <th>Tên sách</th>
                            <th>Nội dung</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                            for($i = 1; $i <=100; $i++){
                                echo "<tr>";
                                echo "<td>$i</td>";
                                echo "<td>Tên sách" .$i."</td>";
                                echo "<td>Nội dung" .$i."</td>";
                                echo "</tr>";
                            }
                        ?>
                    </tbody>
                </table>
        <a href="../" class="back-link">← Quay lại</a>
    </div>
</body>
</html>
</body>
</html>