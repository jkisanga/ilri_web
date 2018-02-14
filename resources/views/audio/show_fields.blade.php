<!-- Id Field -->
<div class="form-group">
    {!! Form::label('id', 'Id:') !!}
    <p>{!! $audio->id !!}</p>
</div>

<!-- Title Field -->
<div class="form-group">
    {!! Form::label('title', 'Title:') !!}
    <p>{!! $audio->title !!}</p>
</div>

<!-- Desc Field -->
<div class="form-group">
    {!! Form::label('desc', 'Desc:') !!}
    <p>{!! $audio->desc !!}</p>
</div>

<!-- File Path Field -->
<div class="form-group">
    {!! Form::label('file_path', 'File Path:') !!}
    <p>{!! $audio->file_path !!}</p>
</div>

<!-- Created At Field -->
<div class="form-group">
    {!! Form::label('created_at', 'Created At:') !!}
    <p>{!! $audio->created_at !!}</p>
</div>

<!-- Updated At Field -->
<div class="form-group">
    {!! Form::label('updated_at', 'Updated At:') !!}
    <p>{!! $audio->updated_at !!}</p>
</div>

