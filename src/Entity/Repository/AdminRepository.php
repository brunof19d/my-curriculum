<?php


namespace App\Entity\Repository;


use App\Entity\Model\Admin;

interface AdminRepository
{
    public function login(Admin $admin): bool;

    public function save(Admin $admin): bool;
}