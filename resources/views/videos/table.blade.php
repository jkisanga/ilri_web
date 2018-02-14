<table class="table table-responsive" id="videos-table">
    <thead>
        <th>Video Category Id</th>
        <th>Title</th>
        <th>Thumbnail</th>
        <th colspan="3">Action</th>
    </thead>
    <tbody>
    @foreach($videos as $video)
        <tr>
            <td>{!! $video->video_category_id !!}</td>
            <td>{!! $video->title !!}</td>
            <td>{!! $video->thumbnail !!}</td>
            <td>
                {!! Form::open(['route' => ['videos.destroy', $video->id], 'method' => 'delete']) !!}
                <div class='btn-group'>
                    <a href="{!! route('videos.show', [$video->id]) !!}" class='btn btn-default btn-xs'><i class="glyphicon glyphicon-eye-open"></i></a>
                    <a href="{!! route('videos.edit', [$video->id]) !!}" class='btn btn-default btn-xs'><i class="glyphicon glyphicon-edit"></i></a>
                    {!! Form::button('<i class="glyphicon glyphicon-trash"></i>', ['type' => 'submit', 'class' => 'btn btn-danger btn-xs', 'onclick' => "return confirm('Are you sure?')"]) !!}
                </div>
                {!! Form::close() !!}
            </td>
        </tr>
    @endforeach
    </tbody>
</table>