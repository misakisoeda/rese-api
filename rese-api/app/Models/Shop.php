<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Shop extends Model
{
    use HasFactory;

    // protected $fillable = ['user_id', 'shop_id'];

    // public static $rules = array(
    //     'user_id' => 'required',
    //     'shop_id' => 'required',
    // );
    // public function getDetail()
    // {
    //     $txt = 'ID:'.$this->id . ' ' . $this->name . '(' . $this->age .  '才'.') '.$this->nationality;
    //     return $txt;
    // }
}
