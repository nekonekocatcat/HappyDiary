<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>HappyDiary</title>
    <link rel="stylesheet" href="styles.css">
    <style>
        @import url('https://fonts.googleapis.com/css2?family=Baloo+2&family=M+PLUS+Rounded+1c&display=swap');

        body {
            font-family: 'Baloo 2', 'M PLUS Rounded 1c', sans-serif;
            margin: 0;
            padding: 20px;
            display: flex;
            flex-direction: column;
            align-items: center;
            justify-content: flex-start;
            height: 100vh;
            background-image: url('./Ribbon.png');
            background-size: cover;
            background-repeat: no-repeat;
            background-attachment: fixed;
            color: #333;
        }

        h1 {
            margin-bottom: 40px;
            font-size: 3em;
            color: #ff69b4;
            animation: float 3s ease-in-out infinite;
        }

        @keyframes float {
            0%, 100% {
                transform: translateY(0);
            }
            50% {
                transform: translateY(-10px);
            }
        }

        h2 {
            margin-bottom: 20px;
        }

        form {
            display: flex;
            flex-direction: column;
            background-color: #fff;
            padding: 20px;
            border-radius: 10px;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
            width: 100%;
            max-width: 400px;
        }

        label {
            margin-bottom: 5px;
            color: #ff69b4;
        }

        input, textarea, button {
            margin-bottom: 10px;
            padding: 12px;
            border: 2px solid #ffb6c1;
            border-radius: 5px;
            font-family: 'M PLUS Rounded 1c', sans-serif;
        }

        textarea {
            resize: vertical;
        }

        button {
            padding: 10px;
            background-color: #ff69b4;
            color: white;
            border: none;
            cursor: pointer;
        }

        button:hover {
            background-color: #ff1493;
        }

        p {
            text-align: center;
        }

        .button-container {
            margin-top: 20px;
        }

        .button-container button {
            margin-bottom: 10px;
        }
    </style>
</head>
<body>
    <h1>HappyDiary</h1>
    <h2>ログイン</h2>
    <form action="login.php" method="post">
        <label>ID(Email) : </label><br>
        <input type="email" name="email" required><br><br>
        <label>password : </label><br>
        <input type="password" name="password" required><br><br>
        <input type="submit" value="ログイン">
    </form>
    <p>アカウントがないならこっち！<br><a href="register.php">Sign Up</a></p>
</body>
</html>
