<?php
session_start();
require_once('db.php'); // データベース接続情報

$message = ""; // 初期化

if (isset($_GET['id']) && !empty($_GET['id'])) {
    $delete_id = $_GET['id'];

    // 削除クエリの準備と実行
    $sql = "DELETE FROM diaries WHERE id = ?";
    $stmt = mysqli_prepare($conn, $sql);
    mysqli_stmt_bind_param($stmt, "i", $delete_id);
    $result = mysqli_stmt_execute($stmt);

    // 削除が成功したかどうかをチェック
    if ($result) {
        $message = "おもいでをけしたよ！";
    } else {
        $message = "けすのしっぱいしちゃった！";
    }

    // ステートメントを閉じる
    mysqli_stmt_close($stmt);
}

// データベース接続を閉じる
mysqli_close($conn);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>おもいでをけす</title>
    <link rel="stylesheet" href="styles.css">
</head>
<body>
    <p><?php echo $message; ?></p>
    <button onclick="window.history.back();">もどる</button>
</body>
</html>
