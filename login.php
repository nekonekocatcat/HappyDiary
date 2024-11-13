<?php
// login.php
session_start();
require_once('db.php'); // データベース接続情報

$errorMessage = '';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $email = $_POST['email'];
    $password = $_POST['password'];
    
    // SQLインジェクション対策
    $email = mysqli_real_escape_string($conn, $email);

    $query = "SELECT * FROM users WHERE email='$email'";
    $result = mysqli_query($conn, $query);

    if (mysqli_num_rows($result) == 1) {
        $user = mysqli_fetch_assoc($result);
        // パスワードの検証
        if (password_verify($password, $user['password'])) {
            $_SESSION['user_id'] = $user['id'];
            header("Location: diary.php");
            exit(); // リダイレクト後のスクリプト終了
        } else {
            $errorMessage = 'メールアドレスかパスワードが間違っています！';
        }
    } else {
        $errorMessage = 'メールアドレスかパスワードが間違っています！';
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>ログイン</title>
    <link rel="stylesheet" href="styles.css">
    <style>
        .error {
            color: red;
            background-color: #ffe0e0;
            padding: 10px;
            border: 1px solid red;
            border-radius: 5px;
            margin-bottom: 10px;
            text-align: center;
        }
    </style>
</head>
<body>
    <h1>ログイン</h1>
    <form action="login.php" method="post">
        <label>ID(Email) : </label><br>
        <input type="email" name="email" required><br><br>
        <label>password : </label><br>
        <input type="password" name="password" required><br><br>
        <?php
        if (!empty($errorMessage)) {
            echo '<p class="error">' . $errorMessage . '</p>';
        }
        ?>
        <input type="submit" value="ログイン">
    </form>
    <p>アカウントがないならこっち！<br><a href="register.php">Sign Up</a></p>
</body>
</html>
