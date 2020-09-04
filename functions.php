<?php

function h($str)
{
    return htmlspecialchars($str, ENT_QUOTES, 'utf-8');
}

function setCategoryName($category)
{
    if ($category === '1') {
        return 'ブログ';
    } elseif ($category === '2') {
        return '日常';
    } elseif($category === '3') {
        return 'プログラミング';
    } else {
        return 'その他';
    }
}