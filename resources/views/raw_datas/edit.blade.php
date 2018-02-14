@extends('backend.layouts.app')

@section('content')
   <div class="content">
       @include('adminlte-templates::common.errors')
       <div class="box box-primary">
           <div class="box-body">
               <div class="row">
                   {!! Form::model($rawData, ['route' => ['admin.rawDatas.update', $rawData->id], 'method' => 'patch','enctype' =>'multipart/form-data']) !!}

                        <div class="col-md-12 inbox_right">
            <div class="Compose-Message">
                <div class="panel panel-default">
                    <div class="panel-heading">
                        Edit {{$rawData->title}}
                    </div>
                    <div class="panel-body panel-body-com-m">
                        <div class="com-mail">
                                <div class="card-block">
                                    <div  class="form-horizontal ">
                                    <input name="data_category_id" type="hidden"  value="{{$rawData->data_category_id}}">
                                        <div class="form-group row">
                                            <label class="col-md-3 form-control-label"> Title</label>
                                            <div class="col-md-9">
                                                <input type="text" value="{{$rawData->title}}"  name="title" class="form-control1"  required="true">
                                            </div>
                                        </div>
                                        <div class="form-group row">
                                            <label class="col-md-3 form-control-label" >Summary</label>
                                            <div class="col-md-9">
                                            <textarea  name="summary"  class="form-control1"  required="true">{{$rawData->summary}}</textarea>
                                            </div>
                                        </div>


                                          <div class="form-group row">

                                             <label class="col-md-3 form-control-label" >Select File (PDF)</label>
                                             <div class="col-md-6">
                                                 <input type="file"  name="file_path" class="form-control1"  accept="application/pdf">
                                                 {{--<input type="file"  name="file_path" class="form-control1"  accept="application/vnd.openxmlformats-officedocument.spreadsheetml.sheet">--}}
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
                                    <button type="submit" class="btn btn-sm btn-primary pull-right"><i class="fa fa-dot-circle-o"></i> Upload</button>
                                    <button type="reset" class="btn btn-sm btn-danger "><i class="fa fa-ban"></i> Reset</button>
                                </div>

                            </div>
                        <br><hr>

                   {!! Form::close() !!}
               </div>
           </div>
       </div>
   </div>
   </div>

@endsection