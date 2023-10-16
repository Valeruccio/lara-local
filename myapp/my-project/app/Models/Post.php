<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    use HasFactory;
    //обязательно название таблицы
    protected $table = 'posts';

    //Для защиты от записи (сейчас все)
//    protected $guarded = ['userid', 'title', 'image', 'likes'];
    protected $guarded = false;

    //Для разблокирования для записи
//    protected $fillable = ['userid', 'title', 'image', 'likes'];
}
