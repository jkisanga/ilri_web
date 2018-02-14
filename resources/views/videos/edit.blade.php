@extends('backend.layouts.app')

@section('content')
   <div class="content">
       @include('adminlte-templates::common.errors')
       <div class="box box-primary">
           <div class="box-body">
               <div class="row">
                   {!! Form::model($video, ['route' => ['admin.videos.update', $video->id], 'method' => 'patch','enctype' =>'multipart/form-data']) !!}

<div class="col-md-12 inbox_right">
<div class="Compose-Message">
   <div class="panel panel-default">
       <div class="panel-heading">
           {{$video->title}}
       </div>
       <div class="panel-body panel-body-com-m">

           <div class="com-mail">

                   <div class="card-block">
                       <div  class="form-horizontal ">
                               <input type="hidden" name="audio_category_id" value="{{$video->video_category_id}}">

                           <div class="form-group row">
                               <label class="col-md-3 form-control-label"> Title</label>
                               <div class="col-md-9">
                                   <input type="text"  value="{{$video->title}}" name="title1" class="form-control1"  required="true">
                               </div>
                           </div>
                           <div class="form-group row">
                               <label class="col-md-3 form-control-label" >Desc</label>
                               <div class="col-md-9">
                               <textarea  name="desc"  class="form-control1"  required="true">{{$video->desc}}</textarea>
                               </div>
                           </div>


                             <div class="form-group row">

                                <label class="col-md-3 form-control-label" >Select File (.mp4)</label>
                                <div class="col-md-6">
                                    <input type="file"   name="file_path" class="form-control1"  accept=".mp4">
                                    <span class="help-block" style="color: red;">if you upload file will replace the exist one. leave black if you don't want to change file</span>
                                </div>
                            </div>
                             <div class="form-group row">

                                <label class="col-md-3 form-control-label" >Thumbnail</label>
                                <div class="col-md-6">
                                    <input type="file"   name="thumbnail" class="form-control1"  accept="image/jpeg">
                                    <span class="help-block" style="color: red;">if you upload file will replace the exist one. leave black if you don't want to change file</span>
                                </div>
                            </div>



                   </div>
           <div class="col-lg-9 pull-right">
                       <button type="submit" class="btn btn-sm btn-primary pull-right"><i class="fa fa-dot-circle-o"></i> Update</button>
                       <a href="{{ route('admin.categories.index') }}" class="btn btn-sm btn-danger "><i class="fa fa-ban"></i> Cancel

             </a>  </div><br>

                   {!! Form::close() !!}
               </div>
           </div>
       </div>
   </div>
@endsection