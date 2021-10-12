<?php

namespace App\Models;

// use App\Models\Shop;
use App\Models\User;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Like extends Model
{
    // use HasFactory;

    // public function shop()
    // {
    //     return $this->belongsTo(Shop::class);
    // }

    // public function user()
    // {
    //     return $this->belongsTo(User::class);
    // }




    protected $table = 'likes';

    public function user()
    {
        return $this->belongsToMany(User::class, "user_id");
    }

    public function shop()
    {
        return $this->belongsToMany('App\Models\Shop');
    }

    protected $fillable =[
        'user_id', 'shop_id'
    ];
}
