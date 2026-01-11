<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Bài 1.5</title>
    <link rel="stylesheet" href="../../bootstrap-5.3.8-dist/css/bootstrap.min.css">
    
    <style>
        *{margin: 0; padding: 0; box-sizing: border-box;}
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
        <h1>Bài 1.5</h1>
        <div class="message">
            <div class="table-responsive">
                <table class="table table-striped table-hover">
                    <thead>
                        <tr>
                            <th>i</th>
                            <th>Kết quả</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                            for($i = 0; $i < 11; $i++){
                                $res = ($i==0) ? $i : (pow($i, ($i + 1)));
                                echo "<tr>";
                                echo "<td>$i</td>";
                                echo "<td>" . $res . "</td>";
                                echo "</tr>";
                            }
                        ?>
                    </tbody>
                </table>
            </div>
        </div>
        <a href="../" class="back-link">← Quay lại</a>
    </div>
</body>
</html>