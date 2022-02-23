@extends('layouts.master')
@section('css')

@section('title')
    @lang('site.graduated_students')
@stop
@endsection
@section('page-header')
<!-- breadcrumb -->
<div class="page-title">
    <div class="row">
        <div class="col-sm-6">
            <h4 class="mb-0"> @lang('site.graduated_students')</h4>
        </div>
        <div class="col-sm-6">
            <ol class="breadcrumb pt-0 pr-0 float-left float-sm-right ">
                <li class="breadcrumb-item"><a href="#" class="default-color">@lang('site.dashboard')</a></li>
                <li class="breadcrumb-item"><a href="#" class="default-color">@lang('site.students')</a></li>
                <li class="breadcrumb-item active">@lang('site.graduated_students')</li>
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
                <a href="{{ route('graduated.create') }}" class="btn btn-primary btn-sm">@lang('site.add_graduated_students')</a>
                <table id="datatable" class="table table-striped table-bordered p-0">
                    <thead>
                        <tr>
                            <td>@lang('site.student_name')</td>

                            <td>@lang('site.email')</td>
                            <td>@lang('site.gender')</td>
                            <td>@lang('site.grades')</td>
                            <td>@lang('site.classroom_name')</td>
                            <td>@lang('site.section_name')</td>

                            <td>@lang('site.actions')</td>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($students as $student)
                        <tr>
                            <td>{{ $student->name }}</td>
                            <td>{{ $student->email }}</td>
                            <td>{{ $student->genders->name }}</td>
                            <td>{{ $student->grades->name }}</td>
                            <td>{{ $student->classrooms->classroom_name }}</td>
                            <td>{{ $student->sections->section_name }}</td>
                            <th>
                                <a class="btn btn-info btn-sm" href="{{ route('graduated.edit', $student->id) }}">  @lang('site.student_back')</a>
                                <form method="POST" action="{{ route('graduated.destroy', $student->id) }}" style="display: inline-block"> @csrf @method('DELETE')
                                    <button type="submit" class="btn btn-danger btn-sm deleteBtn"> @lang('site.delete') </button>
                                </form>
                            </th>
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

@endsection
