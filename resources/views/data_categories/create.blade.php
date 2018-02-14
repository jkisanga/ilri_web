@extends('backend.layouts.app')

@section('content')
   <div class="col-md-2 "></div>
   						<div class="col-md-8 inbox_right">
               <div class="Compose-Message">
                   <div class="panel panel-default">
                       <div class="panel-heading">
                           Add New Statistics Category
                       </div>
                       <div class="panel-body panel-body-com-m">

                           <div class="com-mail">
{!! Form::open(['route' => 'admin.dataCategories.store', 'enctype' =>'multipart/form-data']) !!}

                        @include('data_categories.fields')
                        <hr>
                                                <button type="submit" class="btn btn-sm btn-primary pull-right"><i class="fa fa-save"></i> Save</button>
                                                 <a href="{{ route('admin.categories.index') }}" class="btn btn-sm btn-danger "><i class="fa fa-ban"></i> Cancel</a>
                                            </div>
                                        </div>
                                     </div>
                                  </div>
                            </div>
{!! Form::close() !!}


@endsection
