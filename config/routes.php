<?php

use App\Controller\Admin\Admin;
use App\Controller\Admin\Logout;
use App\Controller\Main;
use App\Controller\Admin\Login;
use App\Controller\Admin\MakeLogin;


return [
    '/home' => Main::class,
    '/login' => Login::class,
    '/make-login' => MakeLogin::class,
    '/logout' => Logout::class,
    '/admin' => Admin::class,
];

