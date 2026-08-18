<?php

namespace App\Controllers;

use App\Lib\Db;
use App\Models\User;

class CounterController
{
    public static function inc(): void
    {
        if (!isset($_SESSION["userId"])) {
            header("401 Not authorized");
            return;
        }
        Db::transaction(function () use(&$user) {
            $user = User::findById($_SESSION["userId"], true);
            $user->incCounter();
            $user->save();
        });
        echo json_encode(["counter" => $user->counter]);
    }
}