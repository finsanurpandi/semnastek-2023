<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Scope extends Model
{
    use HasFactory;

    protected $fillable = ['scope', 'department_id'];

    public function department()
    {
        return $this->belongsTo(Department::class);
    }

    public function articles()
    {
        return $this->hasMany(Article::class);
    }
}
