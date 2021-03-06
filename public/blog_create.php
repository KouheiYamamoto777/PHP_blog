<?php
session_start();

spl_autoload_register(function($class) {
    require_once '../classes/' . $class . '.php';
});
require_once '../functions.php';

$validateData = new FromValidate();
if ($validateData->postValidate($_POST)) {
    InsertBlog::postInsertDb($_POST);
    $msg = '投稿が完了しました';
}

?>
<!DOCTYPE html>
<html lang="ja">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>新規投稿チェック画面</title>
</head>
<body>

    <ul>
        <?php
        if(!empty($_SESSION['err'])):
            foreach($_SESSION['err'] as $e): 
        ?>
        <li><?= $e ?></li>
        <?php
            endforeach;
        endif;
        ?>
    </ul>

    <p>
        <?php
        if(isset($msg)):
        ?>
        <?= $msg ?>
        <?php
        endif;
        ?>
    </p>
    
    <p><a href="./register.php">ブログ登録画面へ戻る</a></p>
    <p><a href="./index.php">ブログ一覧画面へ戻る</a></p>
</body>
</html>