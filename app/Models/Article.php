<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

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

    public function user()
    {
        return $this->belongsTo(User::class);
    }

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

    public function department()
    {
        return $this->hasOneThrough(Department::class, Scope::class);
    }

    public function submissions()
    {
        return $this->belongsToMany(Submission::class);
    }

    public function submission()
    {
        return $this->belongsToMany(Submission::class)->latest()->limit(1);
    }
}
