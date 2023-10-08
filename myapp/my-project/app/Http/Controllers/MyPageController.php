<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
//Пример контроллера
class MyPageController extends Controller
{
    public function show()
    {
        return 'Главная страница';
    }
}
