<?php

class InsertBlog
{
    /**
     * ブログ新規作成処理
     * @param array $post
     * @return bool $result
     */
    public static function postInsertDb($post)
    {
        $result = false;
        $dbh = db_connect();
        $sql = 'insert into blog(title, content, category, post_at, publish_status) values (?, ?, ?, now(), ?)';

        $dbh->beginTransaction();
        try {
            $stmt = $dbh->prepare($sql);
            $stmt->execute(array(
                $post['title'],
                nl2br($post['content']),
                $post['category'],
                $post['publish_status']
            ));
            unset($_SESSION['err']);
            $dbh->commit();
            return $result = true;
        } catch (PDOException $e) {
            $dbh->rollBack();
            return $result;
        }
    }
}