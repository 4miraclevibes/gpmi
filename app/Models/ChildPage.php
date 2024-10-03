<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ChildPage extends Model
{
    use HasFactory;
    protected $fillable = ['user_id', 'parent_page_id', 'name', 'slug', 'body', 'background_image'];
    public function user()
    {
        return $this->belongsTo(User::class);
    }
    public function parentPage()
    {
        return $this->belongsTo(ParentPage::class);
    }
}
    