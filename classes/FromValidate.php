<?php

require_once 'InsertBlog.php';
require_once '../db_connect.php';

class FromValidate
{
    private $err = [];

    /**
     * 入力内容バリデーション
     * @param array $post
     * @return bool $result
     */
    public function postValidate($post)
    {
        $result = false;
        if (empty($post['title'])) {
            $err[] = 'タイトルを入力してください';
        } elseif (mb_strlen($post['title']) > 191) {
            $err[] = 'タイトルが長すぎます';
        }
        if (empty($post['content'])) {
            $err[] = '投稿内容は必須です';
        }
        if ((int)$post['category'] > 3) {
            $err[] = 'カテゴリーの値が不正です';
        }
        if ((int)$post['publish_status'] > 2) {
            $err[] = 'ステータスの値が不正です';
        }
        if (empty($err)) {
            return $result = true;
        } elseif (count($err) !== 0) {
            $_SESSION['err'] = $err;
            return $result;
        }
        
    }
}