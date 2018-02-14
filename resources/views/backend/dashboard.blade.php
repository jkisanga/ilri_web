@extends('backend.layouts.app')
@section('content')
<div class="col_3">
            <div class="col-md-3 widget widget1">
            <a href="{{route('admin.categories.index')}}">
                <div class="r3_counter_box">
                    <i class="fa fa-folder-open-o"></i>
                    <div class="stats">
                      <h5>{{count(\App\Models\Category::all())}}</h5>
                      <div class="grow">
                        <p>Documents</p>
                      </div>
                    </div>
                </div>
            </a>
            </div>
            <div class="col-md-3 widget widget1">
            <a href="{{route('admin.dataCategories.index')}}">
                <div class="r3_counter_box">
                    <i class="fa fa-folder-open"></i>

                    <div class="stats">
                      <h5>{{count(\App\Models\DataCategory::all())}} </h5>
                      <div class="grow grow1">

                        <p>Statistics</p>
                      </div>
                    </div>
                </div>
                </a>
            </div>
            <div class="col-md-3 widget widget1"><a href="{{route('admin.audioCategories.index')}}">
                <div class="r3_counter_box">
                    <i class="fa fa-file-audio-o"></i>
                    <div class="stats">
                      <h5>{{count(\App\Models\AudioCategory::all())}} </h5>
                      <div class="grow grow3">
                        <p>Audio</p>
                      </div>
                    </div>
                </div></a>
             </div>
             <div class="col-md-3 widget "><a href="{{route('admin.videoCategories.index')}}">
                <div class="r3_counter_box">
                    <i class="fa fa-file-video-o"></i>
                    <div class="stats">
                      <h5>{{count(\App\Models\VideoCategory::all())}}</h5>
                      <div class="grow grow2">
                        <p>Video</p>
                      </div>
                    </div>
                </div>
                </a>
            </div>
            <div class="clearfix"> </div>
        </div>
    </div>
    <br>

@endsection