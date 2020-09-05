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
    <title>ブログ編集画面</title>
</head>
<body>
    <h2>ブログ編集</h2>
    <form action="" method="post">
        <p>タイトル : <input type="text" name="edit_title" value="<?= h($story['title']) ?>"></p>
        <p>ブログ内容 : <textarea name="edit_content" id="" cols="30" rows="10"><?= $story['content'] ?></textarea></p>
        <p><input type="submit" value="変更する"></p>
    </form>
    <a href="./index.php">戻る</a>
</body>
</html>