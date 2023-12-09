<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Post extends Model
{
    use HasFactory;
    //трейт на удаление не удаление
    use SoftDeletes;

    //обязательно название таблицы
    protected $table = 'posts';

    //Для защиты от записи (сейчас все)
//    protected $guarded = ['userid', 'title', 'image', 'likes'];
    protected $guarded = false;

    //Для разблокирования для записи
//    protected $fillable = ['userid', 'title', 'image', 'likes'];
}
