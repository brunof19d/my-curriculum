<?php


namespace App\Entity\Repository;


use App\Entity\Model\Courses\Category;
use PDOStatement;

interface CategoryRepository
{
    public function queryCategory(int $id): array;

    public function allCategories(): array;

    public function treatCategoriesList(PDOStatement $stmt): array;

    public function insertCategory(Category $category): void;

    public function deleteCategory(Category $category): void;

    public function verifyRowCategory(Category $category);

    public function queryCoursesOnlyByCategory(int $value): array;


}