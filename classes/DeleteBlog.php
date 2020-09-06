<?php

require_once '../db_connect.php';

class DeleteBlog
{
    /**
     * ブログを削除する処理
     * @param array $data
     * @return bool $result
     */
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