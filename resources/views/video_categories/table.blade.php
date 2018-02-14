<table class="table table-responsive table-bordered" id="videoCategories-table">
    <thead>
        <th>Title</th>
        <th>Desc</th>
        <th>Thumbnail</th>
        <th colspan="3">Action</th>
    </thead>
    <tbody>
    @foreach($videoCategories as $videoCategory)
        <tr>
            <td>{!! $videoCategory->title !!}</td>
            <td>{!! $videoCategory->desc !!}</td>
            <td><img class="img-rounded" src="{{asset('/uploads/'.$videoCategory->thumbnail)}}" style="width:64px;height:64px;"></td>
            <td>
                {!! Form::open(['route' => ['admin.videoCategories.destroy', $videoCategory->id], 'method' => 'delete']) !!}

                    <a href="{!! route('admin.videoCategories.edit', [$videoCategory->id]) !!}" class='btn btn-default btn-xs'><i class="glyphicon glyphicon-pencil"></i></a>
                    <a href="{!! route('admin.videoCategories.video', [$videoCategory->id]) !!}" class='btn btn-default btn-xs'><i class="glyphicon glyphicon-plus-sign"></i></a>
                    {!! Form::button('<i class="glyphicon glyphicon-trash"></i>', ['type' => 'submit', 'class' => 'btn btn-danger btn-xs', 'onclick' => "return confirm('Are you sure?')"]) !!}

                {!! Form::close() !!}
            </td>
        </tr>
    @endforeach
    </tbody>
</table>