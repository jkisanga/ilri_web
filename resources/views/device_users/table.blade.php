 <div class="row">
                        <div class="col-lg-12">
                            <div class="card">
                                <div class="card-header">
                                    <i class="fa fa-align-justify"></i> List of Registered Devices & Holder
                                </div>
                                <div class="card-block">
                                    <table class="table table-bordered table-striped table-condensed">
                                        <thead>
                                            <tr>
                                                <th>Holder Name</th>
                                                       <th>Holder Email</th>
                                                       <th>Device Serial No</th>
                                                       <th class="col-lg-1">Action</th>
                                            </tr>
                                        </thead>
                                        <tbody> @foreach($deviceUsers as $deviceUser)
                                            <tr>
                                               <td>{!! $deviceUser->name !!}</td>
                                                           <td>{!! $deviceUser->email !!}</td>
                       <td>{!! $deviceUser->IME_NO !!}</td>
                       <td>
                           {!! Form::open(['route' => ['admin.deviceUsers.destroy', $deviceUser->id], 'method' => 'delete']) !!}
                           <div class='btn-group'>

                               {{--<a href="{!! route('admin.deviceUsers.show', [$deviceUser->id]) !!}" class='btn btn-default'><i class="fa fa-eye-open"></i></a>--}}
                               <a href="{!! route('admin.deviceUsers.edit', [$deviceUser->id]) !!}" class='btn btn-success btn-sm'><i class="fa fa-edit"></i></a> &nbsp;
                               {!! Form::button('<i class="fa fa-trash"></i>', ['type' => 'submit', 'class' => 'btn btn-danger btn-sm', 'onclick' => "return confirm('Are you sure?')"]) !!}
                           </div>
                           {!! Form::close() !!}
                       </td>
                                            </tr>@endforeach
                                            </tbody>
                                            </table>
                                            </div>
                                            </div>
                                            </div>
                                            </div>



