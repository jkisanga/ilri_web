@extends('backend.layouts.app')

@section('content')
    <section class="content-header">

        <h1 class="pull-right">
           <a class="btn btn-sm btn-primary pull-right" style="margin-top: -10px;margin-bottom: 5px" href="{!! route('admin.deviceUsers.create') !!}"><i class="fa fa-plus-square" ></i> Register New Device</a>
        </h1>
    </section>
    <div class="content">
        <div class="clearfix"></div>

        @include('flash::message')

        <div class="clearfix"></div>
        <div class="box box-primary">
            <div class="box-body">
                    @include('device_users.table')
            </div>
        </div>
    </div>
@endsection

