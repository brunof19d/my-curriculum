<?php

/**
 * @author Bruno Dadario <brunof19d@gmail.com>
 */

namespace App\Infrastructure\Repository;

use App\Entity\Model\Admin;
use App\Entity\Repository\AdminRepository;
use App\Infrastructure\Persistence\Database;
use PDO;
use PDOStatement;

class PdoAdminRepository implements AdminRepository
{
    private PDO $pdo;

    public function __construct()
    {
        $this->pdo = Database::getConnection();
    }

    /**
     * Returns the list of users admin registered in the database.
     * @return array
     */
    public function allUsers(): array
    {
        $sql = "SELECT * FROM admin";
        $stmt = $this->pdo->query($sql);
        return $this->treatUserList($stmt);
    }

    /**
     * Treat the list received by the Database.
     * @param PDOStatement $stmt Statement $sql->AllUser.
     * @return array
     */
    public function treatUserList(PDOStatement $stmt): array
    {
        $userDataList = $stmt->fetchAll();
        $userList = [];

        foreach ($userDataList as $row) {
            $userData = new Admin();
            $userData->setId($row['id']);
            $userData->setEmail($row['email']);
            array_push($userList, $userData);
        }

        return $userList;
    }

    /**
     * Logs in an administrative user.
     * @param Admin $admin Class Admin setters and getters.
     * @return bool
     */
    public function login(Admin $admin): bool
    {
        $sql = "SELECT * FROM admin WHERE email = :email";
        $stmt = $this->pdo->prepare($sql);
        $stmt->bindValue(':email', $admin->getEmail(), PDO::PARAM_STR);
        $stmt->execute();

        $count = $stmt->rowCount();

        // Check Password
        if ($count > 0) {
            $result = $stmt->fetch(PDO::FETCH_ASSOC);
            if (password_verify($admin->getPassword(), $result['password'])) {
                return true;
            }
        }

        return false;
    }

    /**
     * Register the admin in the database.
     * @param Admin $admin Class Admin setters and getters.
     * @return void
     */
    public function save(Admin $admin): void
    {
        $sql = "INSERT INTO admin (email, password) VALUES (:email, :password)";
        $stmt = $this->pdo->prepare($sql);
        $stmt->execute([
            ':email' => $admin->getEmail(),
            ':password' => $admin->getPassword()
        ]);
    }

    /**
     * Delete admin in Database.
     * @param Admin $admin Class Admin setters and getters.
     * @return void
     */
    public function remove(Admin $admin): void
    {
        $sql = "DELETE FROM admin WHERE id = :id";
        $stmt = $this->pdo->prepare($sql);
        $stmt->bindValue(':id', $admin->getId(), PDO::PARAM_INT);
        $stmt->execute();
    }
}