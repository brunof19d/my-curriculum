<?php

use App\Controller\Admin\Admin;
use App\Controller\Admin\EditPersonalData;
use App\Controller\Admin\EditWork;
use App\Controller\Admin\Logout;
use App\Controller\Admin\FormRegister;
use App\Controller\Admin\RegisterAdmin;
use App\Controller\Main;
use App\Controller\Admin\Login;
use App\Controller\Admin\MakeLogin;


return [
    '/home' => Main::class,
    '/login' => Login::class,
    '/make-login' => MakeLogin::class,
    '/logout' => Logout::class,
    '/admin' => Admin::class,
    '/register' => FormRegister::class,
    '/save-admin' => RegisterAdmin::class,
    '/edit-personal-data' => EditPersonalData::class,
    '/edit-work' => EditWork::class,
];

