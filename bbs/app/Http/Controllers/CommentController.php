<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Http\Requests\ArticleRequest;
use App\Http\Requests\CommentRequest;
use App\Article;
use App\Comment;



class CommentController extends Controller
{

    public function store(CommentRequest $request)
    {

        $params = [
            'article_id' => 'required|exists:articles,id',
            'name' => 'required|max:30',
            'comment' => 'required|max:300',
        ];
        $article = Article::findOrFail($params['article_id']);
        $comment = new Comment();
        $comment->comment = $request->comment;

        $article->comment()->save($comment);

        return redirect()->route('articles.show', ['article' => $article]);
    }

    public function edit($id)
    {
        $comment = Comment::findOrFail($id);

        return view('comment.edit', [
            'comment' => $comment,
        ]);
    }

    public function update(Request $request, $id)
    {
        $params = $request->validate([
            'name' => 'required|max:30',
            'body' => 'required|max:300',
        ]);

        $comment = comment::findOrFail($id);

        $this->authorize('update', $comment);

        $comment->fill($params)->save();
        return redirect()->route('articles.show', ['article' => $comment->article_id]);
    }

    public function destroy($id)
    {
        $comment = Comment::findOrFail($id);

        $this->authorize('delete', $comment);

        \DB::transaction(function()use ($comment){
            $comment->delete();
        });

        return redirect()->route('articles');
    }
}
