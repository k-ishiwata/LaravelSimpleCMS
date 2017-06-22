@extends('layouts.admin')

@section('content')


<div class="container">
    <div class="row">
        <div class="col-md-12">
            <div class="panel panel-default">
                <div class="panel-heading">カテゴリー一覧</div>
                <div class="panel-body">
                    @if (Session::has('flash_message'))
                        <div class="alert alert-success">{{ Session::get('flash_message') }}</div>
                    @endif

                    <div class="mb10">
                        {!! link_to('admin/tags/create', '新規作成', ['class' => 'btn btn-primary']) !!}
                    </div>

                    <table class="table table-striped table-bordered table-hover">
                        <thead>
                        <tr>
                            <th>ID</th>
                            <th>タイトル</th>
                            <th>編集</th>
                        </tr>
                        </thead>
                        @foreach($tags as $category)
                            <tr>
                                <td>{{ $category->id }}</td>
                                <td>{{ $category->title }}</td>
                                <td>
                                    {!! link_to_action('Admin\TagsController@show', '表示', [$category->id]) !!}
                                    {!! link_to_action('Admin\TagsController@edit', '編集', [$category->id]) !!}
                                    {!! Form::model($category,
                                    ['url' => [
                                        'admin/tags', $category->id],
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
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
