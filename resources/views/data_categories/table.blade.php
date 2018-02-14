
                                    <table class="table table-bordered table-striped table-condensed">
    <thead>
        <th>Name</th>
        <th>Desc</th>
        <th class="col-lg-1">Thumbnail</th>
        <th class="col-lg-2">Action</th>
    </thead>
    <tbody>
    @foreach($dataCategories as $category)
        <tr>
            <td>{!! $category->name !!}</td>
            <td>{!! $category->desc !!}</td>
            <td><img class="img-rounded" src="{{asset('/uploads/'.$category->thumbnail)}}" style="width:64px;height:64px;"></td>
            <td>
                {!! Form::open(['route' => ['admin.dataCategories.destroy', $category->id], 'method' => 'delete']) !!}

                    <a href="{!! route('admin.dataCategories.edit', [$category->id]) !!}" class='btn btn-default btn-sm'><i class="glyphicon glyphicon-pencil"></i></a>
                    <a href="{!! route('admin.dataCategories.data', [$category->id]) !!}" class="btn btn-sm btn-info"><i class="fa fa-plus-circle"></i></a>
                    {!! Form::button('<i class="glyphicon glyphicon-trash"></i>', ['type' => 'submit', 'class' => 'btn btn-danger btn-sm', 'onclick' => "return confirm('Are you sure you want to delete this category?')"]) !!}

                {!! Form::close() !!}
            </td>
        </tr>
    @endforeach
    </tbody>
</table>
</div>

