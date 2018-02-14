<!-- Title Field -->
<div class="form-group col-sm-6">
    {!! Form::label('title', 'Title:') !!}
    {!! Form::text('title', null, ['class' => 'form-control']) !!}
</div>

<!-- Summary Field -->
<div class="form-group col-sm-6">
    {!! Form::label('summary', 'Summary:') !!}
    {!! Form::text('summary', null, ['class' => 'form-control']) !!}
</div>

<!-- Image Path Field -->
<div class="form-group col-sm-6">
    {!! Form::label('image_path', 'Image Path:') !!}
    {!! Form::file('image_path', null, ['class' => 'form-control']) !!}
</div>

<!-- Story Field -->
<div class="form-group col-sm-6">
    {!! Form::label('story', 'Story:') !!}
    {!! Form::text('story', null, ['class' => 'form-control']) !!}
</div>

<!-- Published Date Field -->
<div class="form-group col-sm-6">
    {!! Form::label('published_date', 'Published Date:') !!}
    {!! Form::text('published_date', null, ['class' => 'form-control']) !!}
</div>

<!-- Published Field -->
<div class="form-group col-sm-6">
    {!! Form::label('published', 'Published:') !!}
    {!! Form::text('published', null, ['class' => 'form-control']) !!}
</div>

<!-- Published By Field -->
<div class="form-group col-sm-6">
    {!! Form::label('published_by', 'Published By:') !!}
    {!! Form::text('published_by', null, ['class' => 'form-control']) !!}
</div>

<!-- Submit Field -->
<div class="form-group col-sm-12">
    {!! Form::submit('Save', ['class' => 'btn btn-primary']) !!}
    <a href="{!! route('admin.news.index') !!}" class="btn btn-default">Cancel</a>
</div>
