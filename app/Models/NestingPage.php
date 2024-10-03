<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class NestingPage extends Model
{
    use HasFactory;
    protected $fillable = ['user_id', 'name', 'slug', 'background_image', 'status', 'body'];
    public function user()
    {
        return $this->belongsTo(User::class);
    }
    public function pageContents()
    {
        return $this->hasMany(PageContent::class);
    }
}
