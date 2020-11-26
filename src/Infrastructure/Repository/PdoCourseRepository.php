<?php

/**
 * @author Bruno Dadario <brunof19d@gmail.com>
 */

namespace App\Infrastructure\Repository;

use App\Entity\Model\Courses\Category;
use App\Entity\Model\Courses\Course;
use App\Entity\Model\Courses\Institution;
use App\Entity\Repository\CategoryRepository;
use App\Entity\Repository\CourseRepository;
use App\Entity\Repository\InstitutionRepository;
use App\Infrastructure\Persistence\Database;
use PDO;
use PDOStatement;

class PdoCourseRepository implements CategoryRepository, CourseRepository, InstitutionRepository
{
    private PDO $pdo;

    public function __construct()
    {
        $this->pdo = Database::getConnection();
    }

    /* Institution Repository start */

    /**
     * Select only 01 institution.
     * @param int $id
     * @return array
     */
    public function queryInstitution(int $id): array
    {
        $sql = "SELECT * FROM institution WHERE institution_id = :id";
        $stmt = $this->pdo->prepare($sql);
        $stmt->execute([
            ':id' => $id
        ]);

        return $stmt->fetch(PDO::FETCH_ASSOC);
    }

    /**
     * Select all institutions.
     * @return array
     */
    public function allInstitution(): array
    {
        $sql = "SELECT * FROM institution ORDER BY institution_name";
        $stmt = $this->pdo->query($sql);

        return $this->treatInstitutionList($stmt);
    }

    /**
     * Handles the list of institution columns in the database.
     * @param PDOStatement $stmt
     * @return array
     */
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

    /**
     * Insert an institution.
     * @param Institution $institution
     * @return void
     */
    public function insertInstitution(Institution $institution): void
    {
        $sql = "INSERT INTO institution (institution_name) VALUES (:institution_name)";
        $stmt = $this->pdo->prepare($sql);
        $stmt->execute([
            ':institution_name' => $institution->getInstitutionName()
        ]);
    }

    /**
     * Deletes an institution.
     * @param Institution $institution
     * @return void
     */
    public function deleteInstitution(Institution $institution): void
    {
        $sql = "DELETE FROM institution WHERE institution_id = :id";
        $stmt = $this->pdo->prepare($sql);
        $stmt->bindValue(':id', $institution->getInstitutionId(), PDO::PARAM_INT);
        $stmt->execute();
    }

    /**
     * Checks if there is a course registered with the institution received by parameter.
     * @param Institution $institution
     * @return mixed
     */
    public function verifyRowInstitution(Institution $institution)
    {
        $sql = "SELECT * FROM courses WHERE institution_id = :institution_id";
        $stmt = $this->pdo->prepare($sql);
        $stmt->execute([':institution_id' => $institution->getInstitutionId()]);

        return $stmt->fetch();
    }

    /* Institution Repository End */

    /* Category Repository Start */

    /**
     * Select only 01 category.
     * @param int $id
     * @return array
     */
    public function queryCategory(int $id): array
    {
        $sql = "SELECT * FROM categories WHERE category_id = :id";
        $stmt = $this->pdo->prepare($sql);
        $stmt->execute([
            ':id' => $id
        ]);

        return $stmt->fetch(PDO::FETCH_ASSOC);
    }

    /**
     * Select all categories.
     * @return array
     */
    public function allCategories(): array
    {
        $sql = "SELECT * FROM categories ORDER BY category_name";
        $stmt = $this->pdo->query($sql);

        return $this->treatCategoriesList($stmt);
    }

    /**
     * Handles the list of categories columns in the database.
     * @param PDOStatement $stmt
     * @return array
     */
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

    /**
     * Insert an category.
     * @param Category $category
     * @return void
     */
    public function insertCategory(Category $category): void
    {
        $sql = "INSERT INTO categories (category_name) VALUES (:category_name)";
        $stmt = $this->pdo->prepare($sql);
        $stmt->execute([':category_name' => $category->getCategoryName()]);
    }

