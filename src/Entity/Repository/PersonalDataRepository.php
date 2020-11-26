<?php


namespace App\Entity\Repository;


use App\Entity\Model\PersonalData;

interface PersonalDataRepository
{
    public function getData(int $id): array;

    public function update(PersonalData $personalData): void;
}