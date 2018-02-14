@extends('backend.layouts.app')

@section('content')
   <div class="col-md-2 "></div>
   						<div class="col-md-8 inbox_right">
               <div class="Compose-Message">
                   <div class="panel panel-default">
                       <div class="panel-heading">
                           Edit {{$dataCategory->name}}
                       </div>
                       <div class="panel-body panel-body-com-m">

                           <div class="com-mail">
                   {!! Form::model($dataCategory, ['route' => ['admin.dataCategories.update', $dataCategory->id], 'method' => 'patch', 'enctype' =>'multipart/form-data']) !!}

                        <label >Category Name</label>

                            <input type="text" value="{{$dataCategory->name}}" name="name" class="form-control"  required="true">


                        <label >Short Description</label>

                        <textarea  name="desc"  class="form-control1"  required="true">{{$dataCategory->desc}}</textarea>

                        <label>Category Thumbnail : </label>
                                                    <input type="file"  class="form-control1 " name="thumbnail"  accept="image/jpeg" />
                                                    <span><small style="color: red">if you upload new thumbnail it will replace the existing</small></span>
<hr>
                        <button type="submit" class="btn btn-sm btn-primary pull-right"><i class="fa fa-save"></i> Upload</button>
                         <a href="{{ route('admin.categories.index') }}" class="btn btn-sm btn-danger "><i class="fa fa-ban"></i> Cancel</a>
                    </div>
                </div>
             </div>
          </div>
    </div>
                   {!! Form::close() !!}

@endsection