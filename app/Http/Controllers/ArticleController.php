<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
//  Articleクラスを読み込む
use App\Models\Article;

class ArticleController extends Controller
{
    // indexページへ移動
    public function index()
    {
        // モデル名::テーブル全件取得
        $articles =Article::all();
        // articlesディレクトリーの中のindexページを指定し、articlesの連想配列を代入
        return view('articles.index', ['articles' => $articles]);
    }


    public function create()
    {
        return view('articles.create');
    }

    public function store(Request $request)
    {
        // インスタンスの作成
        $article = new Article;

        // 値の用意
        $article->title = $request->title;
        $article->body = $request->body;

        // インスタンスに値を設定して保存
        $article->save();

        // 登録したらindexに戻る
        return redirect(route("articles.index"));
    }

    // showページへ移動
    public function show($id)
    {
        $article = Article::find($id);
        return view('articles.show', ['article' => $article]);
    }
}
