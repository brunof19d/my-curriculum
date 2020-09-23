<?php

use App\Controller\Admin\Admin;
use App\Controller\Admin\DeleteAdmin;
use App\Controller\Admin\FormEditPersonalData;
use App\Controller\Admin\FormEditWork;
use App\Controller\Admin\Logout;
use App\Controller\Admin\FormRegister;
use App\Controller\Admin\RegisterAdmin;
use App\Controller\Main;
use App\Controller\Admin\FormLogin;
use App\Controller\Admin\MakeLogin;


return [
    '/home' => Main::class,
    '/login' => FormLogin::class,
    '/make-login' => MakeLogin::class,
    '/logout' => Logout::class,
    '/admin' => Admin::class,
    '/register' => FormRegister::class,
    '/save-admin' => RegisterAdmin::class,
    '/delete-admin' => DeleteAdmin::class,
    '/edit-personal-data' => FormEditPersonalData::class,
    '/edit-work' => FormEditWork::class,
];

