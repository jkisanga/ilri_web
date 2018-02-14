@extends('backend.layouts.app')

@section('content')
    <section class="content-header">

    </section>
    <div class="content">
        @include('adminlte-templates::common.errors')
        <div class="box box-primary">

            <div class="box-body">
                <div class="row">


                        @include('device_users.fields')


                </div>
            </div>
        </div>
    </div>
@endsection
