<?php

namespace App\lib\Db;

use Exception;
use PDO;

class Db
{
    public object $db;

    public function __construct()
    {
        $config = require 'application/config/db.php';
        try {
            $this->db = new PDO(
                'mysql:host=' . $config['host'] .
                ';dbname=' . $config['name'],
                $config['user'],
                $config['password'],
                [PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION,
                    PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC]
            );
        } catch (Exception $e) {
            echo "Database connect error: " . $e->getMessage();
        }
    }
}