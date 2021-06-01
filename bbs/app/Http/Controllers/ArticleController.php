<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Article;
use App\User;
use App\Http\Requests\ArticleRequest;


class ArticleController extends Controller
{
    public function index()
    {
        $articles = Article::orderBy('created_at', 'desc')->paginate(10);

        return view('articles.index', ['articles' => $articles]);
    }

    public function create()
    {
        return view('articles.create');
    }

    public function store(ArticleRequest $request)
    {
      $article = new Article;

      $article->title = $request->title;
      $article->body  = $request->body;

      $article->save();

      return redirect('articles')->with('message', 'post your article');
    }

    public function show(Request $request,$article_id)
    {
        $article = Article::findOrFail($article_id);

        return view('articles.show', [
            'article' => $article,
        ]);
    }

    public function edit($article_id)
    {
        $article = Article::findOrFail($article_id);

        return view('articles.edit', [
            'article' => $article,
        ]);
    }

    public function update(Request $request,$article_id)
    {
        $article = Article::findOrFail($article_id);


        $article->title = $request->title;
        $article->body  = $request->body;

        $article->update();

        return redirect('articles')->with('message', 'edit your article');
    }

    public function destroy($article_id)
    {
        $article=Article::findOrFail($article_id);
        $article->delete();

        \DB::transaction(function()use ($article){
            $article->comments()->delete();
            $article->delete();
        });

        return redirect('/articles')->with('message','delete your article');
    }
}
