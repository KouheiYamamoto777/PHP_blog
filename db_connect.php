<?php

require_once 'config/env.php';

function db_connect()
{
    $user = USER;
    $password = PASS;
    $host = HOST;
    $db_name = DBNAME;
    $dsn = "mysql:host={$host};dbname={$db_name};charset=utf8";

    try {
        $dbh = new PDO($dsn, $user, $password, [
            PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION,
            PDO::ATTR_EMULATE_PREPARES => false
        ]);
        return $dbh;
    } catch (PDOException $e) {
        echo 'Error : ' . $e->getMessage();
        exit();
    }
}
