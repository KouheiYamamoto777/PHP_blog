<?php

require_once '../db_connect.php';

class Story
{
    public function getBlogContent($data)
    {
        $result = false;
        $dbh = db_connect();
        $sql = 'select title, content from blog where id = ?';

        try {
            $stmt = $dbh->prepare($sql);
            $stmt->execute(array(
                $data['id']
            ));
            $result = $stmt->fetch(PDO::FETCH_ASSOC);
            return $result;
        } catch (PDOException $e) {
            return $result;
        }
    }
}