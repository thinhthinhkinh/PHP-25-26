<?php
session_start();
$con = mysqli_connect("localhost", "nothinh", "123456", "qltt");

if (isset($_GET['logout'])) {
    session_destroy();
    header("Location: " . $_SERVER['PHP_SELF']);
    exit();
}
?>

<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <title>Form</title>
</head>
<body>

    <?php
        if (isset($_POST["btnLogin"])) {
            $ID = mysqli_real_escape_string($con, $_POST["txtID"]);
            $pwd = md5($_POST['txtPass']); 

            $sql = "SELECT * FROM users WHERE TenDangNhap = '$ID' AND MatKhau = '$pwd'";
            $kq = $con->query($sql);

            if ($kq && $kq->num_rows > 0) {
                $user = $kq->fetch_assoc();
                if ($user['id'] == 1) {
                    $error = "Khong the truy cap bang tai khoan role = 1";
                } else {
                    $_SESSION["login"] = true;
                    $_SESSION["username"] = $ID;
                }
            } else {
                $error = "Sai thong tin dang nhap";
            }
        }

        if (!isset($_SESSION["login"])) {
            echo 'Đăng Nhập';
            if (isset($error)) {
                echo "<p style='color:red'>$error</p>";
            }
            echo '
            <form method="POST">
                Tên: <input type="text" name="txtID" required><br><br>
                Pass: <input type="password" name="txtPass" required><br><br>
                <input type="submit" name="btnLogin" value="Đăng nhập">
            </form>';
        } 
        else {

            echo "Chào " . $_SESSION["username"] . "! <br> <a href='?logout=true'>Thoát</a>";
            
            echo "<nav>
                    <a href='?page=quanly'> Quản lý thông tin </a>
                  </nav>";
            echo "<hr>";

            if (isset($_GET['page']) && $_GET['page'] == 'quanly') {
                echo "Danh sách Loại Tin:<br>";

                $kq_tin = $con->query("SELECT * FROM loaitin");
                if ($kq_tin->num_rows > 0) {
                    while ($row = $kq_tin->fetch_assoc()) {
                        echo "- " . $row['tenLoai'] . "<br>";
                    }
                } else {
                    echo "Không có dữ liệu trong bảng loaitin.";
                }
            }
        }
    ?>

</body>
</html>