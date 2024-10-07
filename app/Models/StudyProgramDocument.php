<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class StudyProgramDocument extends Model
{
    use HasFactory;
    protected $fillable = [
        'akreditasi_study_program_id',
        'name',
        'category',
        'sertificate',
        'period',
        'status',
    ];

    public function akreditasiStudyProgram()
    {
        return $this->belongsTo(AkreditasiStudyProgram::class);
    }
}
