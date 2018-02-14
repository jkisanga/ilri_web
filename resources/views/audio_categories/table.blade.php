<table class="table table-responsive table-bordered" >
    <thead>
        <th>Title</th>
        <th>Desc</th>
        <th class="col-lg-1">Thumbnail</th>
        <th class="col-lg-2">Action</th>
    </thead>
    <tbody>
    @foreach($audioCategories as $audioCategory)
        <tr>
            <td>{!! $audioCategory->title !!}</td>
            <td>{!! $audioCategory->desc !!}</td>
            <td><img class="img-rounded" src="{{asset('/uploads/'.$audioCategory->thumbnail)}}" style="width:64px;height:64px;"></td>
            <td>
{!! Form::open(['route' => ['admin.audioCategories.destroy', $audioCategory->id], 'method' => 'delete']) !!}
                    <a title="edit category" href="{!! route('admin.audioCategories.edit', [$audioCategory->id]) !!}" class='btn btn-default btn-xs'><i class="glyphicon glyphicon-pencil"></i></a>
                    <a title="add audio in category" href="{!! route('admin.audioCategories.audio', [$audioCategory->id]) !!}" class='btn btn-default btn-xs'><i class="glyphicon glyphicon-plus-sign"></i></a>
                    {!! Form::button('<i class="glyphicon glyphicon-trash"></i>', ['type' => 'submit', 'class' => 'btn btn-danger btn-xs', 'onclick' => "return confirm('Are you sure?')"]) !!}
                    {{--<a href="{!! route('admin.audioCategories.destroy', [$audioCategory->id]) !!}" class='btn btn-danger btn-xs'><i class="glyphicon glyphicon-remove"></i></a>--}}
{!! Form::close() !!}
            </td>
        </tr>
    @endforeach
    </tbody>
</table>