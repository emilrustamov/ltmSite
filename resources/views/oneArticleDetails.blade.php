@extends ('layouts.base')

@section('title', 'Project Details')

@section('content')
{{-- <link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/slick-carousel/1.8.1/slick.css"/> --}}

<div class="container">
    <div class="title">{{$blog['title_'.$lang]}}</div>
    
    <div class="ratings">
        <hr>
        <div class="header-flex header-sub">
        {{-- <p>Ratings</p>
        <div class="stars">
            <span>☆</span>
            <span>☆</span>
            <span>☆</span>
            <span>☆</span>
            <span>☆</span>
        </div> --}}

    </div>
        <hr>
        @if($blog['photo'] != "")
         <img src="{{asset('storage/'.$blog['photo'])}}" alt="Image" style="width: 300px !important; height: 200px !important;">
         @else
        <img src="{{asset('assets/images/proformat.png')}}" alt="Image">
        @endif
    {{-- <img src="{{asset('storage/'.$portfolio['photo'])}}" alt=""> --}}
    </div>
    <div class="what-done">
        {{-- <p>  What have we done </p> --}}
      <div class="project-details-row-title">
       {!!$blog['desc_'.$lang] !!}
      </div>
     
      
      </div>
  </div>

@endsection