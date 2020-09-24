<?php


namespace App\Entity\Model;


class Work
{
    private $id;
    private $titleJob;
    private $dataBegin;
    private $dataEnd;
    private $current;
    private $description;

    public function setId($id)
    {
        $this->id = $id;
    }

    public function getId()
    {
        return $this->id;
    }

    public function setTitleJob($titleJob)
    {
        $this->titleJob = $titleJob;
    }

    public function getTitleJob()
    {
        return $this->titleJob;
    }

    public function setDataBegin($dataBegin)
    {
        $this->dataBegin = $dataBegin;
    }

    public function getDataBegin()
    {
        return $this->dataBegin;
    }

    public function setDataEnd($dataEnd)
    {
        $this->dataEnd = $dataEnd;
    }

    public function getDataEnd()
    {
        return $this->dataEnd;
    }

    public function setCurrent($current)
    {
        $this->current = $current;
    }

    public function getCurrent()
    {
        return $this->current;
    }

    public function setDescription($description)
    {
        $this->description = $description;
    }

    public function getDescription()
    {
        return $this->description;
    }
}