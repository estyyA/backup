<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Movies extends Model
{
    protected $table = 'movies';

    protected $fillable =   ['title',
                            'genre',
                            'year',
                            'poster'];
}