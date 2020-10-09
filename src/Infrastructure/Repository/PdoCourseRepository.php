<?php


namespace App\Infrastructure\Repository;


use App\Entity\Model\Courses\Category;
use App\Entity\Model\Courses\Course;
use App\Entity\Model\Courses\Institution;
use App\Infrastructure\Persistence\Database;
use PDO;
use PDOStatement;

class PdoCourseRepository
{
    private PDO $pdo;

    public function __construct()
    {
        $this->pdo = Database::getConnection();
    }

    public function queryInstitution(int $id): array
    {
        $sql = "SELECT * FROM institution WHERE institution_id = :id";
        $stmt = $this->pdo->prepare($sql);
        $stmt->execute([
            ':id' => $id
        ]);
        return $stmt->fetch(PDO::FETCH_ASSOC);
    }

    public function allInstitution(): array
    {
        $sql = "SELECT * FROM institution ORDER BY institution_name";
        $stmt = $this->pdo->query($sql);
        return $this->treatInstitutionList($stmt);
    }

    public function treatInstitutionList(PDOStatement $stmt): array
    {
        $institutionDataList = $stmt->fetchAll();
        $institutionList = [];

        foreach ($institutionDataList as $row) {
            $institutionData = new Institution();
            $institutionData->setInstitutionId($row['institution_id']);
            $institutionData->setInstitutionName($row['institution_name']);
            array_push($institutionList, $institutionData);
        }
        return $institutionList;
    }

    public function insertInstitution(Institution $institution): void
    {
        $sql = "INSERT INTO institution (institution_name) VALUES (:institution_name)";
        $stmt = $this->pdo->prepare($sql);
        $stmt->execute([':institution_name' => $institution->getInstitutionName()]);
    }

    public function deleteInstitution(Institution $institution): void
    {
        $sql = "DELETE FROM institution WHERE institution_id = :id";
        $stmt = $this->pdo->prepare($sql);
        $stmt->bindValue(':id', $institution->getInstitutionId(), PDO::PARAM_INT);
        $stmt->execute();
    }

    public function queryCategory(int $id): array
    {
        $sql = "SELECT * FROM categories WHERE category_id = :id";
        $stmt = $this->pdo->prepare($sql);
        $stmt->execute([
            ':id' => $id
        ]);
        return $stmt->fetch(PDO::FETCH_ASSOC);
    }

    public function allCategories(): array
    {
        $sql = "SELECT * FROM categories ORDER BY category_name";
        $stmt = $this->pdo->query($sql);
        return $this->treatCategoriesList($stmt);
    }

    public function treatCategoriesList(PDOStatement $stmt): array
    {
        $categoryDataList = $stmt->fetchAll();
        $categoryList = [];

        foreach ($categoryDataList as $row) {
            $categoryData = new Category();
            $categoryData->setCategoryId($row['category_id']);
            $categoryData->setCategoryName($row['category_name']);
            array_push($categoryList, $categoryData);
        }
        return $categoryList;
    }

    public function insertCategory(Category $category): void
    {
        $sql = "INSERT INTO categories (category_name) VALUES (:category_name)";
        $stmt = $this->pdo->prepare($sql);
        $stmt->execute([':category_name' => $category->getCategoryName()]);
    }

    public function deleteCategory(Category $category): void
    {
        $sql = "DELETE FROM categories WHERE category_id = :id";
        $stmt = $this->pdo->prepare($sql);
        $stmt->bindValue(':id', $category->getCategoryId(), PDO::PARAM_INT);
        $stmt->execute();
    }

    public function verifyRowCategory(Category $category)
    {
        $sql = "SELECT * FROM courses WHERE category_id = :category_id";
        $stmt = $this->pdo->prepare($sql);
        $stmt->execute([':category_id' => $category->getCategoryId()]);
        return $stmt->fetch();
    }

    public function verifyRowInstitution(Institution $institution)
    {
        $sql = "SELECT * FROM courses WHERE institution_id = :institution_id";
        $stmt = $this->pdo->prepare($sql);
        $stmt->execute([':institution_id' => $institution->getInstitutionId()]);
        return $stmt->fetch();
    }

    public function queryCoursesOnlyByCategory(int $value): array
    {
        $sql = "SELECT * FROM courses WHERE category_id = $value ORDER BY course_name";
        $stmt = $this->pdo->query($sql);
        return $this->treatCoursesList($stmt);
    }

    public function queryCourses(): array
    {
        $sql = "SELECT * FROM courses order by course_name ";
        $stmt = $this->pdo->query($sql);
        return $this->treatCoursesList($stmt);
    }

    public function queryCoursesLimit(): array
    {
        $sql = "SELECT * FROM courses ORDER BY course_name LIMIT 5";
        $stmt = $this->pdo->query($sql);
        return $this->treatCoursesList($stmt);
    }

    public function queryCountRowsCourses(): int
    {
        $sql = "SELECT COUNT(course_id) FROM courses";
        $stmt = $this->pdo->query($sql);
        return $stmt->fetchColumn();
    }

    public function treatCoursesList(PDOStatement $stmt): array
    {
        $courseDataList = $stmt->fetchAll();
        $courseList = [];

        foreach ($courseDataList as $row) {
            $courseData = new Course();
            $courseData->setCourseId($row['course_id']);
            $courseData->setCourseName($row['course_name']);
            $courseData->setInstitution($row['institution_id']);
            $courseData->setCourseDescription($row['course_description']);
            $courseData->setCategory($row['category_id']);
            $courseData->setCourseCertified($row['course_certified']);
            $courseData->setCourseUrl($row['course_certified_url']);
            array_push($courseList, $courseData);
        }
        return $courseList;
    }

    public function insertCourse(Course $course, Institution $institution, Category $category): void
    {
        $sql = "INSERT INTO courses 
            (institution_id, category_id, course_name, course_description, course_certified, course_certified_url) 
            VALUES 
            (:institution_id, :category_id, :course_name, :course_description, :course_certified, :course_certified_url)
        ";
        $stmt = $this->pdo->prepare($sql);
        $stmt->execute([
            ':institution_id' => $institution->getInstitutionId(),
            ':category_id' => $category->getCategoryId(),
            ':course_name' => $course->getCourseName(),
            ':course_description' => $course->getCourseDescription(),
            ':course_certified' => $course->getCourseCertified(),
            ':course_certified_url' => $course->getCourseUrl()
        ]);
    }

    public function remove(Course $course): void
    {
        $sql = "DELETE FROM courses WHERE course_id = :id";
        $stmt = $this->pdo->prepare($sql);
        $stmt->bindValue(':id', $course->getCourseId(), PDO::PARAM_INT);
        $stmt->execute();
    }
}