# HappyDiary

HappyDiaryは、日常の中でのポジティブな出来事を記録することができるシンプルな日記アプリです。
Webアプリケーションとして構築されており、ユーザはポジティブな出来事を管理することができます。

<img src="https://github.com/user-attachments/assets/d1e1cd75-b402-4c13-b5af-22d4fd6cb434" width="600" height="500">


## 特徴

- **日記の記録**: ポジティブな出来事を記録できる。ネガティブな出来事は推奨されていないので、NGワードが設定されています。
- **データベースの使用**: ユーザーの情報やスケジュールデータを管理するためにデータベースを利用。

## 使用技術

- **PHP**: サーバーサイドのスクリプト言語として使用。
- **MySQL**: データベースとして使用し、ユーザーデータやスケジュール情報を保存。
- **HTML/CSS**: 基本的なページのレイアウトとデザイン。
- **JavaScript**: ユーザーインターフェイスのインタラクションを改善。

## インストール手順

1. **XAMPPをインストール**: XAMPPをインストールして、ApacheサーバーとMySQLデータベースをセットアップします。
2. **プロジェクトをクローン**:
   ```bash
   git clone https://github.com/your-username/HappyDiary.git

## 画面遷移

<img src="https://github.com/user-attachments/assets/d7499138-2ee7-41f3-a708-4fff99d5947d" width="500" height="600">

新規登録からログイン、そして出来事を記録することができます。

## NGワードについて

HappyDiaryではネガティブなことを記録することは推奨されていないため、以下のNGワードが設定されている。

<img src="https://github.com/user-attachments/assets/14a023f7-1803-4e12-b172-0bb1ff43eb13" width="600" height="600">

これらの単語が日記の内容に入力されて保存された場合、アラートを表示して保存させないようになっている。
