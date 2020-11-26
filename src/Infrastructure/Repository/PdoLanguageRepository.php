<?php

/**
 * @author Bruno Dadario <brunof19d@gmail.com>
 */

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

    /**
     * Return All rows in the database.
     * @return array
     */
    public function allLanguages(): array
    {
        $sql = "SELECT * FROM language";
        $stmt = $this->pdo->query($sql);

        return $this->treatLanguageList($stmt);
    }

    /**
     * Treat Data`as rows receive in the database.
     * @param PDOStatement $stmt
     * @return array
     */
    public function treatLanguageList(PDOStatement $stmt): array
    {
        $languageDataList = $stmt->fetchAll();
        $languageList = [];

        foreach ($languageDataList as $row) {
            $languageData = new Language();
            $languageData->setId($row['id']);
            $languageData->setNameLanguage($row['name_language']);
            $languageData->setLevelLanguage($row['level_language']);
            array_push($languageList, $languageData);
        }

        return $languageList;
    }

    /**
     * Save data`s Languages in database.
     * @param Language $language
     * @return void
     */
    public function save(Language $language): void
    {
        $sql = "INSERT INTO language (name_language, level_language) VALUES (:name_language, :level_language)";
        $stmt = $this->pdo->prepare($sql);
        $stmt->execute([
            ':name_language'    => $language->getNameLanguage(),
            ':level_language'   => $language->getLevelLanguage()
        ]);
    }

    /**
     * Remove data`s Languages in database.
     * @param Language $language
     */
    public function remove(Language $language): void
    {
        $sql = "DELETE FROM language WHERE id = :id";
        $stmt = $this->pdo->prepare($sql);
        $stmt->execute([':id' => $language->getId()]);
    }
}