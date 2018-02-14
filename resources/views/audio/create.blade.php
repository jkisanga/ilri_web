@extends('backend.layouts.app')

@section('content')
    <div class="content">
        @include('adminlte-templates::common.errors')

                    {!! Form::open(['route' => 'admin.audio.store', 'enctype' =>'multipart/form-data']) !!}

                        @include('audio.fields')

                    {!! Form::close() !!}
                </div>

@endsection
