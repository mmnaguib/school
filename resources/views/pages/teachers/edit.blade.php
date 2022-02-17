@extends('layouts.master')
@section('css')

@section('title')
    @lang('site.edit_teacher')
@stop
@endsection
@section('page-header')
<!-- breadcrumb -->
<div class="page-title">
    <div class="row">
        <div class="col-sm-6">
            <h4 class="mb-0"> @lang('site.edit_teacher')</h4>
        </div>
        <div class="col-sm-6">
            <ol class="breadcrumb pt-0 pr-0 float-left float-sm-right ">
                <li class="breadcrumb-item"><a href="#" class="default-color">@lang('site.dashboard')</a></li>
                <li class="breadcrumb-item">@lang('site.teachers')</li>
                <li class="breadcrumb-item active">@lang('site.edit_teacher')</li>
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
                <form method="POST" action="{{ route('teachers.update', $teacher->id) }}">@csrf @method('PUT')
                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group">
                                <label>@lang('site.email')</label>
                                <input type="email" name="email" class="form-control" value="{{ $teacher->email }}"/>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label>@lang('site.password')</label>
                                <input type="password" name="password" class="form-control"  value="{{ $teacher->password }}"/>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        @foreach (config('translatable.locales') as $locale)
                            <div class="col-md-6">
                                <label>@lang('site.'.$locale.'.teacher_name')</label>
                                <input type="text" name="{{ $locale }}_name" class="form-control"  value="{{ $teacher->setLocale($locale)->name }}"/>
                            </div>
                        @endforeach
                    </div>
                    <div class="row">
                        <div class="col-md-6">
                            <label>@lang('site.specialization')</label>
                            <select name="specialization" class="form-control">
                                <option value="{{ $teacher->specializations->id }}" selected>{{ $teacher->specializations->name }}</option>
                                @foreach ($specializations as $specialization)
                                    <option value="{{ $specialization->id }}">{{ $specialization->name }}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="col-md-6">
                            <label>@lang('site.gender')</label>
                            <select name="gender" class="form-control">
                                <option value="{{ $teacher->genders->id }}" selected>{{ $teacher->genders->name }}</option>
                                @foreach ($genders as $gender)
                                    <option value="{{ $gender->id }}">{{ $gender->name }}</option>
                                @endforeach
                            </select>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-12">
                            <div class="form-group">
                                <label>@lang('site.joining_date')</label>
                                <input type="date" name="joining_date" class="form-control" value="{{ $teacher->joining_date }}"/>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-12">
                            <div class="form-group">
                                <label>@lang('site.address')</label>
                                <textarea type="address" name="address" class="form-control">{{ $teacher->address }}</textarea>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-12">
                            <button type="submit" class="btn btn-sm btn-info">@lang('site.edit')</button>
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
