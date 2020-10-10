<?php


namespace App\Entity\Repository;


use App\Entity\Model\Education;
use PDOStatement;

interface EducationRepository
{
    public function allEducation(): array;

    public function treatEducationList(PDOStatement $stmt): array;

    public function searchEducation(int $id): array;

    public function save(Education $education): void;

    public function update(Education $education): void;

    public function remove(Education $education): void;
}