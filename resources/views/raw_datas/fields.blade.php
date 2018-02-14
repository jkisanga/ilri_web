<div class="col-md-12 inbox_right">
            <div class="Compose-Message">
                <div class="panel panel-default">
                    <div class="panel-heading">
                        Manage Statistics in {{$dataCategory->name}} Category
                    </div>
                    <div class="panel-body panel-body-com-m">

                        <div class="com-mail">
                                <div class="card-block">
                                    <div  class="row ">


                                       <input type="hidden" name="data_category_id" value="{{$dataCategory->id}}" />
                                        <div class="col-lg-6">
                                             <label >Select File (PDF)</label>
             <input type="file"  name="file_path" class="form-control1" required="true" accept="application/pdf">
     </div>

    <div class="col-lg-6">
        <label >Doc Title</label>
            <input type="text"  name="title" class="form-control1"  required="true">
    </div>
    <div class="col-lg-6">
        <label >Summary</label>

        <textarea  name="summary"  class="form-control1" placeholder="Doc Summary.." required="true"></textarea>
    </div>
    <div class="col-lg-6">
    <label>Thumbnail : </label>
     <input type="file"  class="form-control1 " name="thumbnail"  accept="image/jpeg" />
        </div>
        </div><br>
        <div class="row">
      <div class="col-lg-6 pull-right">
                  <button type="submit" class="btn btn-sm btn-primary pull-right"><i class="fa fa-dot-circle-o"></i> Upload</button>
                  <a href="{{ route('admin.dataCategories.index') }}" class="btn btn-sm btn-danger "><i class="fa fa-ban"></i> Reset</a>
          </div>
          </div><hr>

    <table class="table table-bordered table-striped table-condensed">
     <thead>
         <th>Title</th>
         <th>Summary</th>
         <th class="col-lg-1">Thumbnail</th>
         <th class="col-lg-2">Action</th>
     </thead>
     <tbody>
     @foreach($rawDatas as $rawData)
         <tr>
             <td>{!! $rawData->title !!}</td>
             <td>{!! $rawData->summary !!}</td>
             <td><img class="img-rounded" src="{{asset('/uploads/'.$rawData->thumbnail)}}" style="width:64px;height:64px;"></td>
             <td>
                     <a href="{!! route('admin.rawDatas.edit', [$rawData->id]) !!}" class='btn btn-default btn-xs'><i class="glyphicon glyphicon-pencil"></i></a>
                     <a href="{!! route('admin.rawDatas.downloadFile', [$rawData->id]) !!}" class='btn btn-default btn-xs'><i class="glyphicon glyphicon-save-file"></i></a>
                     <a href="{!! route('admin.rawDatas.delete', [$rawData->id]) !!}" class='btn btn-danger btn-xs' onclick="return confirm('Are you sure?')"><i class="glyphicon glyphicon-trash"></i></a>

             </td>
         </tr>
     @endforeach
     </tbody>
 </table>
 </div>

</div>





