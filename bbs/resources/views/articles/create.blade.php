@extends('layout')

@section('content')
    <div class="container mt-4">
        <div class="border p-4">
            <div class="mb-4 text-left">
                <a class="btn btn-success" href="{{ route('articles') }}">
                    投稿一覧に戻る
                </a>
            </div>
            <div class="mb-4 text-right">
                @if(Auth::user()->id === $article->user_id)
                    <a class="btn btn-primary" href="{{ route('articles.edit', ['article' => $article]) }}">
                        編集する
                    </a>
                    <form style="display: inline-block;" method="POST" action="{{ route('article.destroy', ['article' => $article]) }}">
                        @csrf
                        @method('DELETE')
                        <button class="btn btn-danger">削除する</button>
                    </form>
                @endif
            </div>
            <h1 class="h5 mb-4">
                {{ $article->title }}
            </h1>
            <p class="mb-5">
                {!! nl2br(e($article->comment)) !!}
            </p>
            <span class="h6 mb-4">投稿者:{{ $user->name }}さん</span>
            <section>
                <h2 class="h5 mb-4">
                    コメント
                </h2>
                <form class="mb-4" method="POST" action="{{ route('comment.store') }}">
                    @csrf
                    <input name="post_id" type="hidden" value="{{ $article->id }}">
                    <div class="form-group">
                        <label for="comment">
                            本文
                        </label>
                        <textarea id="comment" name="comment" class="form-control {{ $errors->has('comment') ? 'is-invalid' : '' }}" rows="4">{{ old('comment') }}</textarea>
                        @if($errors->has('comment'))
                            <div class="invalid-feedback">
                                {{ $errors->first('comment') }}
                            </div>
                        @endif
                    </div>
                    <div class="mt-4">
                        <button type="submit" class="btn btn-primary">
                            コメントする
                        </button>
                    </div>
                </form>

                @forelse($article->comments as $comment)
                    <div class="border-top p-4">
                        <time class="text-secondary">
                            {{ $comment->created_at->format('Y.m.d H:i') }}
                        </time>
                        <p class="mt-2">
                            {!! nl2br(e($comment->body)) !!}
                        </p>
                        <span class="h6 mb-4">投稿者:{{ $comment_user_name[$loop->index] }}さん</span>
                        @if(Auth::user()->id === $comment->user_id)
                            <a class="btn btn-primary" href="{{ route('comment.edit', ['comment' => $comment]) }}">
                                編集する
                            </a>
                            <form style="display: inline-block;" method="POST" action="{{ route('comment.destroy', ['comment' => $comment]) }}">
                                @csrf
                                @method('DELETE')
                                <button class="btn btn-danger">削除する</button>
                            </form>
                        @endif

                    </div>
                @empty
                    <p>コメントはまだありません。</p>
                @endforelse
            </section>
        </div>
    </div>
@endsection
