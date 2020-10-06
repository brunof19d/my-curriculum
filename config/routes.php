<?php


use App\Controller\Admin\Admin;
use App\Controller\Admin\ControllerAdmin;
use App\Controller\Admin\ControllerEducation;
use App\Controller\Admin\ControllerLanguage;
use App\Controller\Admin\ControllerPersonalData;
use App\Controller\Admin\ControllerSkills;
use App\Controller\Admin\ControllerWork;
use App\Controller\Admin\DeleteAdmin;
use App\Controller\Admin\DeleteEducation;
use App\Controller\Admin\DeleteLanguage;
use App\Controller\Admin\DeleteSkills;
use App\Controller\Admin\DeleteWork;
use App\Controller\Admin\Form\FormAddCourse;
use App\Controller\Admin\Form\FormAddEducation;
use App\Controller\Admin\Form\FormAddLanguage;
use App\Controller\Admin\Form\FormAddSkill;
use App\Controller\Admin\Form\FormAddWork;
use App\Controller\Admin\Form\FormEditEducation;
use App\Controller\Admin\Form\FormEditPersonalData;
use App\Controller\Admin\Form\FormEditSkills;
use App\Controller\Admin\Form\FormEditWork;
use App\Controller\Admin\Form\FormLogin;
use App\Controller\Admin\Form\FormRegister;
use App\Controller\Admin\Logout;
use App\Controller\Main;

return [

    //Home
    '/home' => Main::class,

    // Admin Area
    '/login' => FormLogin::class,
    '/register' => FormRegister::class,
    '/admin' => Admin::class,
    '/logout' => Logout::class,
    '/controller-admin' => ControllerAdmin::class,
    '/delete-admin' => DeleteAdmin::class,

    // Work Experience section
    '/add-work-page' => FormAddWork::class,
    '/edit-work' => FormEditWork::class,
    '/controller-work' => ControllerWork::class,
    '/delete-work' => DeleteWork::class,

    // Education section
    '/add-education' => FormAddEducation::class,
    '/edit-education' => FormEditEducation::class,
    '/controller-education' => ControllerEducation::class,
    '/delete-education' => DeleteEducation::class,

    // Personal Data Section
    '/edit-personal-data' => FormEditPersonalData::class,
    '/controller-personal-data' => ControllerPersonalData::class,

    // Skill section
    '/add-skills' => FormAddSkill::class,
    '/edit-skills' => FormEditSkills::class,
    '/controller-skills' => ControllerSkills::class,
    '/delete-skills' => DeleteSkills::class,

    // Languages section
    '/add-language' => FormAddLanguage::class,
    '/save-language' => ControllerLanguage::class,
    '/delete-language' => DeleteLanguage::class,

    // Courses section
    '/add-course' => FormAddCourse::class,
    '/controller-courses' => \App\Controller\Admin\ControllerCourses::class


];

