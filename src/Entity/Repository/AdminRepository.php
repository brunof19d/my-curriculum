<?php


namespace App\Entity\Repository;


use App\Entity\Model\Admin;
use PDOStatement;

interface AdminRepository
{
    public function login(Admin $admin): bool;

    public function save(Admin $admin): bool;

    public function allUsers(): array;

    public function treatUserList(PDOStatement $stmt): array;

    public function remove(Admin $admin): void;
}