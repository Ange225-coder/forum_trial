<?php

    declare(strict_types = 1);

    namespace App\Model\Database;

    use PDO;

    class DbManage
    {
        protected function dbConnect(): PDO
        {
            $db = new PDO('mysql:host=localhost;dbname=forum;charset=utf8', 'root', '', array(PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION));
            return $db;
        }
    }