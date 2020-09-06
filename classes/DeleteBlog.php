<?php

require_once '../db_connect.php';

class DeleteBlog
{
    public static function deleteThisBlog($data)
    {
        $result = false;
        $dbh = db_connect();
        $sql = 'delete from blog where id = ?';
        $dbh->beginTransaction();

        try {
            $stmt = $dbh->prepare($sql);
            $stmt->execute(array(
                $data['id']
            ));
            $dbh->commit();
            return $result = true;
        } catch (PDOException $e) {
            $dbh->rollBack();
            return $result;
        }
    }
}