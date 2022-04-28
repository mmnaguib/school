@extends('layouts.master')
@section('css')
    @toastr_css
@section('title')
    @lang('site.new_meeting')
@stop
@endsection
@section('page-header')
    <!-- breadcrumb -->
@section('PageTitle')
    @lang('site.new_meeting')
@stop
<!-- breadcrumb -->
@endsection
@section('content')
    <!-- row -->
    <div class="row">
        <div class="col-md-12 mb-30">
            <h4>@lang('site.new_meeting')</h4>
            <div class="card card-statistics h-100">
                <div class="card-body">
                    @include('partials._errors')
                    <div class="col-xs-12">
                        <div class="col-md-12">
                            <form action="{{route('zoom.store')}}" method="post" autocomplete="off">
                                @csrf
                                <div class="row">
                                    <div class="col-md-4">
                                        <label>@lang('site.grades')</label>
                                        <select name="grades" class="form-control">
                                            @foreach ($grades as $grade)
                                                <option value="{{ $grade->id }}">{{ $grade->name }}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                    <div class="col-md-4">
                                        <label>@lang('site.classroom')</label>
                                        <select name="classrooms" class="form-control">

                                        </select>
                                    </div>
                                    <div class="col-md-4">
                                        <label>@lang('site.sections')</label>
                                        <select name="sections" class="form-control">

                                        </select>
                                    </div>
                                </div>
                                <br>
                                <div class="row">
                                    <div class="col-md-4">
                                        <label>@lang('site.meeting_title')</label>
                                        <input type="text" class="form-control" name="title" />
                                    </div>
                                    <div class="col-md-4">
                                        <label>@lang('site.date_time')</label>
                                        <input type="datetime-local" class="form-control" name="date_time" />
                                    </div>
                                    <div class="col-md-4">
                                        <label>@lang('site.meeting_minits')</label>
                                        <input type="number" class="form-control" name="meeting_time" />
                                    </div>
                                </div>
                                <button class="btn btn-success btn-sm nextBtn btn-lg pull-right" type="submit">حفظ البيانات</button>
                            </form>
                        </div>
                    </div>
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
