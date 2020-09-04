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
            <th>No</th>
            <th>タイトル</th>
            <th>カテゴリ</th>
        </tr>
        <?php
            foreach($blogs->getAllBlog() as $blog):
        ?>
        <tr>
            <td><?= h($blog['id']) ?></td>
            <td><?= h($blog['title']) ?></td>
            <td><?= setCategoryName(h($blog['category'])) ?></td>
            <td><a href="detail.php?id=<?= h($blog['id']) ?>">詳細</a></td>
        </tr>
        <?php
            endforeach;
        ?>
    </table>
    <p><a href="./register.php">ブログ投稿</a></p>
</body>
</html>