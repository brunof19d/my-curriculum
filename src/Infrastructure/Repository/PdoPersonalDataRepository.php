<?php


namespace App\Infrastructure\Repository;


use App\Entity\Model\PersonalData;
use App\Entity\Repository\PersonalDataRepository;
use App\Infrastructure\Persistence\Database;
use PDO;

class PdoPersonalDataRepository implements PersonalDataRepository
{
    private PDO $pdo;

    public function __construct()
    {
        $this->pdo = Database::getConnection();
    }

    /**
     *  Returns the columns of the personal_data table.
     * @param int $id ID Default = 1
     * @return array
     */
    public function getData(int $id): array
    {
        $sql = "SELECT * FROM personal_data WHERE id = :id";
        $stmt = $this->pdo->prepare($sql);
        $stmt->execute([':id' => $id]);
        return $stmt->fetch(PDO::FETCH_ASSOC);
    }

    /**
     *  Update this columns from table personal
     * @param PersonalData $personalData Class PersonalData
     * @return void
     */
    public function update(PersonalData $personalData): void
    {
        $sql = "UPDATE personal_data SET 
            photo = :photo
            WHERE
            id = :id
        ";
        $stmt = $this->pdo->prepare($sql);
        $stmt->execute([
            ':id' => $personalData->getId(),
            ':photo' => $personalData->getImage()
        ]);
    }
}