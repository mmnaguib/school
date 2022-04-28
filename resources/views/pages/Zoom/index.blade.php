@extends('layouts.master')
@section('css')
    @toastr_css
@section('title')
    @lang('site.quizes')
@stop
@endsection
@section('page-header')
    <!-- breadcrumb -->
@section('PageTitle')
    @lang('site.quizes')
@stop
<!-- breadcrumb -->
@endsection
@section('content')
    <!-- row -->
    <div class="row">
        <div class="col-md-12 mb-30">
            <div class="card card-statistics h-100">
                <div class="card-body">
                    <div class="col-xl-12 mb-30">
                        <div class="card card-statistics h-100">
                            <div class="card-body">
                                <a href="{{route('zoom.create')}}" class="btn btn-success btn-sm" role="button"
                                aria-pressed="true">@lang('site.new_meeting')</a><br><br>
                                <div class="table-responsive">
                                    <table id="datatable" class="table  table-hover table-sm table-bordered p-0"
                                        data-page-length="50"
                                        style="text-align: center">
                                        <thead>
                                        <tr>
                                            <th>#</th>
                                            <th>@lang('site.grade_name')</th>
                                            <th>@lang('site.classroom_name')</th>
                                            <th>@lang('site.section_name')</th>
                                            <th>@lang('site.teacher_name')</th>
                                            <th>@lang('site.meeting_title')</th>
                                            <th>@lang('site.date_time')</th>
                                            <th>@lang('site.meeting_minits')</th>
                                            <th>@lang('site.meeting_link')</th>
                                            <th>@lang('site.actions')</th>
                                        </tr>
                                        </thead>
                                        <tbody>
                                        @foreach($zooms as $zoom)
                                            <tr>
                                                <td></td>
                                                <td></td>
                                                <td>{{$zoom->teacher->name}}</td>
                                                <td></td>
                                                <td></td>
                                                <td></td>
                                                <td></td>
                                                <td>
                                                    <a href="{{route('quizes.edit',$quiz->id)}}"
                                                    class="btn btn-info btn-sm" role="button" aria-pressed="true"><i
                                                            class="fa fa-edit"></i>
                                                    </a>
                                                    <form method="POST" action="{{ route('quizes.destroy', $quiz->id) }}" style="display: inline-block"> @csrf @method('DELETE')
                                                        <button type="submit" class="btn btn-block btn-danger btn-sm deleteBtn"><i class="fa fa-trash"></i></button>
                                                    </form>
                                                </td>
                                            </tr>
                                        @endforeach
                                    </table>
                                </div>
                            </div>
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
