<?php

use App\Controller\Admin\Admin;
use App\Controller\Admin\ControllerAdmin;
use App\Controller\Admin\ControllerWork;
use App\Controller\Admin\DeleteAdmin;
use App\Controller\Admin\DeleteWork;
use App\Controller\Admin\FormAddWork;
use App\Controller\Admin\FormEditPersonalData;
use App\Controller\Admin\FormEditWork;
use App\Controller\Admin\Logout;
use App\Controller\Admin\FormRegister;

use App\Controller\Main;
use App\Controller\Admin\FormLogin;



return array(

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

    // Edit pages in admin area
    '/edit-personal-data' => FormEditPersonalData::class,



);

