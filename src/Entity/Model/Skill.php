<?php


namespace App\Entity\Model;


class Skill
{
    private int $id;
    private int $category;
    private string $nameSkill;

    public function setId($id)
    {
        $this->id = $id;
    }

    public function getId(): int
    {
        return $this->id;
    }

    public function setCategory($category)
    {
        $this->category = $category;
    }

    public function getCategory(): int
    {
        return $this->category;
    }

    public function setNameSkill($nameSkill)
    {
        $this->nameSkill = $nameSkill;
    }

    public function getNameSkill(): string
    {
        return $this->nameSkill;
    }
}