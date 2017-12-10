@extends('layouts.admin')
@section('content')


<div class="container">
    <div class="row">
        <div class="col-md-12">
            <div class="panel panel-default">
                <div class="panel-heading">記事詳細</div>
                <div class="panel-body">
                    <table class="table">
                        <tr>
                            <th width="20%">お問い合わせ種類</th>
                            <td>{{ $contact->type }}</td>
                        </tr>
                        <tr>
                            <th>お名前</th>
                            <td>{{ $contact->name }}</td>
                        </tr>
                        <tr>
                            <th>メールアドレス</th>
                            <td>{{ $contact->email }}</td>
                        </tr>
                        <tr>
                            <th>性別</th>
                            <td>{{ $contact->gender }}</td>
                        </tr>
                        <tr>
                            <th>内容</th>
                            <td>{{ $contact->body }}</td>
                        </tr>
                    </table>

                    {!! link_to_action('Admin\ContactsController@index', '戻る', null, ['class' => 'btn btn-default']) !!}
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
