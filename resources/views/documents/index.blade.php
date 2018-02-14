@extends('backend.layouts.app')

@section('content')
    <section class="content-header">

        <h1 class="pull-right">
           <a class="btn btn-primary btn-sm pull-right" style="margin-top: -10px;margin-bottom: 5px" href="{!! route('admin.documents.create') !!}"><i class="fa fa-plus-square"></i> Add New Doc</a>
        </h1>
    </section>
    <div class="content">
        <div class="clearfix"></div>

        @include('flash::message')

        <div class="clearfix"></div>
        <div class="box box-primary">
            <div class="box-body">
                    @include('documents.table')
            </div>
        </div>
    </div>
@endsection

