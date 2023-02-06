<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
// use Cviebrock\EeloquentSluggable\Sluggable;

class Post extends Model
{
    use HasFactory;
    // use sluggable;

    protected $fillable = [
        'title','description','user_id',
    ];

    public function user()
    {
        return $this->belongsto(related: User::class);
    }

    // public function sluggable() : array
    // {
    //     return [
    //         'slug' => [
    //             'source' => 'title'
    //         ]
    //     ];
    // }
}
