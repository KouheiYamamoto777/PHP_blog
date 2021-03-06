<?php
spl_autoload_register(function($class) {
    require_once '../classes/' . $class . '.php';
});
require_once '../functions.php';

$blogs = new SelectAll();
?>
<!DOCTYPE html>
<html lang="ja">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>ブログ一覧</title>
</head>
<body>
<h2>ブログ一覧</h2>
    <table>
        <tr>
            <th>タイトル</th>
            <th>カテゴリ</th>
            <th>詳細をみる</th>
            <th>編集する</th>
            <th>削除する</th>
        </tr>
        <?php
            foreach($blogs->getAllBlog() as $blog):
        ?>
        <tr>
            <td><?= h($blog['title']) ?></td>
            <td><?= setCategoryName(h($blog['category'])) ?></td>
            <td><a href="detail.php?id=<?= h($blog['id']) ?>">詳細</a></td>
            <td><a href="edit.php?id=<?= h($blog['id']) ?>">編集</a></td>
            <td><a href="delete.php?id=<?= h($blog['id']) ?>">削除</a></td>
        </tr>
        <?php
            endforeach;
        ?>
    </table>
    <p><a href="./register.php">ブログ投稿</a></p>
</body>
</html>