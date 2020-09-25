<?php


namespace App\Entity\Repository;


use App\Entity\Model\Admin;
use PDOStatement;

interface AdminRepository
{
    public function allUsers(): array;

    public function treatUserList(PDOStatement $stmt): array;

    public function login(Admin $admin): bool;

    public function save(Admin $admin): void;

    public function remove(Admin $admin): void;
}