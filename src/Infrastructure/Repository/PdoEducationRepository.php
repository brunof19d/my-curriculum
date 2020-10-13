<?php


namespace App\Infrastructure\Repository;


use App\Entity\Model\Education;
use App\Entity\Repository\EducationRepository;
use App\Infrastructure\Persistence\Database;
use PDO;
use PDOStatement;

class PdoEducationRepository implements EducationRepository
{

    private PDO $pdo;

    public function __construct()
    {
        $this->pdo = Database::getConnection();
    }

    /**
     * Return list of all Education sector added in the system.
     * @return array
     */
    public function allEducation(): array
    {
        $sql = "SELECT * FROM education ORDER BY date_begin DESC";
        $stmt = $this->pdo->query($sql);
        return $this->treatEducationList($stmt);
    }

    /**
     * Treat the list Education received by the function allWorksExperience.
     * @param PDOStatement $stmt Statement $sql->AllUser.
     * @return array
     */
    public function treatEducationList(PDOStatement $stmt): array
    {
        $educationDataList = $stmt->fetchAll();
        $educationList = [];

        foreach ($educationDataList as $row) {
            $educationData = new Education();
            $educationData->setId($row['id']);
            $educationData->setCollegeName($row['name_college']);
            $educationData->setDataBegin($row['date_begin']);
            $educationData->setDataEnd($row['date_end']);
            $educationData->setDegree($row['degree']);
            array_push($educationList, $educationData);
        }
        return $educationList;
    }

    /**
     *  Returns from the database a single education section received by the ID.
     * @param int $id   ID receive from USER
     * @return array
     */
    public function searchEducation(int $id): array
    {
        $sql = "SELECT * FROM education WHERE id = :id";
        $stmt = $this->pdo->prepare($sql);
        $stmt->execute([
            ':id' => $id
        ]);
        return $stmt->fetch(PDO::FETCH_ASSOC);

    }


    public function save(Education $education): void
    {
        $sql = "INSERT INTO education (name_college, date_begin, date_end, degree) VALUES (:name_college, :date_begin, :date_end, :degree)";
        $stmt = $this->pdo->prepare($sql);
        $stmt->execute([
            ':name_college' => $education->getCollegeName(),
            ':date_begin' => $education->getDataBegin(),
            ':date_end' => $education->getDataEnd(),
            ':degree' => $education->getDegree()
        ]);
    }

    /**
     * Update Education section
     * @param Education $education Class Education setters and getters.
     * @return void
     */
    public function update(Education $education): void
    {
        $sql = "UPDATE education SET 
            name_college = :name_college,
            date_begin = :date_begin, 
            date_end = :date_end, 
            degree = :degree
            WHERE
            id = :id
        ";
        $stmt = $this->pdo->prepare($sql);
        $stmt->bindValue(':name_college', $education->getCollegeName(), PDO::PARAM_STR);
        $stmt->bindValue(':date_begin', $education->getDataBegin());
        $stmt->bindValue(':date_end', $education->getDataEnd());
        $stmt->bindValue(':degree', $education->getDegree());
        $stmt->bindValue(':id', $education->getId());
        $stmt->execute();
    }

    /**
     * Delete Education section in Database.
     * @param Education $education Class Admin setters and getters.
     * @return void
     */
    public function remove(Education $education): void
    {
        $sql = "DELETE FROM education WHERE id = :id";
        $stmt = $this->pdo->prepare($sql);
        $stmt->bindValue(':id', $education->getId(), PDO::PARAM_INT);
        $stmt->execute();
    }
}