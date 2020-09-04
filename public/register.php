<?php

?>
<!DOCTYPE html>
<html lang="ja">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>ブログ投稿</title>
</head>
<body>
    <h2>ブログフォーム</h2>
    <form action="blog_create.php" method="post">
        <p>タイトル : </p>
        <input type="text" name="title">
        <p>カテゴリ : </p>
        <input type="radio" name="category" value="1" checked>ブログ
        <input type="radio" name="category" value="2">日常
        <input type="radio" name="category" value="3">プログラミング
        <p>ブログ本文 : </p>
        <textarea name="content" id="" cols="30" rows="5"></textarea>
        <br />
        <input type="radio" name="publish_status" value="1" checked>公開
        <input type="radio" name="publish_status" value="2">非公開
        <br />
        <input type="submit" value="投稿する">
    </form>
    <p><a href="./index.php">一覧へ戻る</a></p>
</body>
</html>