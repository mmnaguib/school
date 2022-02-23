@extends('layouts.master')
@section('css')

@section('title')
    @lang('site.add_student')
@stop
@endsection
@section('page-header')
<!-- breadcrumb -->
<div class="page-title">
    <div class="row">
        <div class="col-sm-6">
            <h4 class="mb-0"> @lang('site.add_student')</h4>
        </div>
        <div class="col-sm-6">
            <ol class="breadcrumb pt-0 pr-0 float-left float-sm-right ">
                <li class="breadcrumb-item"><a href="#" class="default-color">@lang('site.dashboard')</a></li>
                <li class="breadcrumb-item"><a href="#" class="default-color">@lang('site.students')</a></li>
                <li class="breadcrumb-item active">@lang('site.add_student')</li>
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
                @include('partials._errors')
                <form method="POST" action="{{ route('students.store') }}" enctype="multipart/form-data"> @csrf
                <p>@lang('site.personal_information')</p>
                <div class="row">
                    @foreach(config('translatable.locales') as $locale)
                        <div class="col-md-6">
                            <div class="form-group">
                                <label>@lang('site.' .$locale. '.student_name')</label>
                                <input type="text" name="{{ $locale}}_student_name" class="form-control" />
                            </div>
                        </div>
                    @endforeach
                </div>
                <div class="row">
                    <div class="col-md-6">
                        <div class="form-group">
                            <label>@lang('site.email')</label>
                            <input type="text" name="email" class="form-control" />
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group">
                            <label>@lang('site.password')</label>
                            <input type="password" name="password" class="form-control" />
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-3">
                        <div class="form-group">
                            <label>@lang('site.gender')</label>
                            <select name="gender" class="form-control">
                                <option selected value="">@lang('site.gender')</option>
                                @foreach ($genders as $gender)
                                    <option value="{{ $gender->id }}">{{ $gender->name }}</option>
                                @endforeach
                            </select>
                        </div>
                    </div>
                    <div class="col-md-3">
                        <div class="form-group">
                            <label>@lang('site.nationality')</label>
                            <select name="nationality" class="form-control">
                                <option selected value="">@lang('site.nationality')</option>
                                @foreach ($nationalities as $nationality)
                                    <option value="{{ $nationality->id }}">{{ $nationality->name }}</option>
                                @endforeach
                            </select>
                        </div>
                    </div>
                    <div class="col-md-3">
                        <div class="form-group">
                            <label>@lang('site.bloodType')</label>
                            <select name="bloodType" class="form-control">
                                <option selected value="">@lang('site.bloodType')</option>
                                @foreach ($bloods as $blood)
                                    <option value="{{ $blood->id }}">{{ $blood->name }}</option>
                                @endforeach
                            </select>
                        </div>
                    </div>
                    <div class="col-md-3">
                        <div class="form-group">
                            <label>@lang('site.date_bithday')</label>
                            <input type="date" class="form-control" name="date_bithday" />
                        </div>
                    </div>
                </div>
                <p>@lang('site.student_information')</p>
                <div class="row">
                    <div class="col-md-6">
                        <div class="row">
                            <div class="col-md-4">
                                <div class="form-group">
                                    <label>@lang('site.grades')</label>
                                    <select name="grades" class="form-control">
                                        <option selected value="">@lang('site.grades')</option>
                                        @foreach ($grades as $grade)
                                            <option value="{{ $grade->id }}">{{ $grade->name }}</option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="form-group">
                                    <label>@lang('site.classroom')</label>
                                    <select name="classrooms" class="form-control">
                                        <option value="">@lang('site.choose_grade')</option>
                                    </select>
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="form-group">
                                    <label>@lang('site.sections')</label>
                                    <select name="sections" class="form-control">
                                        <option value="">@lang('site.choose_classroom')</option>
                                    </select>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label>@lang('site.parents')</label>
                                    <select name="parent" class="form-control">
                                        <option selected value="">@lang('site.parents')</option>
                                        @foreach ($parents as $parent)
                                            <option value="{{ $parent->id }}">{{ $parent->father_name }}</option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>
                            <div class="col-md-6">
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
                    </div>
                </div>
                <div class="row">
                    <div class="form-group">
                        <label class="col-md-12">@lang('site.attachments')</label>
                        <div class="col-md-12"><input type="file" accept="image/*" multiple name="photos[]"/></div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-12">
                        <button type="submit" class="btn btn-primary">@lang('site.save')</button>
                    </div>
                </div>
                </form>
            </div>
        </div>
    </div>
</div>
<!-- row closed -->
@endsection
@section('js')

@endsection
