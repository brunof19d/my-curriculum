<?php

use App\Controller\Main;
use App\Controller\Admin\Login;
use App\Controller\Admin\MakeLogin;


return [
    '/home' => Main::class,
    '/login' => Login::class,
    '/makelogin' => MakeLogin::class,
];

