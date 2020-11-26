<?php

/**
 * @author Bruno Dadario <brunof19d@gmail.com>
 */

namespace App\Infrastructure\Persistence;

use PDO;
use PDOException;

class Database
{
    /**
     * Connects to the database.
     * @return PDO
     * @throws PDOException
     */
    public static function getConnection(): PDO
    {
        $dsn = "mysql:dbname=" . DB_NAME . ";host=" . DB_HOST;
        $user = DB_USER;
        $password = DB_PASSWORD;

        try {
            $pdo = new PDO($dsn, $user, $password);
            $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            $pdo->setAttribute(PDO::ATTR_DEFAULT_FETCH_MODE, PDO::FETCH_ASSOC);
        } catch (PDOException $e) {
            echo 'Connection failed: ' . $e->getMessage();
            die();
        }

        return $pdo;
    }
}