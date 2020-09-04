<?php

require_once '../db_connect.php';

class FromValidate
{
    public $err = [];

    public function postValidate($post)
    {
        if (empty($post['title'])) {
            $err[] = 'タイトルを入力してください';
        } elseif (mb_strlen($post['title']) > 191) {
            $err[] = 'タイトルが長すぎます';
        }
        if (empty($post['content'])) {
            $err[] = '投稿内容は必須です';
        }
        if (empty($err)) {
            $result = false;
            $dbh = db_connect();
            $sql = 'insert into blog(title, content, category, post_at, publish_status) values (?, ?, ?, now(), ?)';

            try {
                $stmt = $dbh->prepare($sql);
                $stmt->execute(array(
                    $post['title'],
                    nl2br($post['content']),
                    $post['category'],
                    $post['publish_status']
                ));
                unset($_SESSION['err']);
                return $result = true;
            } catch (PDOException $e) {
                return $result;
            }
        } elseif (count($err) !== 0) {
            $_SESSION['err'] = $err;
        }
    }
}