@extends('backend.layouts.app')

@section('content')
    <div class="content">
        <div class="clearfix"></div>

        @include('flash::message')

     <div class="panel-body1">
     <h3 class="blank1">Statistics Categories
     <b class="pull-right">
                <a class="btn btn-primary btn-sm pull-right" style="margin-top: -10px;margin-bottom: 5px" href="{!! route('admin.dataCategories.create') !!}"><i class="fa fa-plus-square"></i> Add New Data Category</a>
     </b></h3>

                    @include('data_categories.table')
            </div>
        </div>
    </div>
@endsection

