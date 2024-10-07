<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class AkreditasiStudyProgram extends Model
{
    use HasFactory;
    protected $fillable = [
        'akreditasi_department_id',
        'name',
        'status',
    ];
    public function akreditasiDepartment()
    {
        return $this->belongsTo(AkreditasiDepartment::class);
    }
    public function studyProgramDocuments()
    {
        return $this->hasMany(StudyProgramDocument::class);
    }
}
