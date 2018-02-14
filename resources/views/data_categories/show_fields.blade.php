<!-- Id Field -->
<div class="form-group">
    {!! Form::label('id', 'Id:') !!}
    <p>{!! $dataCategory->id !!}</p>
</div>

<!-- Name Field -->
<div class="form-group">
    {!! Form::label('name', 'Name:') !!}
    <p>{!! $dataCategory->name !!}</p>
</div>

<!-- Desc Field -->
<div class="form-group">
    {!! Form::label('desc', 'Desc:') !!}
    <p>{!! $dataCategory->desc !!}</p>
</div>

<!-- Created At Field -->
<div class="form-group">
    {!! Form::label('created_at', 'Created At:') !!}
    <p>{!! $dataCategory->created_at !!}</p>
</div>

<!-- Updated At Field -->
<div class="form-group">
    {!! Form::label('updated_at', 'Updated At:') !!}
    <p>{!! $dataCategory->updated_at !!}</p>
</div>

