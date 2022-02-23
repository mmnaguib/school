@extends('layouts.master')
@section('css')
@toastr_css
@section('title')
    @lang('site.promotions')
@stop
@endsection
@section('page-header')
<!-- breadcrumb -->
<div class="page-title">
    <div class="row">
        <div class="col-sm-6">
            <h4 class="mb-0"> @lang('site.promotions')</h4>
        </div>
        <div class="col-sm-6">
            <ol class="breadcrumb pt-0 pr-0 float-left float-sm-right ">
                <li class="breadcrumb-item"><a href="#" class="default-color">@lang('site.dashboard')</a></li>
                <li class="breadcrumb-item"><a href="#" class="default-color">@lang('site.students')</a></li>
                <li class="breadcrumb-item active">@lang('site.promotions')</li>
            </ol>
        </div>
    </div>
</div>
<!-- breadcrumb -->
@endsection
@section('content')
<!-- row -->
<div class="row">
    <div class="col-md-12 mb-30">
        <div class="card card-statistics h-100">
            <div class="card-body">
                @if (Session::has('error_promotions'))
                        <div class="alert alert-danger alert-dismissible fade show" role="alert">
                            <strong>{{Session::get('error_promotions')}}</strong>
                            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                    @endif
                <form method="POST" action="{{ route('promotions.store') }}"> @csrf
                    <b class="text-danger" style="font-size: 18px;margin:8px">@lang('site.lastGrades')</b>
                    <div class="row">
                        <div class="col-md-3">
                            <div class="form-group">
                                <label>@lang('site.grades')</label>
                                <select name="grades" class="form-control">
                                    <option value="" selected>@lang('site.grades')</option>
                                    @foreach ($grades as $grade)
                                        <option value="{{ $grade->id }}">{{ $grade->name }}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>
                        <div class="col-md-3">
                            <div class="form-group">
                                <label>@lang('site.classroom_name')</label>
                                <select name="classrooms" class="form-control">

                                </select>
                            </div>
                        </div>
                        <div class="col-md-3">
                            <div class="form-group">
                                <label>@lang('site.section_name')</label>
                                <select name="sections" class="form-control">

                                </select>
                            </div>
                        </div>
                        <div class="col-md-3">
                            <div class="form-group">
                                <label>@lang('site.academic_year')</label>
                                <select name="academic_year" class="form-control">
                                    <option selected value="">@lang('site.academic_year')</option>
                                    @php
                                        $current_year = date("Y");
                                    @endphp
                                    @for($year=$current_year; $year<=$current_year +1 ;$year++)
                                        <option value="{{ $year}}">{{ $year }}</option>
                                    @endfor
                                </select>
                            </div>
                        </div>
                    </div>

                    <b class="text-danger" style="font-size: 18px;margin:8px">@lang('site.nextGrades')</b>
                    <div class="row">
                        <div class="col-md-3">
                            <div class="form-group">
                                <label>@lang('site.grades')</label>
                                <select name="grades_new" class="form-control">
                                    <option value="" selected>@lang('site.grades')</option>
                                    @foreach ($grades as $grade)
                                        <option value="{{ $grade->id }}">{{ $grade->name }}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>
                        <div class="col-md-3">
                            <div class="form-group">
                                <label>@lang('site.classroom_name')</label>
                                <select name="classrooms_new" class="form-control">

                                </select>
                            </div>
                        </div>
                        <div class="col-md-3">
                            <div class="form-group">
                                <label>@lang('site.section_name')</label>
                                <select name="sections_new" class="form-control">

                                </select>
                            </div>
                        </div>
                        <div class="col-md-3">
                            <div class="form-group">
                                <label>@lang('site.academic_year')</label>
                                <select name="academic_year_new" class="form-control">
                                    <option selected value="">@lang('site.academic_year')</option>
                                    @php
                                        $current_year = date("Y");
                                    @endphp
                                    @for($year=$current_year; $year<=$current_year +1 ;$year++)
                                        <option value="{{ $year}}">{{ $year }}</option>
                                    @endfor
                                </select>
                            </div>
                        </div>
                    </div>
                    <button type="submit" class="btn btn-success">@lang('site.save')</button>
                </form>
            </div>
        </div>
    </div>
</div>
<!-- row closed -->
@endsection
@section('js')
@toastr_js
@toastr_render
@endsection


