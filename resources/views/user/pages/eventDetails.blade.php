@extends('user.layouts.app')

@section('content')

<!-- Page Banner Area Start -->
<div class="page-banner-area overlay section">
    <div class="container">
        <div class="row">
            <!-- Page Banner -->
            <div class="page-banner text-center col-xs-12">
                <h1>Event Details</h1>
                <!-- Breadcrumb -->
                <ul class="breadcrumb">
                    <li><a href="index.html">Home</a></li>
                    <li><a href="#">Event Details</a></li>
                </ul>
            </div>
        </div>
    </div>
</div>
<!-- End of Page Banner Area -->

<!-- Event Area Start -->
<div class="event-area bg-white section pt-120 pb-70">
    <div class="container">
        <div class="row">

            <div class="col-xl-9 col-lg-8 col-12 mb-20">
                <!-- Single Event Details -->
                <div class="single-event-details">
                    <img src="{{ $event->image }}" alt="Image">
                    <span class="date">{{\Carbon\Carbon::parse($event->date)->format('d')}} <span>{{\Carbon\Carbon::parse($event->date)->format('M')}}</span></span>
                    <div class="content">
                        <h3>{{$event->titre}}</h3>
                        <div class="event-meta fix">
                            <span><i class="zmdi zmdi-time"></i> {{$event->date}}</span>
                            <span><i class="zmdi zmdi-pin"></i> {{$event->lieu}} </span>
                        </div>
                       <p>{{$event->description}} </p>
                    </div>
                </div>

                <!-- Comment -->
                <div class="comment-wrapper">
                    <h3>Comments</h3>
                    <ul class="comment-list">
                        <li>
                            <div class="single-comment">
                                <div class="author-image">
                                    <img src="/assets/img/comment/1.jpg" alt="Image">
                                </div>
                                <div class="comment-text fix">
                                    <div class="author-info fix">
                                        <h4><a href="#">Carl Gonzales</a></h4>
                                        <span class="reply"><a href="#">Reply</a></span>
                                        <span class="time">Posted on Jun 12, 2022 /</span>
                                    </div>
                                    <p>There are many variations of passages of Lorem Ipsum available, but the majority have suffered, but the majority have suffered aation in some form, by injected humour,</p>
                                </div>
                            </div>
                            <ul>
                                <li>
                                    <div class="single-comment">
                                        <div class="author-image">
                                            <img src="/assets/img/comment/2.jpg" alt="Image">
                                        </div>
                                        <div class="comment-text fix">
                                            <div class="author-info fix">
                                                <h4><a href="#">Larry Flores</a></h4>
                                                <span class="reply"><a href="#">Reply</a></span>
                                                <span class="time">Posted on Jun 12, 2022 /</span>
                                            </div>
                                        <p>There are many variations of passages of Lorem Ipsum available, but the majority have suffered, but the majority have suffered aation in some form, by injected humour,</p>
                                        </div>
                                    </div>
                                </li>
                            </ul>
                        </li>
                        <li>
                            <div class="single-comment">
                                <div class="author-image">
                                    <img src="/assets/img/comment/3.jpg" alt="Image">
                                </div>
                                <div class="comment-text fix">
                                    <div class="author-info fix">
                                        <h4><a href="#">Ruth McCoy</a></h4>
                                        <span class="reply"><a href="#">Reply</a></span>
                                        <span class="time">Posted on Jun 12, 2022 /</span>
                                    </div>
                                    <p>There are many variations of passages of Lorem Ipsum available, but the majority have suffered, but the majority have suffered aation in some form, by injected humour,</p>
                                </div>
                            </div>
                        </li>
                    </ul>
                </div>
            </div>

            <!-- Sidebar Wrapper -->
            <div class="col-xl-3 col-lg-4 col-12">
                <!-- Recent Event -->
                <div class="single-sidebar">
                    <h4>Recent Events</h4>
                    <div class="recent-event">
                        <div class="recent-event-item">
                            <a class="image" href="#"><img src="/assets/img/event/sidebar/1.jpg" alt="Image"></a>
                            <div class="content">
                                <h5><a href="#">Learn English in</a></h5>
                                <div class="meta fix">
                                    <a href="#"><i class="zmdi zmdi-eye"></i>59</a>
                                    <a href="#"><i class="zmdi zmdi-comments"></i>19</a>
                                </div>
                                <p>There are many varf passages of Lorem Ipsuable,amar</p>
                            </div>
                        </div>
                        <div class="recent-event-item">
                            <a class="image" href="#"><img src="/assets/img/event/sidebar/2.jpg" alt="Image"></a>
                            <div class="content">
                                <h5><a href="#">Team Works</a></h5>
                                <div class="meta fix">
                                    <a href="#"><i class="zmdi zmdi-eye"></i>59</a>
                                    <a href="#"><i class="zmdi zmdi-comments"></i>19</a>
                                </div>
                                <p>There are many varf passages of Lorem Ipsuable,amar</p>
                            </div>
                        </div>
                        <div class="recent-event-item">
                            <a class="image" href="#"><img src="/assets/img/event/sidebar/3.jpg" alt="Image"></a>
                            <div class="content">
                                <h5><a href="#">Learn With Fun</a></h5>
                                <div class="meta fix">
                                    <a href="#"><i class="zmdi zmdi-eye"></i>59</a>
                                    <a href="#"><i class="zmdi zmdi-comments"></i>19</a>
                                </div>
                                <p>There are many varf passages of Lorem Ipsuable,amar</p>
                            </div>
                        </div>
                        <div class="recent-event-item">
                            <a class="image" href="#"><img src="/assets/img/event/sidebar/4.jpg" alt="Image"></a>
                            <div class="content">
                                <h5><a href="#">Writing Skill</a></h5>
                                <div class="meta fix">
                                    <a href="#"><i class="zmdi zmdi-eye"></i>59</a>
                                    <a href="#"><i class="zmdi zmdi-comments"></i>19</a>
                                </div>
                                <p>There are many varf passages of Lorem Ipsuable,amar</p>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- Tags -->
                <div class="single-sidebar">
                    <h4>Search by Tags</h4>
                    <ul class="tags">
                        <li><a href="#">Photoshop</a></li>
                        <li><a href="#">Design</a></li>
                        <li><a href="#">Tutorial</a></li>
                        <li><a href="#">Courses</a></li>
                        <li><a href="#">Premium</a></li>
                        <li><a href="#">Designtuto</a></li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
</div>
<!--End of Event Area-->
@endsection
