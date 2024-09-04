@extends('layouts.app')

@section('content')

<!-- Page Banner Area Start -->
<div class="page-banner-area overlay section">
    <div class="container">
        <div class="row">
            <!-- Page Banner -->
            <div class="page-banner text-center col-xs-12">
                <h1>Nos Programmes</h1>
                <!-- Breadcrumb -->
                <ul class="breadcrumb">
                    <li><a href="index.html">Home</a></li>
                    <li><a href="#">Nos Programmes</a></li>
                </ul>
            </div>
        </div>
    </div>
</div>
<!-- End of Page Banner Area -->
   
<!-- Course Area Start -->
<div class="course-area bg-white section pt-120 pb-120">
    <div class="container">
        <!-- Course Wrapper -->
        <div class="course-wrapper row mb--30">
        @foreach($programmes as $programme)
            <!-- Course Item -->
            <div class="col-lg-4 col-md-6 col-12 mb-30">
                <div class="course-item">
                <a class="image" href="{{ route('programme.details', $programme->id) }}"><img src="/assets/img/course/1.jpg" alt="Image"></a>
                    <div class="content">
                        <h4 class="title"><a href="{{ route('programme.details', $programme->id) }}">{{$programme->nom}}</a></h4>
                        <div class="course-info">
                            
                            <span><i class="zmdi zmdi-calendar-check"></i>{{$programme->created_at}}</span>
                        </div>
                    </div>
                </div>
            </div>
            @endforeach
        </div>
    </div>
</div>
<!-- End of Course Area -->

@endsection