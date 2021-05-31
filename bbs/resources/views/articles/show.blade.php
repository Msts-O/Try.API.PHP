@extends('layouts.layout')

@section('content')
  <div class="container mt-4">
   <div class="border p-4">
    <div class="mb-4 text-left">
     <a class="btn btn-success" href="{{ route('articles.index') }}">Back to Home</a>
    </div>

  <div class="mb-4 text-right">
    @if(optional(Auth::user())->id=== $article->user_id)
     <a class="btn btn-primary" href="{{ route('articles.edit', ['article' => $article]) }}">Edit</a>
      <form style="display: inline-block;" method="POST" action="{{ route('articles.destroy', ['article' => $article]) }}">
    @csrf
    @method('DELETE')
     <button class="btn btn-danger">delete</button>
      </form>
    @endif
  </div>

  <h1 class="h5 mb-4">{{ $article->title }}</h1>
   <p class="mb-5">{!! nl2br(e($article->description)) !!}</p>
  <section>
    <h2 class="h5 mb-4">Comments</h2>
　　　<form class="mb-4" method="POST" action="{{ route('comments.store') }}">
    @csrf
     <input name="post_id" type="hidden" value="{{ $article->id }}">

     <div class="form-group">
      <label for="body">Content</label>
    <textarea id="body" name="body" class="form-control {{ $errors->has('body') ? 'is-invalid' : '' }}" rows="4">{{ old('body') }}</textarea>
     @if($errors->has('body'))
       <div class="invalid-feedback">{{ $errors->first('body') }}</div>
     @endif
     </div>
      <div class="mt-4">
       <button type="submit" class="btn btn-primary">To comment here.</button>
      </div>
     </form>
   @forelse($article->comments as $comment)
     <div class="border-top p-4">
      <time class="text-secondary">{{ $comment->created_at->format('Y.m.d H:i') }}</time>
       <p class="mt-2">{!! nl2br(e($comment->body)) !!}</p>
        <span class="h6 mb-4">Posted by:{{ $comment_user_name[$loop->index] }}</span>
       @if(optional(Auth::user())->id === $comment->user_id)
        <a class="btn btn-primary" href="{{ route('comments.edit', ['comment' => $comment]) }}">Edit</a>
        <form style="display: inline-block;" method="POST" action="{{ route('comments.destroy', ['comment' => $comment]) }}">
       @csrf
       @method('DELETE')
         <button class="btn btn-danger">削除する</button>
        </form>
       @endif
     </div>
    @empty
       <p>Comments are not yet.</p>
   @endforelse
  </section>
  </div>
 </div>
@endsection
