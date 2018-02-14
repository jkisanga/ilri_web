@extends('backend.layouts.app')

@section('content')
    <section class="content-header">
        <h1>
            Device User
        </h1>
   </section>
   <div class="content">
       @include('adminlte-templates::common.errors')
       <div class="box box-primary">
           <div class="box-body">
               <div class="row">
                   {!! Form::model($deviceUser, ['route' => ['admin.deviceUsers.update', $deviceUser->id], 'method' => 'patch']) !!}

                        @include('device_users.fields')

                   {!! Form::close() !!}
               </div>
           </div>
       </div>
   </div>
@endsection