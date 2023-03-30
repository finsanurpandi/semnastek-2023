<?php

namespace App\Http\Controllers;

use App\Models\Article;
use App\Models\ArticleReview;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Session;

class KeuanganController extends Controller
{
    public function pembayaran()
    {
        $articles = DB::table('articles')
            ->leftJoin('article_submission', 'articles.id', '=', 'article_submission.article_id')
            ->leftJoin('article_review', 'articles.id', '=', 'article_review.article_id')
            ->leftJoin('payments', 'articles.id', '=', 'payments.articles_id')
            ->select('articles.*', 'payments.payment_file', 'article_submission.submission_id', 'article_review.review_id',)
            ->where('article_review.review_id', 1)
            ->get();

        return view('article.list-article', compact('articles'));
        // dd($articles);
    }

    public function approved($id)
    {
        try {
            DB::table('article_submission')
                ->where('article_id', $id)
                ->update(['submission_id' => 4]);
        } catch (Throwable $th) {
            report($e);

            return false;
        }

        Session::flash('status', 'Artikel berhasil disetujui!!!');
        return redirect()->route('keuangan.pembayaran');
    }
}
