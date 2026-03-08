<?php
session_start();
if(isset($_SESSION['logged_in'])){
    header('Location: index.php');
    exit;
}

require_once 'config.php';

$error = '';

if(isset($_POST['dangnhap'])){
    $username = trim($_POST['username']);
    $password = $_POST['password'];

    try{
        $tim = $pdo->prepare("SELECT * FROM ADMIN WHERE USERNAME = ?");
        $tim->execute([$username]);
        $user = $tim->fetch();

        if($user && $user['password']==$password){
            $_SESSION['logged_in'] = true;
            $_SESSION['username'] = $user['username'];

            header('Location: index.php');
            exit;
        }else{
            $error = "Sai thông tin đăng nhập";
        }
    }catch(PDOException $e){
        die("Lỗi: ".$e->getMessage());
    }
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
</head>
<style>
    body{
        font-family: Arial, sans-serif;
        display: flex;
        justify-content: center;
    }

    .container{
        width: 350px;
        background-color: white;
        border-radius: 10px;
    }
    h2{
        text-align: center;
    }
    .form-group{
        margin-bottom: 20px;
    }
</style>
<body>
    <div class="container">
        <h2>ĐĂNG NHẬP</h2>

        <Form method="POST">
            <div class="form-group">
                <label>Username:</label>
                <input type="text" name="username" required>
            </div>

            <div class="form-group">
                <label>Password:</label>
                <input type="password" name="password" required>
            </div>

            <button type="submit" name="dangnhap">Đăng nhập</button>
            <button type="reset">Nhập lại</button>
        </Form>
    </div>
</body>
</html>