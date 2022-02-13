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
                        <a href="javascript:void(0);" data-toggle="collapse" data-target="#parent">
                            <div class="pull-left"><i class="ti-home"></i><span class="right-nav-text">@lang('site.parents')</span>
                            </div>
                            <div class="pull-right"><i class="ti-plus"></i></div>
                            <div class="clearfix"></div>
                        </a>
                        <ul id="parent" class="collapse" data-parent="#sidebarnav">
                            <li> <a style="display: inline" href="{{ route('parents.index') }}">@lang('site.add_parent')</a> </li>
                        </ul>
                    </li>

                </ul>
            </div>
        </div>

        <!-- Left Sidebar End-->

        <!--=================================
