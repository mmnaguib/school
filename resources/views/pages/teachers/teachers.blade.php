@extends('layouts.master')
@section('css')
@toastr_css
@section('title')
    @lang('site.teachers')
@stop
@endsection
@section('page-header')
<!-- breadcrumb -->
<div class="page-title">
    <div class="row">
        <div class="col-sm-6">
            <h4 class="mb-0"> @lang('site.teachers')</h4>
        </div>
        <div class="col-sm-6">
            <ol class="breadcrumb pt-0 pr-0 float-left float-sm-right ">
                <li class="breadcrumb-item"><a href="#" class="default-color">@lang('site.dashboard')</a></li>
                <li class="breadcrumb-item active">@lang('site.teachers')</li>
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
                <a href="{{ route('teachers.create') }}" class="btn btn-primary btn-sm">@lang('site.new_teacher')</a>
                <table id="datatable" class="table table-striped table-bordered p-0">
                    <thead>
                        <tr>
                            <th>#</th>
                            <th>@lang('site.teacher_name')</th>
                            <th>@lang('site.specialization')</th>
                            <th>@lang('site.joining_date')</th>
                            <th>@lang('site.address')</th>
                            <th>@lang('site.gender')</th>
                            <th>@lang('site.actions')</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($teachers as $index=>$teacher)
                            <tr>
                                <td>{{ $index+1 }}</td>
                                <td>{{ $teacher->name }}</td>
                                <td>{{ $teacher->specializations->name }}</td>
                                <td>{{ $teacher->joining_date }}</td>
                                <td>{{ $teacher->address }}</td>
                                <td>{{ $teacher->genders->name }}</td>
                                <td>
                                    <a class="btn btn-info btn-sm" href="{{ route('teachers.edit', $teacher->id) }}"><i class="fa fa-edit"></i> @lang('site.edit')</a>
                                    <form method="POST" action="{{ route('teachers.destroy', $teacher->id) }}" style="display: inline-block"> @csrf @method('DELETE')
                                        <button type="submit" class="btn btn-danger btn-sm deleteBtn"><i class="fa fa-trash"></i> @lang('site.delete')</button>
                                    </form>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
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
