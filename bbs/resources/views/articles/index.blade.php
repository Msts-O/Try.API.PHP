@extends('layouts.layout')

@section('content')
 <div class="container mt-4">
  <div class="mb-4">
  <a class="btn btn-primary" href="{{ route('articles.create') }}" create="btn btn-primary">投稿を新規作成する</a>
  </div>
 @foreach($articles as $article)
  <div class="card md-4">
   <div class="card-header">{{ $article->title }}</div>
    <div class="card-body">
     <p class="card-text">{{ $article->body }}</p>
      <a class="btn btn-primary" href="{{ route('articles.show', ['article' => $article]) }}">続きを読む</a>
    </div>
    <div class="card-footer">
    <span class="mr-2">投稿日時:{{ $article->created_at->format('Y.m.d') }}</span>

    @if ($article->comments->count())
     <span class="badge badge-primary">Comments{{ $article->comments->count() }}件</span>
    @endif
    </div>
  </div>
<br>
  @endforeach
   <div class="d-flex justify-content-center mb-5">{{ $articles->links() }}</div>
 </div>
@endsection
