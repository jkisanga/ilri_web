<!-- Id Field -->
<div class="form-group">
    {!! Form::label('id', 'Id:') !!}
    <p>{!! $document->id !!}</p>
</div>

<!-- Title Field -->
<div class="form-group">
    {!! Form::label('title', 'Title:') !!}
    <p>{!! $document->title !!}</p>
</div>

<!-- Summury Field -->
<div class="form-group">
    {!! Form::label('summury', 'Summury:') !!}
    <p>{!! $document->summury !!}</p>
</div>

<!-- File Path Field -->
<div class="form-group">
    {!! Form::label('file_path', 'File Path:') !!}
    <p>{!! $document->file_path !!}</p>
</div>

<!-- File Nam Field -->
<div class="form-group">
    {!! Form::label('file_nam', 'File Nam:') !!}
    <p>{!! $document->file_nam !!}</p>
</div>

<!-- Created At Field -->
<div class="form-group">
    {!! Form::label('created_at', 'Created At:') !!}
    <p>{!! $document->created_at !!}</p>
</div>

<!-- Updated At Field -->
<div class="form-group">
    {!! Form::label('updated_at', 'Updated At:') !!}
    <p>{!! $document->updated_at !!}</p>
</div>

