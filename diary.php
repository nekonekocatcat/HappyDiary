<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>おもいでをかく</title>
    <link rel="stylesheet" href="styles.css">
</head>
<body>
    <h2>おもいでをかく</h2>
    <p>今日あったポジティブなおもいでを書いてね！(^^)</p>
    <?php
    session_start();
    if (isset($_SESSION['error'])) {
        echo "<p class='error'>{$_SESSION['error']}</p>";
        unset($_SESSION['error']);
    }

    // 入力内容をセッションから取得
    $form_data = isset($_SESSION['form_data']) ? $_SESSION['form_data'] : ['date' => '', 'title' => '', 'content' => ''];
    unset($_SESSION['form_data']);
    ?>
    <form action="save_diary.php" method="post">
        <label>Date:</label>
        <input type="date" name="date" value="<?php echo htmlspecialchars($form_data['date']); ?>" required>
        <label>Title:</label>
        <input type="text" name="title" value="<?php echo htmlspecialchars($form_data['title']); ?>" required>
        <label>おもいでをにゅうりょく…</label>
        <textarea name="content" rows="5" required><?php echo htmlspecialchars($form_data['content']); ?></textarea>
        <input type="submit" value="ほぞん">
    </form>
    <p><a href="diary_list.php">おもいでをみる</a></p>
    <div class="button-container">
        <button onclick="window.history.back();">もどる</button>
    </div>
</body>
</html>
