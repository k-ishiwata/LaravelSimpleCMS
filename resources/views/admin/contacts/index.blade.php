@extends('layouts.admin')

@section('content')


<div class="container">
    <div class="row">
        <div class="col-md-12">
            <div class="panel panel-default">
                <div class="panel-heading">お問い合わせ一覧</div>
                <div class="panel-body">
                    @if (Session::has('flash_message'))
                        <div class="alert alert-success">{{ Session::get('flash_message') }}</div>
                    @endif

                    <table class="table table-striped table-bordered table-hover">
                        <thead>
                        <tr>
                            <th>ID</th>
                            <th>受信日</th>
                            <th>名前</th>
                            <th>メールアドレス</th>
                            <th>詳細</th>
                        </tr>
                        </thead>
                        @foreach($contacts as $contact)
                            <tr>
                                <td>{{ $contact->id }}</td>
                                <td>{{ $contact->created_at->format('Y年m月d日') }}</td>
                                <td>
                                    {!! link_to_action('Admin\ContactsController@show', $contact->name, $contact->id) !!}
                                </td>
                                <td>{!! link_to("mailto:$contact->email", $contact->email) !!}</td>
                                <td>
                                    {!! link_to_action('Admin\ContactsController@show', '表示', $contact->id) !!}
                                    {!! Form::model($contact,
                                    ['url' => [
                                        'admin/contacts', $contact->id],
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

                    {!! $contacts->render() !!}
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
