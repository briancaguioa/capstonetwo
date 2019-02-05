<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Movie extends Model
{

	public function category() {
    	return $this->belongsTo("App\Category"); //belongsTo is single
    }
    
    //table name
    protected $table = 'movies';
    //Primary key
    public $primaryKey = 'id';
    //Time stamps
    public $timestamps = true;

}
