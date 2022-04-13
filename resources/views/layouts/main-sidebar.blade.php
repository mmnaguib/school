<div class="container-fluid">
    <div class="row">
        <!-- Left Sidebar start-->
        <div class="side-menu-fixed">
            <div class="scrollbar side-menu-bg">
                <ul class="nav navbar-nav side-menu" id="sidebarnav">
                    <!-- menu item Dashboard-->
                    <li>
                        <a href="javascript:void(0);" data-toggle="collapse" data-target="#dashboard">
                            <div class="pull-left"><i class="ti-home"></i><span class="right-nav-text">Dashboard</span>
                            </div>
                            <div class="pull-right"><i class="ti-plus"></i></div>
                            <div class="clearfix"></div>
                        </a>
                        <ul id="dashboard" class="collapse" data-parent="#sidebarnav">
                            <li> <a href="index.html">Dashboard 01</a> </li>
                            <li> <a href="index-02.html">Dashboard 02</a> </li>
                            <li> <a href="index-03.html">Dashboard 03</a> </li>
                            <li> <a href="index-04.html">Dashboard 04</a> </li>
                            <li> <a href="index-05.html">Dashboard 05</a> </li>
                        </ul>
                    </li>
                    <!-- menu title -->
                    <li class="mt-10 mb-10 text-muted pl-4 font-medium menu-title">
                        <i style="color:#6c757d !important;font-size:14px" class="ti-home"></i><a style="display: inline" href="{{ route('grades.index') }}">@lang('site.grades')</a>
                    </li>
                    <li class="mt-10 mb-10 text-muted pl-4 font-medium menu-title">
                        <i style="color:#6c757d !important;font-size:14px" class="ti-home"></i><a style="display: inline" href="{{ route('classroom.index') }}">@lang('site.classroom')</a>
                    </li>
                    <li class="mt-10 mb-10 text-muted pl-4 font-medium menu-title">
                        <i style="color:#6c757d !important;font-size:14px" class="ti-home"></i><a style="display: inline" href="{{ route('sections.index') }}">@lang('site.sections')</a>
                    </li>
                    <li>
                        <a href="javascript:void(0);" data-toggle="collapse" data-target="#students">
                            <div class="pull-left"><i class="ti-user"></i><span class="right-nav-text">@lang('site.students')</span>
                            </div>
                            <div class="pull-right"><i class="ti-plus"></i></div>
                            <div class="clearfix"></div>
                        </a>
                        <ul id="students" class="collapse" data-parent="#sidebarnav">
                            <li> <a href="{{ route('students.index') }}">@lang('site.students')</a> </li>
                            <li> <a href="{{ route('promotions.index') }}">@lang('site.promotions_management')</a></li>
                            <li> <a href="{{ route('graduated.index') }}">@lang('site.graduated_students')</a></li>
                        </ul>
                    </li>
                    <li class="mt-10 mb-10 text-muted pl-4 font-medium menu-title">
                        <i style="color:#6c757d !important;font-size:14px" class="ti-user"></i><a style="display: inline" href="{{ URL('parents') }}">@lang('site.parents')</a>
                    </li>
                    <li class="mt-10 mb-10 text-muted pl-4 font-medium menu-title">
                        <i style="color:#6c757d !important;font-size:14px" class="ti-user"></i><a style="display: inline" href="{{ route('teachers.index') }}">@lang('site.teachers')</a>
                    </li>

                    <li>
                        <a href="javascript:void(0);" data-toggle="collapse" data-target="#accountants">
                            <div class="pull-left"><i class="ti-user"></i><span class="right-nav-text">@lang('site.accountants')</span>
                            </div>
                            <div class="pull-right"><i class="ti-plus"></i></div>
                            <div class="clearfix"></div>
                        </a>
                        <ul id="accountants" class="collapse" data-parent="#sidebarnav">
                            <li> <a href="{{ route('fees.index') }}">@lang('site.accountants')</a> </li>
                            <li> <a href="{{ route('feesInvoices.index') }}">@lang('site.fee_invoice')</a></li>
                            <li> <a href="{{ route('receipts.index') }}">@lang('site.receipts')</a></li>
                            <li> <a href="{{ route('processesFee.index') }}">@lang('site.processFee')</a></li>
                            <li> <a href="{{ route('payment_students.index') }}">@lang('site.payments')</a></li>
                        </ul>
                    </li>

                </ul>
            </div>
        </div>

        <!-- Left Sidebar End-->

        <!--=================================
