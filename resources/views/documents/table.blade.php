 <div class="row">
                        <div class="col-lg-12">
                            <div class="card">
                                <div class="card-header">
                                    <i class="fa fa-align-justify"></i> Document List
                                </div>
                                <div class="card-block">
                                    <table class="table table-bordered table-striped table-condensed">
                                        <thead>
                                            <tr>

                                                  <th>Title</th>
                                                  <th>Summary</th>
                                                  <th class="col-lg-1">Action</th>
                                            </tr>
                                        </thead>
                                        <tbody> @foreach($documents as $document)
                                            <tr>
                       <td>{!! $document->title !!}</td>
                                  <td>{!! $document->summary !!}</td>

                                  <td>
                                      {!! Form::open(['route' => ['admin.documents.destroy', $document->id], 'method' => 'delete']) !!}
                                      <div class='btn-group'>
                                          {{--<a href="{!! route('admin.documents.show', [$document->id]) !!}" class='btn btn-default btn-xs'><i class="icon-eye"></i></a>--}}
                                          <a href="{!! route('admin.documents.edit', [$document->id]) !!}" class='btn btn-success btn-sm'><i class=" icon-pencil"></i></a> &nbsp;
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

