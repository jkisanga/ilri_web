			<div class="col-md-12 inbox_right">
            <div class="Compose-Message">
                <div class="panel panel-default">
                    <div class="panel-heading">
                        Manage Documents in {{$category->name}} Category
                    </div>
                    <div class="panel-body panel-body-com-m">

                        <div class="com-mail">

                                <div class="card-block">
                                    <div  class="row">
                                            <input type="hidden" name="category_id" value="{{$category->id}}">
                                            <div class="col-lg-6">
                                             <label >Select File (PDF)</label>
                                                 <input type="file"  name="file_path" class="form-control1" required="true">
                                         </div>

                                        <div class="col-lg-6">
                                            <label >Doc Title</label>
                                                <input type="text"  name="title" class="form-control1"  required="true">
                                        </div>
                                        <div class="col-lg-6">
                                            <label >Summary</label>

                                            <textarea  name="summary"  class="form-control" placeholder="Doc Summary.." required="true"></textarea>
                                        </div>
                                        <div class="col-lg-6">
                                        <label>Thumbnail : </label>
                                         <input type="file"  class="form-control1 " name="thumbnail"   />
                                            </div>
                                </div>
                                <div class="row">
                        <div class="col-lg-6 pull-right">
                                    <button type="submit" class="btn btn-sm btn-primary pull-right"><i class="fa fa-dot-circle-o"></i> Upload</button>
                                    <a href="{{ route('admin.categories.index') }}" class="btn btn-sm btn-danger "><i class="fa fa-ban"></i> Reset</a>
                            </div>
                            </div><hr>

                            <table class="table table-bordered table-striped table-condensed">
                            <thead>
                                <tr>
                              <th>Title</th>
                              <th>Summary</th>
                              <th class="col-lg-1">Thumbnail</th>
                              <th class="col-lg-2" >Action</th>
                                </tr>
                            </thead>
                            <tbody> @foreach($documents as $document)
                                <tr>
                        <td>{!! $document->title !!}</td>
                         <td>{!! $document->summary !!}</td>
                         <td><img class="img-rounded" src="{{asset('/uploads/'.$document->thumbnail)}}" style="width:64px;height:64px;"></td>

  <td>
  <a title="Edit document" href="{!! route('admin.documents.edit', [$document->id]) !!}" class="btn btn-default btn-xs"><i class="fa fa-pencil"></i></a>
  <a title="download file" href="{!! route('admin.documents.downloadFile', [$document->id]) !!}" class="btn btn-default btn-xs"><i class="fa fa-file"></i></a>
  <a title="delete document" href="{!! route('admin.documents.delete', [$document->id]) !!}" class="btn btn-danger btn-xs" onclick="return confirm('Are you sure?')"><i class="glyphicon glyphicon-remove"></i></a>
  </td>
            </tr>@endforeach
            </tbody>
            </table>
</div>

</div>
</div>
</div>
</div>
</div>



