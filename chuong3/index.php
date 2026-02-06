<?php
    session_start();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <?php
        $host = 'localhost';
        $db = 'qlsv';
        $user = 'nothinh';
        $pass = '123456';
        $dsn = "mysql:host=$host;dbname=$db;charset=utf8mb4";


        try{
            $pdo = new PDO($dsn, $user, $pass);
            echo "Kết nối thành công đến cơ sở dữ liệu!";

            // Thay đổi câu lệnh SQL để khớp với tên cột trong DB
            $sql = "SELECT MaSV, HoSV, TenSV, GioiTinh, NgaySinh FROM SINHVIEN";
            $stmt = $pdo->query($sql);

            echo "<table border='1'>";
            echo "<tr><th>Mã SV</th><th>Họ Tên</th><th>Giới Tính</th></tr>";
                
            while ($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
                echo "<tr>";
                echo "<td>" . htmlspecialchars($row['MaSV']) . "</td>";
                echo "<td>" . htmlspecialchars($row['HoSV'] . " " . $row['TenSV']) . "</td>";
                echo "<td>" . htmlspecialchars($row['GioiTinh']) . "</td>"; 
                echo "</tr>";
            }
            echo "</table>";
        
        }catch(\PDOException $e){
            throw new \PDOException($e->getMessage(), (int)$e->getCode());
        }
        
        // <form action="#" method = "POST">
        //     Username: 
        // </form>

    ?>
    
</body>
</html>