@extends('admin.layouts.app')

@section('body')
    <div class="nk-wrap ">
        @include('admin.layouts.header')
        <div class="nk-content nk-content-fluid">
            <div class="container-xl wide-lg">
                <div class="nk-content-body">
                    <div class="nk-block-head nk-block-head-sm">
                        <div class="nk-block-between">
                            <div class="nk-block-head-content">
                                <h3 class="nk-block-title page-title">ABE project</h3>
                            </div><!-- .nk-block-head-content -->
                            <div class="nk-block-head-content">
                                <div class="toggle-wrap nk-block-tools-toggle">
                                    <a href="#" class="btn btn-icon btn-trigger toggle-expand mr-n1"
                                        data-target="pageMenu"><em class="icon ni ni-more-v"></em></a>
                                    <div class="toggle-expand-content" data-content="pageMenu">
                                        <ul class="nk-block-tools g-3">
                                            <li><a href="#" class="btn btn-white btn-dim btn-outline-primary"><em
                                                        class="icon ni ni-download-cloud"></em><span>Export</span></a></li>
                                            <li><a href="#" class="btn btn-white btn-dim btn-outline-primary"><em
                                                        class="icon ni ni-reports"></em><span>Reports</span></a></li>
                                            <li class="nk-block-tools-opt">
                                                <div class="drodown">
                                                    <a href="#" class="dropdown-toggle btn btn-icon btn-primary"
                                                        data-toggle="dropdown"><em class="icon ni ni-plus"></em></a>
                                                    <div class="dropdown-menu dropdown-menu-right">
                                                        <ul class="link-list-opt no-bdr">
                                                            <li><a href="#"><em
                                                                        class="icon ni ni-user-add-fill"></em><span>Add
                                                                        User</span></a></li>
                                                            <li><a href="#"><em
                                                                        class="icon ni ni-coin-alt-fill"></em><span>Add
                                                                        Order</span></a></li>
                                                            <li><a href="#"><em
                                                                        class="icon ni ni-note-add-fill-c"></em><span>Add
                                                                        Page</span></a></li>
                                                        </ul>
                                                    </div>
                                                </div>
                                            </li>
                                        </ul>
                                    </div>
                                </div>
                            </div><!-- .nk-block-head-content -->
                        </div><!-- .nk-block-between -->
                    </div><!-- .nk-block-head -->
                    <div class="nk-block">
                        <div class="row g-gs">
                            <div class="col-lg-8">
                                <div class="card card-bordered h-100">
                                    <div class="card-inner">
                                        <div class="card-title-group align-start mb-3">
                                            <div class="card-title">
                                                <h6 class="title">Orders Overview</h6>
                                                <p>In last 10 days buy and sells overview. <a href="#"
                                                        class="link link-sm">Detailed Stats</a></p>
                                            </div>
                                            <div class="card-tools mt-n1 mr-n1">
                                                <div class="drodown">
                                                    <a href="#" class="dropdown-toggle btn btn-icon btn-trigger"
                                                        data-toggle="dropdown"><em class="icon ni ni-more-h"></em></a>
                                                    <div class="dropdown-menu dropdown-menu-sm dropdown-menu-right">
                                                        <ul class="link-list-opt no-bdr">
                                                            <li><a href="#" class="active"><span>15 Days</span></a>
                                                            </li>
                                                            <li><a href="#"><span>30 Days</span></a></li>
                                                            <li><a href="#"><span>3 Months</span></a></li>
                                                        </ul>
                                                    </div>
                                                </div>
                                            </div>
                                        </div><!-- .card-title-group -->
                                        <div class="nk-order-ovwg">
                                            <div class="row g-4 align-end">
                                                <div class="col-xxl-8">
                                                    <div class="nk-order-ovwg-ck">
                                                        <canvas class="order-overview-chart" id="orderOverview"></canvas>
                                                    </div>
                                                </div><!-- .col -->
                                                <div class="col-xxl-4">
                                                    <div class="row g-4">
                                                        <div class="col-sm-6 col-xxl-12">
                                                            <div class="nk-order-ovwg-data buy">
                                                                <div class="amount">12,954.63 <small
                                                                        class="currenct currency-usd">USD</small></div>
                                                                <div class="info">Last month <strong>39,485 <span
                                                                            class="currenct currency-usd">USD</span></strong>
                                                                </div>
                                                                <div class="title"><em
                                                                        class="icon ni ni-arrow-down-left"></em> Buy Orders
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="col-sm-6 col-xxl-12">
                                                            <div class="nk-order-ovwg-data sell">
                                                                <div class="amount">12,954.63 <small
                                                                        class="currenct currency-usd">USD</small></div>
                                                                <div class="info">Last month <strong>39,485 <span
                                                                            class="currenct currency-usd">USD</span></strong>
                                                                </div>
                                                                <div class="title"><em
                                                                        class="icon ni ni-arrow-up-left"></em> Sell Orders
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div><!-- .col -->
                                            </div>
                                        </div><!-- .nk-order-ovwg -->
                                    </div><!-- .card-inner -->
                                </div><!-- .card -->
                            </div><!-- .col -->
                            <div class="col-lg-4">
                                <div class="card card-bordered h-100">
                                    <div class="card-inner-group">
                                        <div class="card-inner card-inner-md">
                                            <div class="card-title-group">
                                                <div class="card-title">
                                                    <h6 class="title">Action Center</h6>
                                                </div>
                                                <div class="card-tools mr-n1">
                                                    <div class="drodown">
                                                        <a href="#" class="dropdown-toggle btn btn-icon btn-trigger"
                                                            data-toggle="dropdown"><em class="icon ni ni-more-h"></em></a>
                                                        <div class="dropdown-menu dropdown-menu-right">
                                                            <ul class="link-list-opt no-bdr">
                                                                <li><a href="#"><em
                                                                            class="icon ni ni-setting"></em><span>Action
                                                                            Settings</span></a></li>
                                                                <li><a href="#"><em
                                                                            class="icon ni ni-notify"></em><span>Push
                                                                            Notification</span></a></li>
                                                            </ul>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div><!-- .card-inner -->
                                        <div class="card-inner">
                                            <div class="nk-wg-action">
                                                <div class="nk-wg-action-content">
                                                    <em class="icon ni ni-cc-alt-fill"></em>
                                                    <div class="title">Pending Buy/Sell Orders</div>
                                                    <p>We have still <strong>40 buy orders</strong> and <strong>12 sell
                                                            orders</strong>, thats need to review.</p>
                                                </div>
                                                <a href="#" class="btn btn-icon btn-trigger mr-n2"><em
                                                        class="icon ni ni-forward-ios"></em></a>
                                            </div>
                                        </div><!-- .card-inner -->
                                        <div class="card-inner">
                                            <div class="nk-wg-action">
                                                <div class="nk-wg-action-content">
                                                    <em class="icon ni ni-help-fill"></em>
                                                    <div class="title">Support Messages</div>
                                                    <p>Here is <strong>18 new</strong> support message. </p>
                                                </div>
                                                <a href="#" class="btn btn-icon btn-trigger mr-n2"><em
                                                        class="icon ni ni-forward-ios"></em></a>
                                            </div>
                                        </div><!-- .card-inner -->
                                        <div class="card-inner">
                                            <div class="nk-wg-action">
                                                <div class="nk-wg-action-content">
                                                    <em class="icon ni ni-wallet-fill"></em>
                                                    <div class="title">Upcoming Deposit</div>
                                                    <p><strong>7 upcoming</strong> deposit need to review.</p>
                                                </div>
                                                <a href="#" class="btn btn-icon btn-trigger mr-n2"><em
                                                        class="icon ni ni-forward-ios"></em></a>
                                            </div>
                                        </div><!-- .card-inner -->
                                    </div><!-- .card-inner-group -->
                                </div><!-- .card -->
                            </div><!-- .col -->

                        </div><!-- .row -->
                    </div><!-- .nk-block -->
                </div>
            </div>
        </div>
        @include('admin.layouts.footer')
    </div>
@endsection
