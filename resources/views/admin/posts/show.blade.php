@extends('layouts.admin')
@section('content')


<div class="container">
    <div class="row">
        <div class="col-md-12">
            <div class="panel panel-default">
                <div class="panel-heading">記事詳細</div>
                <div class="panel-body">
                    <div>
                        <h1>{{$post->title}}</h1>
                        <p>{{$post->body}}</p>

                        @if($post->category)
                        <p>カテゴリー：{{ $post->category->title }}</p>
                        @endif

                        @if($post->tags)
                        <p>タグ：</p>
                        <ul>
                        @foreach($post->tags as $tag)
                            <li>{{ $tag->title }}</li>
                        @endforeach
                        </ul>
                        @endif
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
