@extends('backend.layouts.app')

@section('content')


    <div class="content">
        <div class="clearfix"></div>

        @include('flash::message')

<div class="panel-body1"><h3 class="blank1">Document Categories. <b class="pull-right"><a class="btn btn-primary pull-right btn-sm" style="margin-top: -10px;margin-bottom: 5px" href="{!! route('admin.categories.create') !!}"><i class="fa fa-plus-square"></i> Add New Category</a></b></h3>
                    @include('categories.table')

    </div>
    </div>
@endsection

