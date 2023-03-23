<?php

namespace App\Http\Controllers;

use App\Models\Article;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class KeuanganController extends Controller
{
    public function pembayaran()
    {
        $articles = DB::table('articles')
            ->leftJoin('payments', 'articles.id', '=', 'payments.articles_id')
            ->select('articles.*', 'payments.payment_file')
            ->get();

        return view('article.list-article', compact('articles'));
        // dd($articles);
    }
}