    /**
     * Delete a category.
     * @param Category $category
     * @return void
     */
    public function deleteCategory(Category $category): void
    {
        $sql = "DELETE FROM categories WHERE category_id = :id";
        $stmt = $this->pdo->prepare($sql);
        $stmt->bindValue(':id', $category->getCategoryId(), PDO::PARAM_INT);
        $stmt->execute();
    }

    /**
     * Checks if there is a course registered with the category received by parameter.
     * @param Category $category
     * @return mixed
     */
    public function verifyRowCategory(Category $category)
    {
        $sql = "SELECT * FROM courses WHERE category_id = :category_id";
        $stmt = $this->pdo->prepare($sql);
        $stmt->execute([':category_id' => $category->getCategoryId()]);

        return $stmt->fetch();
    }

    /**
     * Select courses only that have the category received by parameter.
     * @param int $value
     * @return array
     */
    public function queryCoursesOnlyByCategory(int $value): array
    {
        $sql = "SELECT * FROM courses WHERE category_id = $value ORDER BY course_name";
        $stmt = $this->pdo->query($sql);

        return $this->treatCoursesList($stmt);
    }

    /* Category Repository End */

    /* Courses Repository Start */

    /**
     * Select all courses with order by course_name row in DB.
     * @return array
     */
    public function allCourses(): array
    {
        $sql = "SELECT * FROM courses order by course_name ";
        $stmt = $this->pdo->query($sql);

        return $this->treatCoursesList($stmt);
    }

    /**
     * Select 5 courses where the Highlight is the same 01 (Highlight in the table).
     * @return array
     */
    public function queryCoursesLimit(): array
    {
        $sql = "SELECT * FROM courses WHERE highlight = 1 ORDER BY course_name LIMIT 5";
        $stmt = $this->pdo->query($sql);

        return $this->treatCoursesList($stmt);
    }

    /**
     * Select all courses where Highlight is 01 and verify is the high or same 5.
     * @return bool
     */
    public function queryCountHighlightLimit(): bool
    {
        $sql = "SELECT * FROM courses WHERE highlight = 1";
        $stmt = $this->pdo->prepare($sql);
        $stmt->execute();

        $count = $stmt->rowCount();

        if ($count >= 5) return true;

        return false;
    }

    /**
     * Counts the amount of rows in the course_id column and returns the value.
     * @return int
     */
    public function queryCountRowsCourses(): int
    {
        $sql = "SELECT COUNT(course_id) FROM courses";
        $stmt = $this->pdo->query($sql);

        return $stmt->fetchColumn();
    }

    /**
     * Handles the list of courses columns in the database.
     * @param PDOStatement $stmt
     * @return array
     */
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
            $courseData->setHighlight($row['highlight']);
            array_push($courseList, $courseData);
        }

        return $courseList;
    }

    /**
     * Insert one course in the database.
     * @param Course $course
     * @param Institution $institution
     * @param Category $category
     * @return void
     */
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

    /**
     * Delete a course.
     * @param Course $course
     * @return void
     */
    public function deleteCourse(Course $course): void
    {
        $sql = "DELETE FROM courses WHERE course_id = :id";
        $stmt = $this->pdo->prepare($sql);
        $stmt->bindValue(':id', $course->getCourseId(), PDO::PARAM_INT);
        $stmt->execute();
    }

    /**
     * Update the highlight column table (0 or 1) to be highlighted on the main page.
     * @param Course $course
     * @return void
     */
    public function highlightCourse(Course $course)
    {
        $sql = "UPDATE courses SET highlight = :highlight WHERE course_id = :course_id";
        $stmt = $this->pdo->prepare($sql);
        $stmt->execute([
            ':highlight' => $course->getHighlight(),
            ':course_id' => $course->getCourseId()
        ]);
    }

    /* Courses Repository End */
}