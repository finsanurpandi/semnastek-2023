<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ArticleSubmission extends Model
{
    use HasFactory;
    protected $table = 'article_submission';


    public function article()
    {
        return $this->belongsTo(Article::class);
    }

    public function submissionStatus()
    {
        return $this->belongsTo(SubmissionStatus::class, 'submission_id');
    }
}
