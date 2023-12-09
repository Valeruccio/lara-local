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
//        $postswherefirst = Post::where('is_published', 1)->first();

        foreach ($postswhere as $item) {
            echo  $item->title;
            echo '<br>';
        }

//ini_set("xdebug.overload_var_dump", "off");
//echo "<pre>";
//            dd(
//                __FILE__,
//                __LINE__,
//                'Valeriy Tyulin',
//                $postswhere
//            );
//            echo "</pre>";
//            die;

//        //Вычленить из атрибутов
//        $post->title;

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
        $post = Post::find(1);

        $post->update([
            'is_published' => 1,
            'title' => 'rem',
        ]);
        $postswherefirst = Post::where('is_published', 1)->first();
        echo $postswherefirst->title;
    }

    public function delete() {
        $post = Post::find(5);

        if ($post) {
            //грубый способ
            $post->delete();
            //Мягкий способ
            $post->softDeletes();
        }


        dd('delete');
    }

    //Востановление данных
    public function restore() {
        //С мусором!
        $post = Post::withTrashed()->find(5);
        $post->restore();
        dd($post);
    }

    //firstOrCreate
    //updateOrCreate
    //создать если нет такого, получить если есть такой
    public function firstOrCreate() {

        $post = Post::firstOrCreate([
            'title' => 'rem'
        ], [
            'userid' => 1,
            'title' => 'fest',
            'content' => 'fest',
            'image' => 'fest',
            'likes' => 4,
            'is_published' => 1,
        ]);

        dd($post);
    }

    //создать если нет такого, обновить если есть такой
    public function updateOrCreate() {

        $post = Post::updateOrCreate([
            'title' => 'rem'
        ], [
            'userid' => 1,
            'title' => 'festr',
            'content' => 'festr',
            'image' => 'festr',
            'likes' => 4,
            'is_published' => 1,
        ]);

        dd($post->title);
    }

}
