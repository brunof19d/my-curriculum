<?php


namespace App\Entity\Repository;


use App\Entity\Model\Courses\Institution;
use PDOStatement;

interface InstitutionRepository
{
    public function queryInstitution(int $id): array;

    public function allInstitution(): array;

    public function treatInstitutionList(PDOStatement $stmt): array;

    public function insertInstitution(Institution $institution): void;

    public function deleteInstitution(Institution $institution): void;

    public function verifyRowInstitution(Institution $institution);
}