@extends('layouts.master')
@section('css')

@section('title')
    @lang('site.attendance')
@stop
@endsection
@section('page-header')
<!-- breadcrumb -->
<div class="page-title">
    <div class="row">
        <div class="col-sm-6">
            <h4 class="mb-0">@lang('site.attendance') {{ date('Y-m-d') }}</h4>
        </div>
        <div class="col-sm-6">
            <ol class="breadcrumb pt-0 pr-0 float-left float-sm-right ">
                <li class="breadcrumb-item"><a href="#" class="default-color">@lang('site.dashboard')</a></li>
                <li class="breadcrumb-item active">@lang('site.attendance')</li>
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
                <form method="POST" action="{{ route('attendance.store') }}">
                @csrf
                <table id="datatable" class="table table-striped table-bordered p-0">
                    <thead>
                        <tr>
                            <td>@lang('site.student_name')</td>
                            <td>@lang('site.email')</td>
                            <td>@lang('site.gender')</td>
                            <td>@lang('site.grade_name')</td>
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
                            <td>

                                @if(isset($student->attendance()->where('attendance_date',date('Y-m-d'))->first()->student_id))

                                    <label class="block text-gray-500 font-semibold sm:border-r sm:pr-4">
                                        <input name="attendences[{{ $student->id }}]" disabled
                                            {{ $student->attendance()->first()->attendance_status == 1 ? 'checked' : '' }}
                                            class="leading-tight" type="radio" value="presence">
                                        <span class="text-success">@lang('site.presence')</span>
                                    </label>

                                    <label class="ml-4 block text-gray-500 font-semibold">
                                        <input name="attendences[{{ $student->id }}]" disabled
                                            {{ $student->attendance()->first()->attendance_status == 0 ? 'checked' : '' }}
                                            class="leading-tight" type="radio" value="absent">
                                        <span class="text-danger">@lang('site.absent')</span>
                                    </label>

                                @else

                                    <label class="block text-gray-500 font-semibold sm:border-r sm:pr-4">
                                        <input name="attendences[{{ $student->id }}]" class="leading-tight" type="radio"
                                            value="presence">
                                        <span class="text-success">@lang('site.presence') </span>
                                    </label>

                                    <label class="ml-4 block text-gray-500 font-semibold">
                                        <input name="attendences[{{ $student->id }}]" class="leading-tight" type="radio"
                                            value="absent">
                                        <span class="text-danger">@lang('site.absent')</span>
                                    </label>

                                @endif

                                <input type="hidden" name="student_id[]" value="{{ $student->id }}">
                                <input type="hidden" name="grade_id" value="{{ $student->grade_id }}">
                                <input type="hidden" name="classroom_id" value="{{ $student->classroom_id }}">
                                <input type="hidden" name="section_id" value="{{ $student->section_id }}">

                            </td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
                        <button class="btn btn-success" type="submit">@lang('site.save')</button>
                </form>
            </div>
        </div>
    </div>
</div>
<!-- row closed -->
@endsection
@section('js')

@endsection
