<?php
// db.php
$servername = "localhost";
$username = "diaryuser"; 
$password = "diary"; 
$dbname = "diary_app";

// データベース接続
$conn = mysqli_connect($servername, $username, $password, $dbname);

// 接続確認
if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
}
?>
