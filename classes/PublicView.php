<?php

spl_autoload_register(function($class) {
    require_once $class . '.php';
});
require_once '../db_connect.php';

class PublicView implements IGetContent
{
    /**
     * ブログ一覧を表示する際に必要になるカラムを取得する処理
     * @param array $data
     * @return array|bool $resulr|false
     */
    public function getBlogContent($data)
    {
        $result = false;
        $dbh = db_connect();
        $sql = 'select title, content, post_at from blog where id = ?';

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