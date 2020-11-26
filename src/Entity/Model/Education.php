<?php


namespace App\Entity\Model;


class Education
{
    private int $id;
    private string $collegeName;
    private string $dataBegin;
    private string $dataEnd;
    private string $degree;

    public function setId($id)
    {
        $this->id = $id;
    }

    public function getId(): int
    {
        return $this->id;
    }

    public function setCollegeName($collegeName)
    {
        $this->collegeName = $collegeName;
    }

    public function getCollegeName(): string
    {
        return $this->collegeName;
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

    public function setDegree($degree)
    {
        $this->degree = $degree;
    }

    public function getDegree(): string
    {
        return $this->degree;
    }
}