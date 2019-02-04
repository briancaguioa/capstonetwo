<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Movie extends Model
{
    //table name
    protected $table = 'movies';
    //Primary key
    public $primaryKey = 'id';
    //Time stamps
    public $timestamps = true;

}
