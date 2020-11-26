<?php


namespace App\Entity\Model;


class Work
{
    private int $id;
    private string $titleJob;
    private string $companyName;
    private string $dateBegin;
    private string $dateEnd;
    private string $current;
    private string $description;

    public function setId($id)
    {
        $this->id = $id;
    }

    public function getId(): int
    {
        return $this->id;
    }

    public function setTitleJob($titleJob)
    {
        $this->titleJob = $titleJob;
    }

    public function getTitleJob(): string
    {
        return $this->titleJob;
    }

    public function setCompanyName($companyName)
    {
        $this->companyName = $companyName;
    }

    public function getCompanyName(): string
    {
        return $this->companyName;
    }

    public function setDateBegin($dataBegin)
    {
        $this->dateBegin = $dataBegin;
    }

    public function getDateBegin(): string
    {
        return $this->dateBegin;
    }

    public function setDateEnd($dataEnd)
    {
        $this->dateEnd = $dataEnd;
    }

    public function getDateEnd(): string
    {
        return $this->dateEnd;
    }

    public function setCurrent($current)
    {
        $this->current = $current;
    }

    public function getCurrent(): string
    {
        return $this->current;
    }

    public function setDescription($description)
    {
        $this->description = $description;
    }

    public function getDescription(): string
    {
        return $this->description;
    }
}