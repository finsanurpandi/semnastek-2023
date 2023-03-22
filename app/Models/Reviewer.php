<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Reviewer extends Model
{
    use HasFactory;
    protected $fillable = [
        'email',
        'fullname'
    ];

    public function blindManuscripts()
    {
        return $this->hasMany(BlindManuscript::class, 'reviewer_id');
    }
}
