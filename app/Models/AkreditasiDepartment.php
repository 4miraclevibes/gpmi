<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class AkreditasiDepartment extends Model
{
    use HasFactory;
    protected $fillable = [
        'name',
        'status',
    ];
    public function akreditasiStudyPrograms()
    {
        return $this->hasMany(AkreditasiStudyProgram::class);
    }
}
