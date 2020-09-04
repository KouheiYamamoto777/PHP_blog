<?php
require_once '../db_connect.php';

class SelectAll
{
    public function getAllBlog()
    {
        $result = false;

        $dbh = db_connect();
        $sql = 'select * from blog';
        try {
            $stmt = $dbh->query($sql);
            $result = $stmt->fetchAll(PDO::FETCH_ASSOC);
            return $result;
        } catch (PDOException $e) {
            return $result;
        }
    }
}