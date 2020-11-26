<?php


namespace App\Entity\Model\Courses;


class Institution
{
    private int $institutionId;
    private string $institutionName;

    public function getInstitutionId(): int
    {
        return $this->institutionId;
    }

    public function setInstitutionId(int $institutionId): void
    {
        $this->institutionId = $institutionId;
    }

    public function getInstitutionName(): string
    {
        return $this->institutionName;
    }

    public function setInstitutionName(string $institutionName): void
    {
        $this->institutionName = $institutionName;
    }
}