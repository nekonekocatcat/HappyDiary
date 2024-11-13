<?php
// save_diary.php
session_start();
require_once('db.php'); // データベース接続情報

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $date = $_POST['date'];
    $title = $_POST['title'];
    $content = $_POST['content'];
    $user_id = $_SESSION['user_id'];

    // NGワードチェック
    $ng_query = "SELECT word, alert_message FROM ng_words";
    $ng_result = mysqli_query($conn, $ng_query);

    while ($row = mysqli_fetch_assoc($ng_result)) {
        $ng_word = $row['word'];
        $alert_message = $row['alert_message'] ?: 'ポジティブな内容だけにしてね！'; // アラートメッセージが設定されていない場合のデフォルトメッセージ

        if (strpos($content, $ng_word) !== false) {
            $_SESSION['error'] = $alert_message;
            $_SESSION['form_data'] = $_POST; // 入力内容をセッションに保存
            header("Location: diary.php");
            exit();
        }
    }

    // 日記を保存
    $query = "INSERT INTO diaries (user_id, title, content, created_at) VALUES ('$user_id', '$title', '$content', '$date')";
    
    if (mysqli_query($conn, $query)) {
        $_SESSION['success'] = 'おもいでが保存されました！';
        header("Location: diary_list.php");
    } else {
        $_SESSION['error'] = 'エラーが発生しました: ' . mysqli_error($conn);
        $_SESSION['form_data'] = $_POST; // 入力内容をセッションに保存
        header("Location: diary.php");
    }
}
?>
