<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Job; //  Job model imported
use App\Models\User; //  user model imported
use App\Models\Application; //  application model imported
class CompanyProfile extends Model
{
    use HasFactory;
 // Define the table name explicitly if it's not the plural form of the model name
 protected $table = 'company_profile';
    protected $fillable = [
        'user_id',
        'name',
        'email',
        'address',
        'phone',
        'description',
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }


    // Defined relationship with Job model
    public function jobs()
    {
        return $this->hasMany(Job::class, 'company_id');
    }

   
     // Defined relationship with application model
      public function applications()
    {
        return $this->hasManyThrough(Application::class, Job::class, 'company_id', 'job_id', 'id', 'id');
    }



}





