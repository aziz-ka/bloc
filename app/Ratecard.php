<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Ratecard extends Model
{
    protected $fillable = [
    	'name',
    	'value'
    ];
}
