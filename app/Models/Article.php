<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\BlindManuscript;
use Illuminate\Support\Facades\DB;
use App\Models\Author;

class Article extends Model
{
    use HasFactory;
    protected $fillable = [
        'users_id', 'scope_id', 'title', 'abstract', 'keywords', 'corresponding_email', 'submitted_at'
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

    public function reviewers()
    {
        return $this->belongsToMany(Reviewer::class, 'blind_manuscripts');
    }

    public function manuscript()
    {
        return $this->hasOne(Manuscript::class);
    }

    public function blindManuscripts()
    {
        return $this->hasMany(BlindManuscript::class, 'article_id');
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

    public static function getExportArticles()
    {

        $articles = Article::all();

        $data = $articles->map(function ($article) {
            $authorsString = $article->authors->map(function ($author) {
                return $author->firstname . ' ' . $author->lastname . ' (' . $author->affiliation . ')';;
            })->implode(', ');

            return [
                'title' => $article->title,
                'abstract' => $article->abstract,
                'keywords' => $article->keywords,
                'corresponding_email' => $article->corresponding_email,
                'submitted_at' => $article->submitted_at,
                'authors' => $authorsString,
                'reviewers' => $article->reviewers->pluck('fullname')->first(),
                'scope' => $article->scope->scope,
                'department_name' => $article->scope->department->name,
            ];
        });

        $data_filter = [];

        $no = 1;
        for ($i = 0; $i < $data->count(); $i++) {
            $data_filter[$i]['no'] = $no++;
            $data_filter[$i]['authors'] = $data[$i]['authors'];
            $data_filter[$i]['reviewers'] = $data[$i]['reviewers'];
            $data_filter[$i]['scope'] = $data[$i]['scope'];
            $data_filter[$i]['department_name'] = $data[$i]['department_name'];
            $data_filter[$i]['title'] = $data[$i]['title'];
            $data_filter[$i]['keywords'] = $data[$i]['keywords'];
            $data_filter[$i]['corresponding_email'] = $data[$i]['corresponding_email'];
            $data_filter[$i]['submitted_at'] = $data[$i]['submitted_at'];
            $data_filter[$i]['abstract'] = $data[$i]['abstract'];
        }

        return $data_filter;
    }
}
