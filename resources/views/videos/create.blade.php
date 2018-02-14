@extends('backend.layouts.app')

@section('content')
    <div class="content">
        @include('adminlte-templates::common.errors')

                    {!! Form::open(['route' => 'admin.videos.store', 'enctype' =>'multipart/form-data']) !!}

                        @include('videos.fields')

                    {!! Form::close() !!}
                </div>

@endsection
