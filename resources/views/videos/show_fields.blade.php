<!-- Id Field -->
<div class="form-group">
    {!! Form::label('id', 'Id:') !!}
    <p>{!! $video->id !!}</p>
</div>

<!-- Video Category Id Field -->
<div class="form-group">
    {!! Form::label('video_category_id', 'Video Category Id:') !!}
    <p>{!! $video->video_category_id !!}</p>
</div>

<!-- Title Field -->
<div class="form-group">
    {!! Form::label('title', 'Title:') !!}
    <p>{!! $video->title !!}</p>
</div>

<!-- Thumbnail Field -->
<div class="form-group">
    {!! Form::label('thumbnail', 'Thumbnail:') !!}
    <p>{!! $video->thumbnail !!}</p>
</div>

<!-- Created At Field -->
<div class="form-group">
    {!! Form::label('created_at', 'Created At:') !!}
    <p>{!! $video->created_at !!}</p>
</div>

<!-- Updated At Field -->
<div class="form-group">
    {!! Form::label('updated_at', 'Updated At:') !!}
    <p>{!! $video->updated_at !!}</p>
</div>

