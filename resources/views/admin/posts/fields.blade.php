<div class="form-group">
    {!! Form::label('title', 'タイトル:', ['class' => 'col-sm-2 control-label']) !!}
    <div class="col-sm-10">
        {!! Form::text('title', null, ['class' => 'form-control']) !!}
    </div>
</div>

<div class="form-group">
    {!! Form::label('body', '内容:', ['class' => 'col-sm-2 control-label']) !!}
    <div class="col-sm-10">
        {!! Form::textarea('body', null, ['class' => 'form-control']) !!}
    </div>
</div>

<div class="form-group">
    {!! Form::label('categories', 'カテゴリー:', ['class' => 'col-sm-2 control-label']) !!}
    <div class="col-sm-10">
        {{-- Form::select('category_id',
            $categories,
            isset($post->category->id) ? $post->category->id : null )
        --}}


        <div>
            @foreach ($categories as $key => $category)
                <label class="radio-inline">
                    {!! Form::radio('category_id', $key) !!}
                    {{ $category }}
                </label>
            @endforeach
        </div>
    </div>
</div>


<div class="form-group">
    {!! Form::label('tags', 'タグ:', ['class' => 'col-sm-2 control-label']) !!}
    <div class="col-sm-10">
        <div>
            @foreach ($tags as $key => $tag)
                @php
                $isCheck = false;
                if (isset($post->tags) && $post->tags->contains($key)) {
                    $isCheck = true;
                }
                @endphp
                <label class="checkbox-inline">
                    {!! Form::checkbox( 'tag_id[]', $key, $isCheck) !!}
                    {{ $tag }}
                </label>
            @endforeach
        </div>
    </div>
</div>

<div class="form-group">
    <div class="col-sm-10 col-sm-offset-2">
        {!! Form::submit('保存', ['class' => 'btn btn-primary']) !!}
        {!! link_to('admin/posts', '一覧へ戻る', ['class' => 'btn btn-default']) !!}
    </div>
</div>