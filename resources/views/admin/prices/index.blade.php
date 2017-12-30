@extends('layouts.admin')

@section('content')


<div class="container">
    <div class="row">
        <div class="col-md-12">
            <div class="panel panel-default">
                <div class="panel-heading">価格表</div>
                <div class="panel-body">
                    @if (Session::has('flash_message'))
                        <div class="alert alert-success">{{ Session::get('flash_message') }}</div>
                    @endif

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

                    <div class="mb10">
                        {!! Form::model($prices, [
                            'url' => route('admin::prices.upload'),
                            'method' => 'POST',
                            'files' => true
                        ]) !!}
                        <div class="row">
                            <div class="col-md-4">
                                {!! Form::file('csv_file', null, ['class' => 'form-control']) !!}
                            </div>
                            <div class="col-md-8">
                                {!! Form::submit('アップロード', ['class' => 'btn btn-primary']) !!}
                                {{ link_to_route('admin::prices.download', 'ダウンロード', null, ['class' => 'btn btn-default']) }}
                            </div>
                        </div>
                        {!! Form::close() !!}
                    </div>

                    <table class="table table-striped table-bordered table-hover">
                        <thead>
                        <tr>
                            <th width="10%">ID</th>
                            <th width="15%">商品コード</th>
                            <th width="30%">商品名</th>
                            <th>価格</th>
                        </tr>
                        </thead>
                        @foreach($prices as $price)
                            <tr>
                                <td>{{ $price->id }}</td>
                                <td>{{ $price->code }}</td>
                                <td>{{ $price->name }}</td>
                                <td>{{ number_format($price->price) }}</td>
                            </tr>
                        @endforeach
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
