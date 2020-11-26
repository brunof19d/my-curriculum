<?php

/**
 * @author Bruno Dadario <brunof19d@gmail.com>
 */

namespace App\Infrastructure\Repository;

use App\Entity\Model\Skill;
use App\Entity\Repository\SkillRepository;
use App\Infrastructure\Persistence\Database;
use PDO;

class PdoSkillRepository implements SkillRepository
{
    private PDO $pdo;

    public function __construct()
    {
        $this->pdo = Database::getConnection();
    }

    /**
     * Select only 1 row in database.
     * @param int $id
     * @return array
     */
    public function queryCategory(int $id): array
    {
        $sql = "SELECT * FROM skills WHERE category_id = :id";
        $stmt = $this->pdo->prepare($sql);
        $stmt->execute([':id' => $id]);

        return $stmt->fetchAll();
    }

    /**
     * Save data's skills in database.
     * @param Skill $skill
     * @return void
     */
    public function save(Skill $skill): void
    {
        $sql = "INSERT INTO skills (category_id, name_skill) VALUES (:category_id, :name_skill)";
        $stmt = $this->pdo->prepare($sql);
        $stmt->execute([
           ':category_id' => $skill->getCategory(),
           ':name_skill' => $skill->getNameSkill()
        ]);
    }

    /**
     *  Remove data`s skills in database.
     * @param Skill $skill
     * @return void
     */
    public function remove(Skill $skill): void
    {
        $sql = "DELETE FROM skills WHERE id = :id";
        $stmt = $this->pdo->prepare($sql);
        $stmt->bindValue(':id', $skill->getId(), PDO::PARAM_INT);
        $stmt->execute();
    }
}