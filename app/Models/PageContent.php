<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PageContent extends Model
{
    use HasFactory;
    protected $fillable = ['user_id', 'nesting_page_id', 'name', 'author', 'slug', 'background_image', 'body', 'status', 'created_at'];
    public function user()
    {
        return $this->belongsTo(User::class);
    }
    public function nestingPage()
    {
        return $this->belongsTo(NestingPage::class);
    }
}
