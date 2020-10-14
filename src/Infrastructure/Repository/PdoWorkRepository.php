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

    /**
     * Return list of all work experience added in the system.
     * @return array
     */
    public function allWorksExperience(): array
    {
        $sql = "SELECT * FROM work ORDER BY date_begin DESC";
        $stmt = $this->pdo->query($sql);
        return $this->treatWorkList($stmt);
    }

    /**
     * Treat the list work experience received by the function allWorksExperience.
     * @param PDOStatement $stmt Statement $sql->AllUser.
     * @return array
     */
    public function treatWorkList(PDOStatement $stmt): array
    {
        $workDataList = $stmt->fetchAll();
        $workList = [];

        foreach ($workDataList as $row) {
            $workData = new Work();
            $workData->setId($row['id']);
            $workData->setTitleJob($row['title_job']);
            $workData->setCompanyName($row['company_name']);
            $workData->setDateBegin($row['date_begin']);
            $workData->setDateEnd($row['date_end']);
            $workData->setCurrent($row['current']);
            $workData->setDescription($row['description']);
            array_push($workList, $workData);
        }
        return $workList;
    }

    /**
     *  Returns from the database a single work experience received by the ID.
     * @param int $id   ID receive from USER
     * @return array
     */
    public function searchWorkExperience(int $id): array
    {
        $sql = "SELECT * FROM work WHERE id = :id";
        $stmt = $this->pdo->prepare($sql);
        $stmt->execute([
            ':id' => $id
        ]);
        return $stmt->fetch(PDO::FETCH_ASSOC);

    }

    /**
     * Save work experience
     * @param Work $work Class Work setters and getters.
     * @return void
     */
    public function save(Work $work): void
    {
        $sql = "INSERT INTO work 
            (title_job, company_name, date_begin, date_end, current, description)
            VALUES
            (:title_job, :company_name, :data_begin, :data_end, :current, :description)
        ";
        $stmt = $this->pdo->prepare($sql);
        $stmt->execute([
            ':title_job' => $work->getTitleJob(),
            ':company_name' => $work->getCompanyName(),
            ':data_begin' => $work->getDateBegin(),
            ':data_end' => $work->getDateEnd(),
            ':current' => $work->getCurrent(),
            ':description' => $work->getDescription()
        ]);
    }

    /**
     * Update work experience.
     * @param Work $work Class Work setters and getters.
     * @return void
     */
    public function update(Work $work): void
    {
        $sql = "UPDATE work SET 
            title_job = :title_job, 
            company_name = :company_name,
            date_begin = :data_begin, 
            date_end = :data_end, 
            current = :current,
            description = :description
            WHERE
            id = :id
        ";
        $stmt = $this->pdo->prepare($sql);
        $stmt->bindValue(':title_job', $work->getTitleJob(), PDO::PARAM_STR);
        $stmt->bindValue(':company_name', $work->getCompanyName(), PDO::PARAM_STR);
        $stmt->bindValue(':data_begin', $work->getDateBegin());
        $stmt->bindValue(':data_end', $work->getDateEnd());
        $stmt->bindValue(':current', $work->getCurrent());
        $stmt->bindValue(':description', $work->getDescription());
        $stmt->bindValue(':id', $work->getId());
        $stmt->execute();
    }

    /**
     * Delete work experience in Database.
     * @param Work $work Class Admin setters and getters.
     * @return void
     */
    public function remove(Work $work): void
    {
        $sql = "DELETE FROM work WHERE id = :id";
        $stmt = $this->pdo->prepare($sql);
        $stmt->bindValue(':id', $work->getId(), PDO::PARAM_INT);
        $stmt->execute();
    }
}