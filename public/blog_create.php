<?php
spl_autoload_register(function($class) {
    require_once '../classes/' . $class . '.php';
});
require_once '../functions.php';

?>
<!DOCTYPE html>
<html lang="ja">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>新規投稿チェック画面</title>
</head>
<body>
    
    <p><a href="./index.php">ブログ一覧画面へ戻る</a></p>
    <p><a href="./blog_create.php">ブログ登録画面へ戻る</a></p>
</body>
</html>