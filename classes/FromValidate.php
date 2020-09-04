<?php

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
    }
}