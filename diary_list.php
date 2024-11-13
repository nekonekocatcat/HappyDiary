<!-- diary_list.php -->
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>おもいでをみる</title>
    <link rel="stylesheet" href="styles.css">
    <style>
        body {
            font-family: 'Baloo 2', 'M PLUS Rounded 1c', sans-serif;
            margin: 0;
            padding: 20px;
            display: flex;
            flex-direction: column;
            align-items: center;
            justify-content: flex-start;
            min-height: 100vh;
            background-color: #ffe4e1;
            color: #333;
        }

        h2 {
            margin-bottom: 20px;
            color: #ff69b4;
        }

        .diary-entry {
            background-color: #fff;
            padding: 20px;
            border-radius: 10px;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
            margin-bottom: 20px;
            width: 90%;
            max-width: 600px;
        }

        .diary-entry h3 {
            color: #ff69b4;
        }

        .diary-entry p {
            color: #333;
        }

        .button-container {
            margin-top: 20px;
        }

        .button-container button {
            padding: 10px 20px;
            background-color: #ff69b4;
            color: white;
            border: none;
            border-radius: 5px;
            cursor: pointer;
            margin-bottom: 10px;
        }

        .button-container button:hover {
            background-color: #ff1493;
        }
    </style>
</head>
<body>
    <h2>おもいでをみる</h2>
    <?php
    session_start();
    require_once('db.php'); // データベース接続情報

    $user_id = $_SESSION['user_id'];
    $query = "SELECT * FROM diaries WHERE user_id='$user_id' ORDER BY created_at DESC";
    $result = mysqli_query($conn, $query);

    if (mysqli_num_rows($result) > 0) {
        while ($row = mysqli_fetch_assoc($result)) {
            $date = date("Y-m-d", strtotime($row['created_at'])); // 日付のみを取得
            echo "<div class='diary-entry'>";
            echo "<h3>{$row['title']}</h3>";
            echo "<p>Date : {$date}</p>";
            echo "<p>{$row['content']}</p>";
            
            // 削除リンクの追加
            echo "<p><a href='delete_diary.php?id={$row['id']}'>けす</a></p>";
            echo "</div>";
        }
    } else {
        echo "おもいでがないよ！";
    }
    ?>
    <div class="button-container">
        <button onclick="window.location.href='diary.php'">おもいでをかく</button>
        <button onclick="history.back()">戻る</button>
    </div>
</body>
</html>
