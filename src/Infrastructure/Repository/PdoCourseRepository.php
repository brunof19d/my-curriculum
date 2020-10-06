<?php


namespace App\Infrastructure\Repository;


use App\Entity\Model\Courses\Category;
use App\Entity\Model\Courses\Institution;
use App\Infrastructure\Persistence\Database;
use PDO;

class PdoCourseRepository
{
    private PDO $pdo;

    public function __construct()
    {
        $this->pdo = Database::getConnection();
    }

    public function insertInstitution(Institution $institution): void
    {
        $sql = "INSERT INTO institution (institution_name) VALUES (:institution_name)";
        $stmt = $this->pdo->prepare($sql);
        $stmt->execute([':institution_name' => $institution->getInstitutionName()]);
    }

    public function insertCategory(Category $category): void
    {
        $sql = "INSERT INTO categories (category_name) VALUES (:category_name)";
        $stmt = $this->pdo->prepare($sql);
        $stmt->execute([':category_name' => $category->getCategoryName()]);
    }
}