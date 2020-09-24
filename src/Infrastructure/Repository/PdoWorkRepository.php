<?php


namespace App\Infrastructure\Repository;


use App\Entity\Model\Work;
use App\Entity\Repository\WorkRepository;
use App\Infrastructure\Persistence\Database;
use PDO;
use PDOStatement;

class PdoWorkRepository implements WorkRepository
{
    private PDO $pdo;

    public function __construct()
    {
        $this->pdo = Database::getConnection();
    }


    public function save(Work $work): bool
    {
        $sql = "INSERT INTO work 
            (title_job, data_begin, data_end, current, description)
            VALUES
            (:title_job, :data_begin, :data_end, :current, :description)
        ";
        $stmt = $this->pdo->prepare($sql);
        $stmt->execute([
            ':title_job' => $work->getTitleJob(),
            ':data_begin' => $work->getDataBegin(),
            ':data_end' => $work->getDataEnd(),
            ':current' => $work->getCurrent(),
            ':description' => $work->getDescription()
        ]);

        if ($stmt) {
            return true;
        }
        return false;
    }

    /**
     * Returns the list of users registered in the system.
     * @return array
     */
    public function allUsers(): array
    {
        $sql = "SELECT * FROM work";
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
        $workDataList = $stmt->fetchAll();
        $workList = [];

        foreach ($workDataList as $row) {
            $workData = new Work();
            $workData->setId($row['id']);
            $workData->setTitleJob($row['title_job']);
            $workData->setDataBegin($row['data_begin']);
            $workData->setDataEnd($row['data_end']);
            $workData->setCurrent($row['current']);
            $workData->setDescription($row['description']);
            array_push($workList, $workData);
        }
        return $workList;
    }
}