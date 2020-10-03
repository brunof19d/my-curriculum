<?php


namespace App\Infrastructure\Repository;


use App\Entity\Model\Skill;
use App\Infrastructure\Persistence\Database;
use PDO;

class PdoSkillRepository
{
    private PDO $pdo;

    public function __construct()
    {
        $this->pdo = Database::getConnection();
    }

    public function queryCategory(int $id): array
    {
        $sql = "SELECT * FROM skills WHERE category_id = :id";
        $stmt = $this->pdo->prepare($sql);
        $stmt->execute([':id' => $id]);
        return $stmt->fetchAll();
    }

    public function save(Skill $skill): void
    {
        $sql = "INSERT INTO skills (category_id, name_skill) VALUES (:category_id, :name_skill)";
        $stmt = $this->pdo->prepare($sql);
        $stmt->execute([
           ':category_id' => $skill->getCategory(),
           ':name_skill' => $skill->getNameSkill()
        ]);
    }
}