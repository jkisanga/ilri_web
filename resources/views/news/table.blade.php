<table class="table table-responsive" id="news-table">
    <thead>
        <th>Title</th>
        <th>Summary</th>
      
        <th>Story</th>
        <th>Published Date</th>
        <th>Published</th>
        <th>Published By</th>
        <th colspan="3">Action</th>
    </thead>
    <tbody>
    @foreach($news as $news)
        <tr>
            <td>{!! $news->title !!}</td>
            <td>{!! $news->summary !!}</td>
         
            <td>{!! $news->story !!}</td>
            <td>{!! $news->published_date !!}</td>
            <td>{!! $news->published !!}</td>
            <td>{!! $news->published_by !!}</td>
            <td>
                {!! Form::open(['route' => ['admin.news.destroy', $news->id], 'method' => 'delete']) !!}
                <div class='btn-group'>
                    <a href="{!! route('admin.news.edit', [$news->id]) !!}" class='btn btn-default btn-xs'><i class="glyphicon glyphicon-edit"></i></a>
                    {!! Form::button('<i class="glyphicon glyphicon-trash"></i>', ['type' => 'submit', 'class' => 'btn btn-danger btn-xs', 'onclick' => "return confirm('Are you sure?')"]) !!}
                </div>
                {!! Form::close() !!}
            </td>
        </tr>
    @endforeach
    </tbody>
</table>