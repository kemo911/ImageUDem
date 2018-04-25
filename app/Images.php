<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Images extends Model
{
    protected $table = "Images";
    protected $fillable = ['ref_number'];
    public $timestamps = false;

    public function insertUser($id){
        $data = new Images();
        $data->ref_number = $id;
        $data->save();
    }
}
