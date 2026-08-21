<?php
return [
    "GET /" => [\App\Controllers\IndexController::class, "index"],
    "GET /reg" => [\App\Controllers\AuthController::class, "regForm"],
    "POST /reg" => [\App\Controllers\AuthController::class, "register"],
    "GET /login" => [\App\Controllers\AuthController::class, "loginForm"],
    "POST /login" => [\App\Controllers\AuthController::class, "login"],
    "POST /logout" => [\App\Controllers\AuthController::class, "logout"],
    "POST /inc" => [\App\Controllers\CounterController::class, "inc"],
    "GET /change-pass" => [\App\Controllers\AuthController::class, "changePassForm"],
    "POST /change-pass" => [\App\Controllers\AuthController::class, "changePass"],

];
