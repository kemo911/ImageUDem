<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Requests extends Model
{
    protected $table = "requests";
    protected $fillable = ['new_image','student_id','status'];
    public $timestamps = false;
}
