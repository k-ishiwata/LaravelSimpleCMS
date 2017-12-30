@extends('layouts.app')

@section('content')


<div class="container">
    <div class="row">
        <div class="col-md-12">
            <div class="panel panel-default">
                <div class="panel-heading">価格表</div>
                <div class="panel-body">
                    <table class="table table-striped table-bordered table-hover">
                        <thead>
                        <tr>
                            <th width="15%">商品コード</th>
                            <th width="30%">商品名</th>
                            <th>価格</th>
                        </tr>
                        </thead>
                        @foreach($prices as $price)
                            <tr>
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
