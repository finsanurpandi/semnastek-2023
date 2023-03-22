<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\BlindManuscript;

class Article extends Model
{
    use HasFactory;
    protected $fillable = [
        'users_id',
        'scope_id',
        'title',
        'abstract',
        'keywords',
        'corresponding_email',
    ];

    public function scope()
    {
        return $this->belongsTo(Scope::class);
    }

    public function authors()
    {
        return $this->hasMany(Author::class);
    }

    public function manuscript()
    {
        return $this->hasOne(Manuscript::class);
    }

    public function blindManuscripts()
    {
        return $this->hasMany(BlindManuscript::class, 'article_id');
    }
}
