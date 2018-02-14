@extends('backend.layouts.app')

@section('content')
    <div class="content">
        @include('adminlte-templates::common.errors')

                    {!! Form::open(['route' => 'admin.videoCategories.store', 'enctype' =>'multipart/form-data']) !!}
<div class="col-md-2 ">
</div>
						<div class="col-md-8 inbox_right">
            <div class="Compose-Message">
                <div class="panel panel-default">
                    <div class="panel-heading">
                        Add New Video Category
                    </div>
                    <div class="panel-body panel-body-com-m">

                        <div class="com-mail">
                        @include('video_categories.fields')
                         <hr>
                        <button type="submit" class="btn btn-sm btn-primary pull-right"><i class="fa fa-save"></i> Save</button>
                         <a href="{{ route('admin.audioCategories.index') }}" class="btn btn-sm btn-danger "><i class="fa fa-ban"></i> Cancel</a>
</div>
</div>
</div>
</div>
</div>

                    {!! Form::close() !!}
                    </div>

@endsection
