<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class userprofile extends Model
{
    use HasFactory;
    protected $table = 'users_profile'; // check it matches table name in db
    protected $fillable = [
        'user_id',
        'name',
        'email',
        'address',
        'phone',
        'education',
        'cv'
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }
     // Optional if no timestamps
     public $timestamps = false; // Set to true if you have timestamps
}


