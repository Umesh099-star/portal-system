<?php
namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Job extends Model
{
    use HasFactory;
    
    protected $fillable = [
        'title', 'category', 'job_type', 'vacancy', 'salary',
        'location', 'description', 'qualifications', 'experience',
        'reference_id', 'added_by','company_id'
    ];
    public function company() {
        return $this->belongsTo(User::class, 'company_id');
    }

    public function admin()
    {
        return $this->belongsTo(Admin::class, 'reference_id');
    }
    public function applications()
    {
        return $this->hasMany(Application::class, 'job_id');
    }

}
