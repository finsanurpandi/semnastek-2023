<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Article extends Model
{
    use HasFactory;
    protected $fillable = [
        'users_id',
        'participant_category',
        'ktm_file',
        'title',
        'abstract',
        'knowledge_field',
        'article_scope',
        'article_file',
        'correspondence',
        'article_status',
    ];
}
