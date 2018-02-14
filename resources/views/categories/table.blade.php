
   <div class="table-responsive">
<table class="table table-bordered">
    <thead>
        <th>Name</th>
        <th>Desc</th>
        <th class="col-lg-1">Thumbnail</th>
        <th class="col-lg-2">Action</th>
    </thead>
    <tbody>
    @foreach($categories as $category)
        <tr>
            <td>{!! $category->name !!}</td>
            <td>{!! $category->desc !!}</td>
           <td><img class="img-rounded" src="{{asset('/uploads/'.$category->thumbnail)}}" style="width:64px;height:64px;"></td>
            <td>




                {!! Form::open(['route' => ['admin.categories.destroy', $category->id], 'method' => 'delete']) !!}

                 <div class="col-md-4 social_icons-left twi">  <a  href="{!! route('admin.categories.edit', [$category->id]) !!}" ><i class="fa fa-pencil"></i></a></div>
                 <div class="col-md-4 social_icons-left twi">  <a  href="{!! route('admin.categories.doc', [$category->id]) !!}" ><i class="fa fa-plus-square"> </i></a></div>
                  <div class="col-md-4 social_icons-left ">  {!! Form::button('<i class="glyphicon glyphicon-remove"></i>', ['type' => 'submit', 'class' => '', 'onclick' => "return confirm('Are you sure?')"]) !!}</div>

                {!! Form::close() !!}
            </td>
        </tr>
    @endforeach
    </tbody>
</table>
</div>