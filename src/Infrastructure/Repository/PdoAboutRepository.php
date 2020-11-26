<?php

/**
 * @author Bruno Dadario <brunof19d@gmail.com>
 */

namespace App\Infrastructure\Repository;

use App\Controller\About;
use App\Infrastructure\Persistence\Database;
use PDO;

class PdoAboutRepository
{
    private PDO $pdo;

    public function __construct()
    {
        $this->pdo = Database::getConnection();
    }

    public function getData()
    {
        $sql = "SELECT * FROM about";
        $stmt = $this->pdo->prepare($sql);
        $stmt->execute();
        return $stmt->fetch();
    }

    public function update(\App\Entity\Model\About $about): void
    {
        $sql = "UPDATE about SET text = :text WHERE id = :id";
        $stmt = $this->pdo->prepare($sql);
        $stmt->bindValue(':text', $about->getText(), PDO::PARAM_STR);
        $stmt->bindValue(':id', $about->getId(), PDO::PARAM_INT);
        $stmt->execute();
    }

}