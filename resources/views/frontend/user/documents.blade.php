@extends('frontend.layouts.app')

@section('content')
     <div class="row">
                        <div class="col-lg-12">
						
						 @foreach($documents as $document)
                            <div class="card">
                                <div class="card-header">
                                    <i class="fa fa-align-justify"></i> {!! $document->title !!}t
                                </div>
                                <div class="card-block">
								
								<div class="row">
									<div class="col-lg-4">
									<img class="card-img-top img-fluid rounded" src="{{asset('uploads/'.$document->file_nam)}}" alt="">
									 </div>
									 	<div class="col-lg-8">
										 {!! $document->summary !!} 
									 </div>
                                 </div>
                                                                 
                                            </div>
                                            </div>
											<br><br>
											@endforeach
                                            </div>
                                            </div>


@endsection