<?php

require_once '../db_connect.php';

class UpdateBlog
{
    public static function postUpdateDb($post)
    {
        $result = false;
        $dbh = db_connect();
        $sql = 'update blog set title = ?, content = ?, category = ?, publish_status = ? where id = ?';
        $dbh->beginTransaction();

        try {
            $stmt = $dbh->prepare($sql);
            $stmt->execute(array(
                $post['title'],
                nl2br($post['content']),
                $post['category'],
                $post['publish_status'],
                $post['id']
            ));
            $dbh->commit();
            return $result = true;
        } catch (PDOException $e) {
            $dbh->rollBack();
            return $result;
        }
    }
}