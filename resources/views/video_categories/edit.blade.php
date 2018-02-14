@extends('backend.layouts.app')

@section('content')

   <div class="content">
       @include('adminlte-templates::common.errors')
       <div class="box box-primary">
           <div class="box-body">
               <div class="row">
                   {!! Form::model($videoCategory, ['route' => ['admin.videoCategories.update', $videoCategory->id], 'method' => 'patch','enctype' =>'multipart/form-data']) !!}
<div class="col-md-2 "></div>
						<div class="col-md-8 inbox_right">
            <div class="Compose-Message">
                <div class="panel panel-default">
                    <div class="panel-heading">
                        Edit Video Category
                    </div>
                    <div class="panel-body panel-body-com-m">

                        <div class="com-mail">
                        <label>Category Name : </label>
                           <input type="text" class="form-control1 control3" value="{{$videoCategory->title}}" name="title" required="true">

                           <label>Category Description : </label>
                           <textarea rows="3" class="form-control1 " name="desc" required="true">{{$videoCategory->desc}}</textarea>

                           <label>Category Thumbnail : </label>
                            <input type="file"  class="form-control1 " name="thumbnail"  accept="image/jpeg" />
                            <span><small style="color: red">if you upload new thumbnail it will replace the existing</small></span>
<hr>
                        <button type="submit" class="btn btn-sm btn-primary pull-right"><i class="fa fa-save"></i> Update</button>
                         <a href="{{ route('admin.categories.index') }}" class="btn btn-sm btn-danger "><i class="fa fa-ban"></i> Cancel</a>
                    </div>
                </div>
             </div>
          </div>
    </div>

                   {!! Form::close() !!}
               </div>
           </div>
       </div>
   </div>
@endsection