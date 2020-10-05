<?php


namespace App\Entity\Repository;


use App\Entity\Model\Language;
use PDOStatement;

interface LanguageRepository
{
    public function allLanguages(): array;

    public function treatUserList(PDOStatement $stmt): array;

    public function save(Language $language): void;

    public function remove(Language $language): void;
}