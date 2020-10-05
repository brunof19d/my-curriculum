<?php


namespace App\Infrastructure\Repository;


use App\Entity\Model\Language;
use App\Entity\Repository\LanguageRepository;
use App\Infrastructure\Persistence\Database;
use PDOStatement;

class PdoLanguageRepository implements LanguageRepository
{

   private \PDO $pdo;

    public function __construct()
    {
        $this->pdo = Database::getConnection();
    }

    public function allLanguages(): array
    {
        $sql = "SELECT * FROM language";
        $stmt = $this->pdo->query($sql);
        return $this->treatUserList($stmt);
    }

    public function treatUserList(PDOStatement $stmt): array
    {
        $languageDataList = $stmt->fetchAll();
        $languageList = [];

        foreach ($languageDataList as $row) {
            $languageData = new Language();
            $languageData->setId($row['id']);
            $languageData->setNameLanguage($row['name_language']);
            array_push($languageList, $languageData);
        }
        return $languageList;
    }

    public function save(Language $language): void
    {
        $sql = "INSERT INTO language (name_language) VALUES (:name_language)";
        $stmt = $this->pdo->prepare($sql);
        $stmt->execute([':name_language' => $language->getNameLanguage()]);

    }

    public function remove(Language $language): void
    {
        $sql = "DELETE FROM language WHERE id = :id";
        $stmt = $this->pdo->prepare($sql);
        $stmt->execute([':id' => $language->getId()]);
    }
}