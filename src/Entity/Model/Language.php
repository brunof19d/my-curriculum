<?php


namespace App\Entity\Model;


class Language
{
    private int $id;
    private string $nameLanguage;

    public function getId(): int
    {
        return $this->id;
    }

    public function setId(int $id): void
    {
        $this->id = $id;
    }

    public function getNameLanguage(): string
    {
        return $this->nameLanguage;
    }

    public function setNameLanguage(string $nameLanguage): void
    {
        $this->nameLanguage = $nameLanguage;
    }
}