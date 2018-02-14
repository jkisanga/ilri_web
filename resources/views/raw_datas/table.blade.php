                                    <table class="table table-bordered table-striped table-condensed">
    <thead>
        <th>Title</th>
        <th>Summary</th>
        <th class="col-lg-2">Action</th>
    </thead>
    <tbody>
    @foreach($rawDatas as $rawData)
        <tr>
            <td>{!! $rawData->title !!}</td>
            <td>{!! $rawData->summary !!}</td>
            <td>
                {!! Form::open(['route' => ['admin.rawDatas.destroy', $rawData->id], 'method' => 'delete']) !!}
                <div class='btn-group'>
                    <a href="{!! route('admin.rawDatas.edit', [$rawData->id]) !!}" class='btn btn-default btn-xs'><i class="glyphicon glyphicon-edit"></i></a>
                    {!! Form::button('<i class="glyphicon glyphicon-trash"></i>', ['type' => 'submit', 'class' => 'btn btn-danger btn-xs', 'onclick' => "return confirm('Are you sure?')"]) !!}
                </div>
                {!! Form::close() !!}
            </td>
        </tr>
    @endforeach
    </tbody>
</table>