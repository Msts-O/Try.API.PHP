<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Http\Requests\CommentRequest;
use App\Comment;
use App\Article;


class CommentController extends Controller
{

    public function store(CommentRequest $request)
    {

        $params = [
            'article_id' => 'required|exists:articles,id',
            'name' => $request->name,
            'body' => $request->body,
        ];
        $article = Article::findOrFail($params['article_id']);
        $comment = new Comment();
        $comment->fill($params)->save();

        return view('articles.show', ['article' =>$article ]);
    }

    public function edit($id)
    {
        //
    }

    public function update(Request $request, $id)
    {
        //
    }

    public function destroy($id)
    {
        //
    }
}
