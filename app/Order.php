<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
     public function status() {
    	return $this->belongsTo("App\Status");
    }

    function movies() {
    	return $this->belongsToMany("\App\Movie")->withPivot("quantity")->withTimeStamps();
    	//return $this->belongsToMnay("items", tablename_of_where they meet)
    }
}
