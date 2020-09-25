<?php


namespace App\Entity\Repository;


use App\Entity\Model\Work;

interface WorkRepository
{
    public function save(Work $work);
}