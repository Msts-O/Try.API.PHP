@extends('layouts.layout')

@section('content')
  <div class="container mt-4">
   <div class="border p-4">
    <div class="mb-4 text-left">
     <a class="btn btn-success" href="{{ route('index') }}">Back to Home</a>
    </div>

  <div class="mb-4 text-right">
    @if(Auth::user()->id === $article->user_id)
     <a class="btn btn-primary" href="{{ route('articles.edit', ['article' => $article]) }}">Edit</a>
@endsection
