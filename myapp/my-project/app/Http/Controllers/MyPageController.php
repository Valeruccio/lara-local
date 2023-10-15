<?php

namespace App\Http\Controllers;

use App\Models\Post;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Http\Request;

//Пример контроллера
class MyPageController extends Controller
{
    public function show()
    {
        //Получить одну запись
        $post = Post::find(1);

        //Вычленить из атрибутов
        $post->title;

        ini_set("xdebug.overload_var_dump", "off");
        echo "<pre>";
                    dd(
                        __FILE__,
                        __LINE__,
                        'Valeriy Tyulin',
                        $post->title
                    );
                    echo "</pre>";
                    die;
    }
}
