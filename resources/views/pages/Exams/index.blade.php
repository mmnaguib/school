@extends('layouts.master')
@section('css')
    @toastr_css
@section('title')
    قائمة الامتحانات
@stop
@endsection
@section('page-header')
    <!-- breadcrumb -->
@section('PageTitle')
    قائمة الامتحانات
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
                                <a href="{{route('exams.create')}}" class="btn btn-success btn-sm" role="button"
                                   aria-pressed="true">اضافة امتحان جديد</a><br><br>
                                <div class="table-responsive">
                                    <table id="datatable" class="table  table-hover table-sm table-bordered p-0"
                                        data-page-length="50"
                                        style="text-align: center">
                                        <thead>
                                        <tr>
                                            <th>#</th>
                                            <th>@lang('site.exam_name')</th>
                                            <th>@lang('site.term')</th>
                                            <th>@lang('site.actions')</th>
                                        </tr>
                                        </thead>
                                        <tbody>
                                        @foreach($exams as $exam)
                                            <tr>
                                                <td>{{ $loop->iteration}}</td>
                                                <td>{{$exam->name}}</td>
                                                <td>{{$exam->term}}</td>
                                                <td>
                                                    <a href="{{route('exams.edit',$exam->id)}}"
                                                    class="btn btn-info btn-sm" role="button" aria-pressed="true"><i
                                                            class="fa fa-edit"></i></a>
                                                    <form method="POST" action="{{ route('exams.destroy', $exam->id) }}" style="display: inline-block"> @csrf @method('DELETE')
                                                        <button type="submit" class="btn btn-block btn-danger btn-sm deleteBtn"><i class="fa fa-trash"></i> </button>
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
