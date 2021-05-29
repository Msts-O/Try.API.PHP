<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Article;

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

    public function store(Request $request)
    {
        $params = $request->validate([
            'title' => 'required|max:50',
            'description' => 'required|max:2000',
        ]);

        return view('articles.create');
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

        return view('articles.show', [
            'article' => $article,
        ]);
    }

    public function update(Request $request)
    {
        $params = [
            'title' => $request->title,
            'title' => $request->description
        ];

        $article=new Article;
        $article->fill($article)->save();

        return redirect('/articles')->with('message', 'edit your article');
    }

    public function destroy($article_id)
    {
        $article=Article::findOrFail($article_id);
        $article->delete();

        return redirect('/articles')->with('message','delete your article');
    }
}
