<?php


namespace App\Entity\Model\Courses;


class Course
{
    private int $courseId;
    private string $courseName;
    private string $courseDescription = '';
    private $courseCertified;
    private $courseUrl = '';
    private $institution;
    private $category;

    public function getInstitution()
    {
        return $this->institution;
    }

    public function setInstitution($institution): void
    {
        $this->institution = $institution;
    }


    public function getCategory()
    {
        return $this->category;
    }

    public function setCategory($category): void
    {
        $this->category = $category;
    }

    public function getCourseId(): int
    {
        return $this->courseId;
    }

    public function setCourseId(int $courseId): void
    {
        $this->courseId = $courseId;
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

    public function getCourseCertified()
    {
        return $this->courseCertified;
    }

    public function setCourseCertified($courseCertified): void
    {
        $this->courseCertified = $courseCertified;
    }

    public function getCourseUrl()
    {
        return $this->courseUrl;
    }

    public function setCourseUrl($courseUrl): void
    {
        $this->courseUrl = $courseUrl;
    }

}