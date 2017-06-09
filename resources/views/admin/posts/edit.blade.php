@extends('layouts.admin')

@section('content')


<div class="container">
    <div class="row">
        <div class="col-md-12">
            <div class="panel panel-default">
                <div class="panel-heading">編集</div>
                <div class="panel-body">

                    {{-- エラーの表示 --}}
                    @if ($errors->any())
                        <div class="alert alert-danger">
                            <ul>
                                @foreach ($errors->all() as $error)
                                    <li>{{ $error }}</li>
                                @endforeach
                            </ul>
                        </div>
                    @endif

                    {!! Form::model($post,
                    ['url' => [
                        'admin/posts', $post->id],
                        'method' => 'PATCH',
                        'files' => true,
                        'class' => 'form-horizontal',
                        'id' => 'post-input'

                    ]) !!}
                    @include('admin.posts.fields')

                    {!! Form::close() !!}
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
