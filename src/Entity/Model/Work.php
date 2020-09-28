<?php


namespace App\Entity\Model;


class Work
{
    private int $id;
    private string $titleJob;
    private string $companyName;
    private string $dataBegin;
    private string $dataEnd;
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

    public function setDataBegin($dataBegin)
    {
        $this->dataBegin = $dataBegin;
    }

    public function getDataBegin(): string
    {
        return $this->dataBegin;
    }

    public function setDataEnd($dataEnd)
    {
        $this->dataEnd = $dataEnd;
    }

    public function getDataEnd(): string
    {
        return $this->dataEnd;
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