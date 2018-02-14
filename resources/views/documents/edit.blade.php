@extends('backend.layouts.app')

@section('content')
   <div class="content">
       @include('adminlte-templates::common.errors')
       <div class="box box-primary">
           <div class="box-body">
               <div class="row">
                   {!! Form::model($document, ['route' => ['admin.documents.update', $document->id], 'method' => 'patch','enctype' =>'multipart/form-data']) !!}

                       <div class="col-md-12 inbox_right">
                                   <div class="Compose-Message">
                                       <div class="panel panel-default">
                                           <div class="panel-heading">
                                               {{$document->title}}
                                           </div>
                                           <div class="panel-body panel-body-com-m">

                                               <div class="com-mail">

                                                       <div class="card-block">
                                                           <div  class="form-horizontal ">
                                                                   <input type="hidden" name="category_id" value="{{$document->category_id}}">

                                                               <div class="form-group row">
                                                                   <label class="col-md-3 form-control-label">Doc Title</label>
                                                                   <div class="col-md-9">
                                                                       <input type="text"  value="{{$document->title}}" name="title" class="form-control1"  required="true">
                                                                   </div>
                                                               </div>
                                                               <div class="form-group row">
                                                                   <label class="col-md-3 form-control-label" >Summary</label>
                                                                   <div class="col-md-9">
                                                                   <textarea  name="summary"  class="form-control1"  required="true">{{$document->summary}}</textarea>
                                                                   </div>
                                                               </div>


                                                                 <div class="form-group row">

                                                                    <label class="col-md-3 form-control-label" >Select File (PDF)</label>
                                                                    <div class="col-md-6">
                                                                        <input type="file"   name="file_path" class="form-control1"  accept="application/pdf">
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