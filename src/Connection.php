<?php
namespace App;

use \PDO;

class Connection {

    public static function getPDO (): PDO
    {
        return new PDO('mysql:dbname=croisette;host=127.0.0.1','root','',[
            PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC,
            PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION
        ]);
    }
}