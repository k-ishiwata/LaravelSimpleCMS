@extends('layouts.admin')

@section('content')


<div class="container">
    <div class="row">
        <div class="col-md-12">
            <div class="panel panel-default">
                <div class="panel-heading">記事一覧</div>
                <div class="panel-body">
                    @if (Session::has('flash_message'))
                        <div class="alert alert-success">{{ Session::get('flash_message') }}</div>
                    @endif

                    <div class="mb10">
                        {!! link_to('admin/posts/create', '新規作成', ['class' => 'btn btn-primary']) !!}
                    </div>

                    <table class="table table-striped table-bordered table-hover">
                        <thead>
                        <tr>
                            <th>ID</th>
                            <th>タイトル</th>
                            <th>カテゴリー</th>
                            <th>タグ</th>
                            <th>作成日</th>
                            <th>編集</th>
                        </tr>
                        </thead>
                        @foreach($posts as $post)
                            <tr>
                                <td>{{ $post->id }}</td>
                                <td>{{ $post->title }}</td>
                                <td>
                                    @isset($post->category)
                                        {!! link_to_action('Admin\CategoriesController@show', $post->category->title, [$post->category->id]) !!}
                                    @endisset
                                </td>
                                <td>
                                    @isset($post->tags)
                                        @foreach($post->tags as $tag)
                                        {!! link_to_action('Admin\TagsController@show', $tag->title, [$tag->id]) !!}
                                        @endforeach
                                    @endisset
                                </td>
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
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
