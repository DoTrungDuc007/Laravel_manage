<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Slider extends Model
{
    use softDeletes;
    protected $fillable=['name','description','image_name','image_path'];
}
