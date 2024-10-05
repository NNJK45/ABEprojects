@extends('user.layouts.app')

@section('content')

<!-- Page Banner Area Start -->
<div class="page-banner-area overlay section">
    <div class="container">
        <div class="row">
            <!-- Page Banner -->
            <div class="page-banner text-center col-xs-12">
                <h1>News Details</h1>
                <!-- Breadcrumb -->
                <ul class="breadcrumb">
                    <li><a href="index.html">Home</a></li>
                    <li><a href="#">News Details</a></li>
                </ul>
            </div>
        </div>
    </div>
</div>
<!-- End of Page Banner Area -->

<!-- News Area Start -->
<div class="news-area bg-white section pt-120 pb-70">
    <div class="container">
        <div class="row">
            <div class="col-xl-9 col-lg-8 col-12 mb-20">
                <!-- Single News Details -->
               <div class="single-news-details">
                    <img class="mb-4" src="/assets/img/news/details.jpg" alt="Image">
                    <div class="content">
                        <h3 class="title">Learn English in ease simply random text</h3>
                        <div class="news-meta fix">
                           <span><i class="zmdi zmdi-calendar-check"></i>25 jun 2050</span>
                           <a href="#"><i class="zmdi zmdi-eye"></i>59</a>
                           <a href="#"><i class="zmdi zmdi-comments"></i>19</a>
                        </div>
                        <p>There are many variaons of passages of Lorem Ipsuable, amrn in some by injected humour, There are many variations of passages of Lorem Ipsum available, but the majority have suffered alteration in some form, by injected humour, or randomised words which don't look even slightly believable. If you are going to use a passage of Lorem Ipsum, you need to be sure there isn't anything embarrassing hidden in the middle of text.</p>
                        <p>There are many variaons of passages of Lorem Ipsuable, amrn in some by injected humour, There are many variations of passages of Lorem Ipsum available,</p>
                        <div class="quote-section">
                            <p>but the majority have suffered alteration in some form, by injected humour, or randomised words which don't look even slightly believable. If you are going to use a passage of Lorem Ipsum, you need to be sure there isn't anything embarrassing hidden in the middle of text.</p>
                        </div>
                        <p>Lorem Ipsuable, amrn in some by injected humour, There are many variations of passages of Lorem Ipsum available, but the majority have suffered alteration in some form, by injected humour, or randomised words which don't look even slightly believable. If you are going to use a passage of Lorem Ipsum, you need to be sure there isn't anything embarrassing hidden in the middle of text. </p>

                        <div class="news-footer">
                            <div class="related-tag">
                                <span>Tag:</span>
                                <div class="tag">
                                    <a href="#">design,</a>
                                    <a href="#">Photoshop,</a>
                                    <a href="#">Web Design,</a>
                                    <a href="#">print</a>
                                </div>
                            </div>
                            <div class="share-links">
                                <span>Share:</span>
                                <div class="links">
                                    <a href="#"><i class="zmdi zmdi-facebook"></i></a>
                                    <a href="#"><i class="zmdi zmdi-twitter"></i></a>
                                    <a href="#"><i class="zmdi zmdi-google-old"></i></a>
                                    <a href="#"><i class="zmdi zmdi-instagram"></i></a>
                                </div>
                            </div>
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
            <div class="col-xl-3 col-lg-4 col-12">
                <!-- Recent News -->
                <div class="single-sidebar">
                    <h4 class="title">Recent News</h4>
                    <div class="recent-news">
                        <div class="recent-news-item">
                            <a class="image" href="#"><img src="/assets/img/news/sidebar/1.jpg" alt="Image"></a>
                            <div class="content">
                                <h5><a href="#">Learn English in</a></h5>
                                <div class="meta fix">
                                    <a href="#"><i class="zmdi zmdi-eye"></i>59</a>
                                    <a href="#"><i class="zmdi zmdi-comments"></i>19</a>
                                </div>
                                <p>There are many varf passages of Lorem Ipsuable,amar</p>
                            </div>
                        </div>
                        <div class="recent-news-item">
                            <a class="image" href="#"><img src="/assets/img/news/sidebar/2.jpg" alt="Image"></a>
                            <div class="content">
                                <h5><a href="#">Team Works</a></h5>
                                <div class="meta fix">
                                    <a href="#"><i class="zmdi zmdi-eye"></i>59</a>
                                    <a href="#"><i class="zmdi zmdi-comments"></i>19</a>
                                </div>
                                <p>There are many varf passages of Lorem Ipsuable,amar</p>
                            </div>
                        </div>
                        <div class="recent-news-item">
                            <a class="image" href="#"><img src="/assets/img/news/sidebar/3.jpg" alt="Image"></a>
                            <div class="content">
                                <h5><a href="#">Learn With Fun</a></h5>
                                <div class="meta fix">
                                    <a href="#"><i class="zmdi zmdi-eye"></i>59</a>
                                    <a href="#"><i class="zmdi zmdi-comments"></i>19</a>
                                </div>
                                <p>There are many varf passages of Lorem Ipsuable,amar</p>
                            </div>
                        </div>
                        <div class="recent-news-item">
                            <a class="image" href="#"><img src="/assets/img/news/sidebar/4.jpg" alt="Image"></a>
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
            </div>
        </div>
    </div>
</div>
<!--End of News Area-->

@endsection
