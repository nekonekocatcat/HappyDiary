<?php
// registration.php
require_once('db.php'); // データベース接続情報

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $email = $_POST['email'];
    $password = $_POST['password'];
    
    // エラーメッセージを格納する変数
    $errorMessage = '';

    // SQLインジェクション対策
    $email = mysqli_real_escape_string($conn, $email);

    // パスワードのハッシュ化
    $hashed_password = password_hash($password, PASSWORD_DEFAULT);

    // 重複エントリの確認
    $checkQuery = "SELECT email FROM users WHERE email = '$email'";
    $checkResult = mysqli_query($conn, $checkQuery);
    
    if (mysqli_num_rows($checkResult) > 0) {
        $errorMessage = 'ユーザがすでに登録されています！';
    } else {
        // 新規ユーザー登録クエリ
        $query = "INSERT INTO users (email, password) VALUES ('$email', '$hashed_password')";
        
        if (mysqli_query($conn, $query)) {
            header("Location: index.php");
            exit(); // リダイレクト後のスクリプト終了
        } else {
            $errorMessage = 'エラーが発生しました。再度お試しください。';
        }
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>ユーザ登録</title>
    <link rel="stylesheet" href="styles.css">
</head>
<body>
    <h1>アカウントの登録をするよ！</h1>
    <form action="registration.php" method="post">
        <label>Email:</label>
        <input type="email" name="email" required><br><br>
        <label>Password:</label>
        <input type="password" name="password" required><br><br>
        <input type="submit" value="かんりょう">
    </form>
    <?php
    if (!empty($errorMessage)) {
        echo '<p class="error">' . $errorMessage . '</p>';
    }
    ?>
</body>
</html>
