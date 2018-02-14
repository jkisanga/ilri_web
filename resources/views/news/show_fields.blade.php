<!-- Id Field -->
<div class="form-group">
    {!! Form::label('id', 'Id:') !!}
    <p>{!! $news->id !!}</p>
</div>

<!-- Title Field -->
<div class="form-group">
    {!! Form::label('title', 'Title:') !!}
    <p>{!! $news->title !!}</p>
</div>

<!-- Summary Field -->
<div class="form-group">
    {!! Form::label('summary', 'Summary:') !!}
    <p>{!! $news->summary !!}</p>
</div>

<!-- Image Path Field -->
<div class="form-group">
    {!! Form::label('image_path', 'Image Path:') !!}
    <p>{!! $news->image_path !!}</p>
</div>

<!-- Story Field -->
<div class="form-group">
    {!! Form::label('story', 'Story:') !!}
    <p>{!! $news->story !!}</p>
</div>

<!-- Published Date Field -->
<div class="form-group">
    {!! Form::label('published_date', 'Published Date:') !!}
    <p>{!! $news->published_date !!}</p>
</div>

<!-- Published Field -->
<div class="form-group">
    {!! Form::label('published', 'Published:') !!}
    <p>{!! $news->published !!}</p>
</div>

<!-- Published By Field -->
<div class="form-group">
    {!! Form::label('published_by', 'Published By:') !!}
    <p>{!! $news->published_by !!}</p>
</div>

<!-- Created At Field -->
<div class="form-group">
    {!! Form::label('created_at', 'Created At:') !!}
    <p>{!! $news->created_at !!}</p>
</div>

<!-- Updated At Field -->
<div class="form-group">
    {!! Form::label('updated_at', 'Updated At:') !!}
    <p>{!! $news->updated_at !!}</p>
</div>

