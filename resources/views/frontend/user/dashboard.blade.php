@extends('frontend.layouts.app')

@section('content')
 <h1 class="my-4">Document Categories <small></small></h1>
<div class="row">
            <div class="col-lg-3 col-sm-6 portfolio-item"><a href="#">
                <div class="card h-100">
                    <a href="{{route('frontend.user.documents')}}"><img class="card-img-top img-fluid rounded" src="http://placehold.it/700x400" alt=""></a>
                    <div class="card-block">
                        <h4 class="card-title text-center"><a href="#">Documents</a></h4>
                        <p class="card-text text-center">List of Documents</p>
                    </div>
                </div>
          </a>  </div>
            <div class="col-lg-3 col-sm-6 portfolio-item">
                <div class="card h-100">
                    <a href="#"><img class="card-img-top img-fluid rounded" src="http://placehold.it/700x400" alt=""></a>
                    <div class="card-block">
                        <h4 class="card-title text-center"><a href="#">Statistics</a></h4>
                        <p class="card-text text-center"> List of statistics data</p>
                    </div>
                </div>
            </div>
            <div class="col-lg-3 col-sm-6 portfolio-item">
                <div class="card h-100">
                    <a href="#"><img class="card-img-top img-fluid rounded" src="http://placehold.it/700x400" alt=""></a>
                    <div class="card-block">
                        <h4 class="card-title text-center"><a href="#">Audio</a></h4>
                        <p class="card-text text-center">List of Audio</p>
                    </div>
                </div>
            </div>
            <div class="col-lg-3 col-sm-6 portfolio-item">
                <div class="card h-100">
                    <a href="#"><img class="card-img-top img-fluid rounded" src="http://placehold.it/700x400" alt=""></a>
                    <div class="card-block">
                        <h4 class="card-title text-center"><a href="#">Videos</a></h4>
                        <p class="card-text text-center">List of Videos</p>
                    </div>
                </div>
            </div>

        </div>
        <!-- /.row -->



    </div>
@endsection