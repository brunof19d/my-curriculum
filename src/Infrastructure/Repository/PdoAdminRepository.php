<?php


namespace App\Infrastructure\Repository;


use App\Entity\Model\Admin;
use App\Entity\Repository\AdminRepository;
use App\Infrastructure\Persistence\Database;
use PDO;

class PdoAdminRepository implements AdminRepository
{

    private PDO $pdo;

    public function __construct()
    {
        $this->pdo = Database::getConnection();
    }

    public function login(Admin $admin): bool
    {
        $sql = "SELECT * FROM admin WHERE email = :email";
        $stmt = $this->pdo->prepare($sql);
        $stmt->bindValue(':email', $admin->getEmail(), PDO::PARAM_STR);
        $stmt->execute();

        $count = $stmt->rowCount();

        if ($count > 0) {
            $result = $stmt->fetch(PDO::FETCH_ASSOC);
            if ($admin->getPassword() == $result['password']) {
                return true;
            }
        }
        return false;
    }
}