<table class="table table-responsive" id="profiles-table">
    <thead>
        <th>Name</th>
        <th>Title</th>
        <th>Email</th>
        <th>Phone</th>
        <th>Bio</th>
        <th>Image Path</th>
        <th colspan="3">Action</th>
    </thead>
    <tbody>
    @foreach($profiles as $profile)
        <tr>
            <td>{!! $profile->name !!}</td>
            <td>{!! $profile->title !!}</td>
            <td>{!! $profile->email !!}</td>
            <td>{!! $profile->phone !!}</td>
            <td>{!! $profile->bio !!}</td>
            <td>{!! $profile->image_path !!}</td>
            <td>
                {!! Form::open(['route' => ['admin.profiles.destroy', $profile->id], 'method' => 'delete']) !!}
                <div class='btn-group'>
                    <a href="{!! route('admin.profiles.edit', [$profile->id]) !!}" class='btn btn-default btn-xs'><i class="glyphicon glyphicon-edit"></i></a>
                    {!! Form::button('<i class="glyphicon glyphicon-trash"></i>', ['type' => 'submit', 'class' => 'btn btn-danger btn-xs', 'onclick' => "return confirm('Are you sure?')"]) !!}
                </div>
                {!! Form::close() !!}
            </td>
        </tr>
    @endforeach
    </tbody>
</table>