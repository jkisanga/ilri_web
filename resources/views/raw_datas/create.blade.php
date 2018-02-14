@extends('backend.layouts.app')

@section('content')
    <section class="content-header">

    </section>
    <div class="content">
        @include('adminlte-templates::common.errors')
        <div class="box box-primary">

            <div class="box-body">
                <div class="row">
                    {!! Form::open(['route' => 'admin.rawDatas.store', 'enctype' =>'multipart/form-data']) !!}

                        @include('raw_datas.fields')
                    {!! Form::close() !!}
                </div>
            </div>
        </div>
    </div>
@endsection
