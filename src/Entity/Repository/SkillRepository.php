<?php


namespace App\Entity\Repository;


use App\Entity\Model\Skill;

interface SkillRepository
{
    public function queryCategory(int $id): array;

    public function save(Skill $skill): void;

    public function remove(Skill $skill);
}