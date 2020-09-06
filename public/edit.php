<?php
spl_autoload_register(function($class) {
    require_once '../classes/' . $class . '.php';
});
require_once '../functions.php';

$blogContent = new EditView();
$story = $blogContent->getBlogContent($_GET);
?>
<!DOCTYPE html>
<html lang="ja">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>ブログ編集画面</title>
</head>
<body>
    <h2>ブログ編集</h2>
    <form action="blog_edit.php" method="post">
        <p>タイトル : </p>
        <input type="text" name="title" value="<?= h($story['title']) ?>">
        <p>カテゴリ : </p>
        <input type="radio" name="category" value="1" <?php if($story['category'] === '1') { echo 'checked';} ?>>ブログ
        <input type="radio" name="category" value="2" <?php if($story['category'] === '2') { echo 'checked';} ?>>日常
        <input type="radio" name="category" value="3" <?php if($story['category'] === '3') { echo 'checked';} ?>>プログラミング
        <p>ブログ本文 : </p>
        <textarea name="content" id="" cols="30" rows="10"><?= $story['content'] ?></textarea>
        <p>公開ステータス : </p>
        <input type="radio" name="publish_status" value="1" <?php if($story['publish_status'] === '1') { echo 'checked';} ?>>公開
        <input type="radio" name="publish_status" value="2" <?php if($story['publish_status'] === '2') { echo 'checked';} ?>>非公開
        <input type="hidden" name="id" value="<?= h($story['id']) ?>">
        <p><input type="submit" value="変更する"></p>
    </form>
    <a href="./index.php">戻る</a>
</body>
</html>