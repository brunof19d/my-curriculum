<?php

use App\Controller\Admin\Admin;
use App\Controller\Admin\DeleteAdmin;
use App\Controller\Admin\EditWork;
use App\Controller\Admin\FormEditPersonalData;
use App\Controller\Admin\FormEditWork;
use App\Controller\Admin\Logout;
use App\Controller\Admin\FormRegister;
use App\Controller\Admin\RegisterAdmin;
use App\Controller\Main;
use App\Controller\Admin\FormLogin;
use App\Controller\Admin\MakeLogin;


return [
    //Home
    '/home' => Main::class,

    // Login Area
    '/login' => FormLogin::class,
    '/make-login' => MakeLogin::class,
    '/logout' => Logout::class,

    // Administrator Users
    '/admin' => Admin::class,
    '/register' => FormRegister::class,
    '/save-admin' => RegisterAdmin::class,
    '/delete-admin' => DeleteAdmin::class,

    // Work Experience section
    '/add-work-page' => \App\Controller\Admin\FormAddWork::class,
    '/add-work' => \App\Controller\Admin\AddWork::class,
    '/edit-work' => FormEditWork::class,
    '/make-edit-work' => EditWork::class,
    '/delete-work' => \App\Controller\Admin\DeleteWork::class,


    // Edit pages in admin area
    '/edit-personal-data' => FormEditPersonalData::class,

];

