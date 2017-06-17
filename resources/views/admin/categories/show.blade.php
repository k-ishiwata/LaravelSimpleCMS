@extends('layouts.admin')
@section('content')


<div class="container">
    <div class="row">
        <div class="col-md-12">
            <div class="panel panel-default">
                <div class="panel-heading">カテゴリー詳細</div>
                <div class="panel-body">
                    <div>
                        <h1>{{$category->title}}</h1>
                        <p>{{$category->slug}}</p>
                    </div>


                    <h4>このカテゴリーの記事一覧</h4>
                    @if(count($posts) > 0)
                        <table class="table table-striped table-bordered table-hover">
                            <thead>
                            <tr>
                                <th>ID</th>
                                <th>タイトル</th>
                                <th>作成日</th>
                                <th>編集</th>
                            </tr>
                            </thead>
                            @foreach($posts as $post)
                                <tr>
                                    <td>{{ $post->id }}</td>
                                    <td>{{ $post->title }}</td>
                                    <td>{{ $post->created_at->format('Y年m月d日') }}</td>
                                    <td>
                                        {!! link_to_action('Admin\PostsController@show', '表示', [$post->id]) !!}
                                        {!! link_to_action('Admin\PostsController@edit', '編集', [$post->id]) !!}
                                        {!! Form::model($post,
                                        ['url' => [
                                            'admin/posts', $post->id],
                                            'method' => 'delete',
                                            'class' => 'delete-from'
                                        ]) !!}
                                        {!! Form::submit('削除', [
                                            'onclick' => "return confirm('本当に削除しますか?')",
                                            'class' => 'text-link'
                                        ]) !!}
                                        {!! Form::close() !!}
                                    </td>
                                </tr>
                            @endforeach
                        </table>

                        {!! $posts->render() !!}
                    @else
                        <p>このカテゴリーの記事はりません。</p>
                    @endif
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
