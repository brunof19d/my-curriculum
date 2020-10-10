<?php


namespace App\Entity\Repository;


use App\Entity\Model\Courses\Category;
use App\Entity\Model\Courses\Course;
use App\Entity\Model\Courses\Institution;
use PDOStatement;

interface CourseRepository
{
    public function allCourses(): array;

    public function queryCoursesLimit(): array;

    public function queryCountHighlightLimit(): bool;

    public function queryCountRowsCourses(): int;

    public function treatCoursesList(PDOStatement $stmt): array;

    public function insertCourse(Course $course, Institution $institution, Category $category): void;

    public function deleteCourse(Course $course): void;

    public function highlightCourse(Course $course);
}