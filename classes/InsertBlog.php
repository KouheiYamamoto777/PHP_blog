<?php

class InsertBlog
{
    public static function postInsertDb($post)
    {
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
    }
}