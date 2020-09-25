<?php


namespace App\Entity\Repository;


use App\Entity\Model\Work;
use PDOStatement;

interface WorkRepository
{
    public function allWorksExperience(): array;

    public function treatUserList(PDOStatement $stmt): array;

    public function searchWorkExperience(int $id): array;

    public function save(Work $work);

    public function update(Work $work): void;

    public function remove(Work $work): void;
}