@extends('layouts.app')

@section('content')

<!-- Page Banner Area Start -->
<div class="page-banner-area overlay section">
    <div class="container">
        <div class="row">
            <!-- Page Banner -->
            <div class="page-banner text-center col-xs-12">
                <h1>Details Des Programmes</h1>
                <!-- Breadcrumb -->
                <ul class="breadcrumb">
                    <li><a href="index.html">Home</a></li>
                    <li><a href="#">Details Des Programmes</a></li>
                </ul>
            </div>
        </div>
    </div>
</div>
<!-- End of Page Banner Area -->

<!-- Course Area Start -->
<div class="course-area bg-white section pt-120 pb-70">
    <div class="container">
        <div class="row">
           
            <div class="col-xl-9 col-lg-8 col-12 mb-20">
                <!-- Single Course Details -->
                <div class="single-course-details">
                    <div class="image mb-4"><img alt="Image" src="/assets/img/course/details.jpg"></div>
                    <div class="content">
                        <h4 class="title">{{$programme->nom}}</h4>
                        <div class="course-info">
                            <span><i class="zmdi zmdi-calendar-check"></i> {{$programme->created_at}}</span>
                        </div>
                        <div class="course-text-content">
                            <p> {{$programme->description}} </p>
                        </div>  
                    </div>  
                    <div class="course-duration mt-30">
                        <div class="duration-title">
                            <div class="text"><span>Lessons</span> <span class="text-end">Estimated Time</span></div>
                        </div>
                        <div class="duration-text">
                            <div class="text"><span>Print design</span> <span class="text-end">15 days</span></div>
                            <div class="text"><span>web design</span> <span class="text-end">10 days</span></div>
                            <div class="text"><span>apps design</span> <span class="text-end">16 days</span></div>
                            <div class="text"><span>web design</span> <span class="text-end">20 days</span></div>
                            <div class="text"><span>web design</span> <span class="text-end">22 days</span></div>
                        </div>
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
            <div class="col-xl-3 col-lg-4 col-12 mb-50">
                <!-- Department Head -->
                <div class="single-sidebar">
                    <div class="sidebar-teacher">
                        <img src="/assets/img/teacher/head.jpg" alt="Image">
                        <h4>Daniel Scott</h4>
                        <h5>Department Head</h5>
                        <div class="social">
                            <a href="www.facebook.html"><i class="fa fa-facebook"></i></a>
                            <a href="#"><i class="fa fa-twitter"></i></a>
                            <a href="www.plus.google.html"><i class="fa fa-google-plus"></i></a>
                            <a href="www.instagram.html"><i class="fa fa-instagram"></i></a>
                        </div>
                    </div>
                </div>
                <!-- Category -->
                <div class="single-sidebar">
                    <h4>Category</h4>
                    <ul class="category">
                        <li><a href="#">Photoshop</a></li>
                        <li><a href="#">Design</a></li>
                        <li><a href="#">Tutorial</a></li>
                        <li><a href="#">Courses</a></li>
                        <li><a href="#">Premium</a></li>
                        <li><a href="#">Design</a></li>
                    </ul>
                </div>
                <!-- Tags -->
                <div class="single-sidebar">
                    <h4>Search by Tags</h4>
                    <div class="tags">
                        <a href="#">Photoshop</a>
                        <a href="#">Design</a>
                        <a href="#">Tutorial</a>
                        <a href="#">Courses</a>
                        <a href="#">Premium</a>
                        <a href="#">Design</a>
                    </div>
                </div>
                    
                <div class="single-sidebar">
                    <h4>Related Courses</h4>
                    <!-- Course Item -->
                    <div class="course-item sidebar-course">
                        <a class="image" href="#"><img src="/assets/img/course/2.jpg" alt="Image"></a>
                        <div class="content">
                            <h4 class="title"><a href="#">Industrial & Production Engineering (IPE)</a></h4>
                            <div class="course-info">
                                <a href="#">Faculty of ME</a>
                                <span><i class="zmdi zmdi-calendar-check"></i> 4 years</span>
                            </div>
                        </div>
                    </div>
                </div>
                
            </div>
        </div>
    </div>
</div>
<!--End of Course Area-->

@endsection