<table class="table table-responsive" id="audio-table">
    <thead>
        <th>Title</th>
        <th>Desc</th>
        <th>File Path</th>
        <th colspan="3">Action</th>
    </thead>
    <tbody>
    @foreach($audio as $audio)
        <tr>
            <td>{!! $audio->title !!}</td>
            <td>{!! $audio->desc !!}</td>
            <td>{!! $audio->file_path !!}</td>
            <td>
                {!! Form::open(['route' => ['admin.audio.destroy', $audio->id], 'method' => 'delete']) !!}
                <div class='btn-group'>
                    <a href="{!! route('admin.audio.show', [$audio->id]) !!}" class='btn btn-default btn-xs'><i class="glyphicon glyphicon-eye-open"></i></a>
                    <a href="{!! route('admin.audio.edit', [$audio->id]) !!}" class='btn btn-default btn-xs'><i class="glyphicon glyphicon-edit"></i></a>
                    {!! Form::button('<i class="glyphicon glyphicon-trash"></i>', ['type' => 'submit', 'class' => 'btn btn-danger btn-xs', 'onclick' => "return confirm('Are you sure?')"]) !!}
                </div>
                {!! Form::close() !!}
            </td>
        </tr>
    @endforeach
    </tbody>
</table>