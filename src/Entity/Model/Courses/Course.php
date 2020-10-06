<?php


namespace App\Entity\Model\Courses;


class Course
{
    private int $courseId;
    private Category $category;
    private Institution $institution;
    private string $courseName;
    private string $courseDescription;
    private string $courseCertified;

    public function getCourseId(): int
    {
        return $this->courseId;
    }

    public function setCourseId(int $courseId): void
    {
        $this->courseId = $courseId;
    }

    public function getCategory(): Category
    {
        return $this->category;
    }
    public function setCategory(Category $category): void
    {
        $this->category = $category;
    }

    public function getInstitution(): Institution
    {
        return $this->institution;
    }

    public function setInstitution(Institution $institution): void
    {
        $this->institution = $institution;
    }

    public function getCourseName(): string
    {
        return $this->courseName;
    }

    public function setCourseName(string $courseName): void
    {
        $this->courseName = $courseName;
    }

    public function getCourseDescription(): string
    {
        return $this->courseDescription;
    }

    public function setCourseDescription(string $courseDescription): void
    {
        $this->courseDescription = $courseDescription;
    }

    public function getCourseCertified(): string
    {
        return $this->courseCertified;
    }

    public function setCourseCertified(string $courseCertified): void
    {
        $this->courseCertified = $courseCertified;
    }

}