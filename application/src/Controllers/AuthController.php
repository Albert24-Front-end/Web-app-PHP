<?php

namespace App\Controllers;

use App\Lib\ViewDispatcher;
use App\Models\User;

class AuthController
{
    public function regForm(): void
    {
        ViewDispatcher::getInstance()->render("auth/regForm");
    }
    public function loginForm(): void
    {
        $msg = $_SESSION["msg"] ?? null;
        $error = $_SESSION["error"] ?? null;
        unset($_SESSION["msg"]);
        unset($_SESSION["error"]);
        ViewDispatcher::getInstance()->render("auth/loginForm", [
            "msg" => $msg,
            "error" => $error,
        ]);
    }
    public function changePassForm(): void
    {
        if (!isset($_SESSION["userId"])) {
            header("Location: /login");
            return;
        }
        $user = User::findById($_SESSION["userId"]);
        $msg = $_SESSION["msg"] ?? null;
        $error = $_SESSION["error"] ?? null;
        unset($_SESSION["msg"]);
        unset($_SESSION["error"]);
        ViewDispatcher::getInstance()->render("auth/changePassForm", [
            "msg" => $msg,
            "error" => $error,
            "user" => $user,
        ]);
    }

    public function register(): void
    {
        $user = User::create($_POST["login"], $_POST["password"]);
        $_SESSION["msg"] = "User created";
        header("Location: /login"); // редирект на страницу логина
    }
    public function login(): void
    {
       try {
           $user = User::findByLogin($_POST["login"]);
           $user->checkPassword($_POST["password"]);
           $_SESSION["userId"] = $user->id;
           header("Location: /");
       } catch(\Exception $e) {
            $_SESSION["error"] = "Invalid login or password";
           header("Location: /login");
       }
    }
    public function changePass(): void
    {
        try {
            $user = User::findById($_SESSION["userId"]);
            $user->checkPassword($_POST["oldPassword"]);
            $user->changePassword($_POST["newPassword"]);
            header("Location: /");
        } catch(\Exception $e) {
            $_SESSION["error"] = "Invalid old password";
            header("Location: /change-pass");
        }
    }

}