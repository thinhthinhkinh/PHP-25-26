<!DOCTYPE html>
<html lang="vi">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Bài 6</title>
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
            max-width: 1200px;
        }
        
        h1 {
            color: #00008b;
            text-align: center;
            margin-bottom: 30px;
            font-weight: bold;
        }
        
        .table-container {
            overflow-x: auto;
        }
        
        table {
            width: 100%;
            border-collapse: collapse;
            margin-top: 20px;
        }
        
        thead th {
            background: #00008b;
            color: white;
            padding: 15px;
            text-align: center;
            font-size: 1.3rem;
            font-weight: bold;
            border: 2px solid #00008b;
        }
        
        tbody td {
            padding: 12px;
            text-align: center;
            font-size: 1.1rem;
            border: 1px solid #dee2e6;
        }
        
        tbody tr:nth-child(even) {
            background-color: #f8f9fa;
        }
        
        tbody tr:nth-child(odd) {
            background-color: white;
        }
        
        .row-header {
            background: #e3f2fd;
            font-weight: bold;
            color: #00008b;
        }
        
        .info-badge {
            background: #00008b;
            color: white;
            padding: 10px 20px;
            border-radius: 20px;
            display: inline-block;
            margin-bottom: 20px;
            font-size: 1rem;
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
        <h1>Bài 6: Bảng Cửu Chương</h1>
        
        <div class="text-center">
            <span class="info-badge">
                Bảng cửu chương từ 2 đến 10
            </span>
        </div>
        
        <div class="table-container">
            <table class="table table-bordered">
                <thead>
                    <tr>
                        <th>×</th>
                        <?php
                            for ($i = 2; $i <= 10; $i++) {
                                echo "<th>$i</th>";
                            }
                        ?>
                    </tr>
                </thead>
                <tbody>
                    <?php
                        for ($row = 1; $row <= 10; $row++) {
                            echo "<tr>";

                            echo "<td class='row-header'>$row</td>";

                            for ($col = 2; $col <= 10; $col++) {
                                $result = $row * $col;
                                echo "<td>$result</td>";
                            }
                            
                            echo "</tr>";
                        }
                    ?>
                </tbody>
            </table>
        </div>
        <a href="../" class="back-link">← Quay lại</a>
    </div>
    
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>