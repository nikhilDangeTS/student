<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Product extends Model
{

    //protected $table = "student";
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
      'first_name', 'last_name'
    ];
}
