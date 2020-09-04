<?php
spl_autoload_register(function($class) {
    require_once '../classes/' . $class . '.php';
});
require_once '../functions.php';

$blogContent = new Story();
$story = $blogContent->getBlogContent($_GET);
?>
<!DOCTYPE html>
<html lang="ja">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>ブログ詳細</title>
</head>
<body>
    <h2>ブログ詳細</h2>
    <p>タイトル : <?= h($story['title']) ?></p>
    <p><?= h($story['content']) ?></p>
    <a href="./index.php">戻る</a>
</body>
</html>