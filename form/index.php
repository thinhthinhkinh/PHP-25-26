<?php
session_start();
// Kết nối CSDL
$con = mysqli_connect("localhost", "nothinh", "123456", "qltt");

if (!$con) {
    die("Kết nối thất bại: " . mysqli_connect_error());
}

// Xử lý đăng xuất
if (isset($_GET['logout'])) {
    session_destroy();
    header("Location: " . $_SERVER['PHP_SELF']);
    exit();
}

// Xử lý đăng nhập
if (isset($_POST["btnLogin"])) {
    $ID = mysqli_real_escape_string($con, $_POST["txtID"]);
    $pwd = md5($_POST['txtPass']); 

    $strLogin = "SELECT * FROM users WHERE TenDangNhap = '$ID' AND MatKhau = '$pwd'";
    $kq = $con->query($strLogin);

    if ($kq && $kq->num_rows > 0) {
        $_SESSION["login"] = true;
        $_SESSION["username"] = $ID;
    } else {
        $error = "Sai tên đăng nhập hoặc mật khẩu!";
    }
}
?>

<!DOCTYPE html>
<html lang="vi">
<head>
    <meta charset="UTF-8">
    <title>Hệ thống Loại Tin</title>
    <style>
        table { width: 50%; border-collapse: collapse; margin-top: 20px; }
        th, td { border: 1px solid #ddd; padding: 8px; text-align: left; }
        th { background-color: #f2f2f2; }
        .error { color: red; }
    </style>
</head>
<body>

    <?php if (!isset($_SESSION["login"])): ?>
        <h2>Đăng Nhập</h2>
        <?php if (isset($error)) echo "<p class='error'>$error</p>"; ?>
        <form action="" method="POST">
            Tên Đăng Nhập: <input type="text" name="txtID" required> <br><br>
            Mật Khẩu: <input type="password" name="txtPass" required> <br><br>
            <input type="submit" value="Đăng Nhập" name="btnLogin">
        </form>

    <?php else: ?>
        <h2>Chào mừng, <?php echo $_SESSION["username"]; ?>! | <a href="?logout=true">Thoát</a></h2>
        <hr>
        <h3>Danh sách Loại Tin</h3>

        <?php
        // Truy vấn bảng loaitin
        $sql_tin = "SELECT * FROM loaitin";
        $kq_tin = $con->query($sql_tin);

        if ($kq_tin && $kq_tin->num_rows > 0) {
            echo "<table>";
            echo "<tr><th>ID</th><th>Tên Loại Tin</th><th>Thứ Tự</th></tr>";
            while ($row = $kq_tin->fetch_assoc()) {
                echo "<tr>";
                echo "<td>" . $row['idLoai'] . "</td>";
                echo "<td>" . $row['tenLoai'] . "</td>";
                echo "<td>" . $row['thuTu'] . "</td>";
                echo "</tr>";
            }
            echo "</table>";
        } else {
            echo "<p>Khong co du lieu</p>";
        }
        ?>

    <?php endif; ?>

</body>
</html>