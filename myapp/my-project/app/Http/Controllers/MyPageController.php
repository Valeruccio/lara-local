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
        //Чтение
        //Получить одну запись
        $post = Post::find(1);

        //Получить все записи
        $posts = Post::all();
        //Получить определенные поля их всех записей
        $postswithattr = Post::all(['title', 'content']);
        //Условие где получаем
        $postswhere = Post::where('is_published', 1)->get();
        //Условие где получаем только первый
        $postswhere = Post::where('is_published', 1)->first();

        foreach ($postswhere as $item) {
            echo  $item->title;
            echo '<br>';
        }

ini_set("xdebug.overload_var_dump", "off");
echo "<pre>";
            dd(
                __FILE__,
                __LINE__,
                'Valeriy Tyulin',
                $postswhere
            );
            echo "</pre>";
            die;

        //Вычленить из атрибутов
        $post->title;

    }

    public function create() {
        $postArr = [
            [
               'userid' => '1',
               'title' => 'test',
               'content' => 'test',
               'image' => 'test',
               'likes' => 2,
               'is_published' => 1,
            ],
            [
                'userid' => '1',
                'title' => 'fest',
                'content' => 'fest',
                'image' => 'fest',
                'likes' => 4,
                'is_published' => 1,
            ],
        ];

        Post::create([
            'userid' => 1,
            'title' => 'fest',
            'content' => 'fest',
            'image' => 'fest',
            'likes' => 4,
            'is_published' => 1,
        ]);
        ini_set("xdebug.overload_var_dump", "off");
        echo "<pre>";
                    dd(
                        __FILE__,
                        __LINE__,
                        'Valeriy Tyulin',
        'yeah'
                    );
                    echo "</pre>";
                    die;
    }

    public function update() {

    }
}
