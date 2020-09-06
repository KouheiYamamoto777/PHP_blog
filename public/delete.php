<?php
spl_autoload_register(function($class) {
    require_once '../classes/' . $class . '.php';
});

if(DeleteBlog::deleteThisBlog($_GET)) {
    $msg = '削除しました';
}

?>
<!DOCTYPE html>
<html lang="ja">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>ブログ削除完了画面</title>
</head>
<body>

    <p>
        <?php
        if(isset($msg)):
        ?>
        <?= $msg ?>
        <?php
        endif;
        ?>
    </p>
    
    <p><a href="./index.php">ブログ一覧画面へ戻る</a></p>
</body>
</html>