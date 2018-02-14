@extends('backend.layouts.app')

@section('content')
<div class="content">
        <div class="clearfix"></div>
<div class="panel-body1">
        <h3 class="pull-left blank1">Video Categories</h3>
        <h1 class="pull-right">
           <a class="btn btn-primary pull-right" style="margin-top: -10px;margin-bottom: 5px" href="{!! route('admin.videoCategories.create') !!}"><i class="fa fa-plus-square"></i> Add New Video Category</a>
        </h1>

    <div class="content">
        <div class="clearfix"></div>

        @include('flash::message')

        <div class="clearfix"></div>
        <div class="box box-primary">
            <div class="box-body">
                    @include('video_categories.table')
            </div>
        </div>
    </div>
    </div>
    </div>
@endsection

