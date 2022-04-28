@extends('layouts.master')
@section('css')
    @toastr_css
@section('title')
    اضافة اختبار جديد
@stop
@endsection
@section('page-header')
    <!-- breadcrumb -->
@section('PageTitle')
    اضافة اختبار جديد
@stop
<!-- breadcrumb -->
@endsection
@section('content')
    <!-- row -->
    <div class="row">
        <div class="col-md-12 mb-30">
            <div class="card card-statistics h-100">
                <div class="card-body">

                    @include('partials._errors')
                    <div class="col-xs-12">
                        <div class="col-md-12">
                            <br>
                            <form action="{{route('quizes.store')}}" method="post" autocomplete="off">
                                @csrf

                                <div class="row">
                                    @foreach (config('translatable.locales') as $locale)
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label>@lang('site.' . $locale . '.quiz')</label>
                                            <input type="text" class="form-control" name="{{ $locale }}_quiz" id="{{ $locale }}_quiz" value="{{ old('name') }}" />
                                        </div>
                                    </div>
                                    @endforeach
                                </div>
                                <br>

                                <div class="form-row">

                                    <div class="col">
                                        <div class="form-group">
                                            <label for="Grade_id">@lang('site.subject') : <span class="text-danger">*</span></label>
                                            <select class="custom-select mr-sm-2" name="subject_id">
                                                <option selected disabled>@lang('site.choose')</option>
                                                @foreach($subjects as $subject)
                                                    <option  value="{{ $subject->id }}">{{ $subject->name }}</option>
                                                @endforeach
                                            </select>
                                        </div>
                                    </div>

                                    <div class="col">
                                        <div class="form-group">
                                            <label for="Grade_id">@lang('site.teacher_name') : <span class="text-danger">*</span></label>
                                            <select class="custom-select mr-sm-2" name="teacher_id">
                                                <option selected disabled>@lang('site.choose')</option>
                                                @foreach($teachers as $teacher)
                                                    <option  value="{{ $teacher->id }}">{{ $teacher->name }}</option>
                                                @endforeach
                                            </select>
                                        </div>
                                    </div>

                                </div>

                                <div class="form-row">

                                    <div class="col">
                                        <div class="form-group">
                                            <label for="Grade_id">@lang('site.grade_name') : <span class="text-danger">*</span></label>
                                            <select class="custom-select mr-sm-2" name="grades">
                                                <option selected disabled>@lang('site.choose')</option>
                                                @foreach($grades as $grade)
                                                    <option  value="{{ $grade->id }}">{{ $grade->name }}</option>
                                                @endforeach
                                            </select>
                                        </div>
                                    </div>

                                    <div class="col">
                                        <div class="form-group">
                                            <label for="Classroom_id">@lang('site.classroom_name') : <span class="text-danger">*</span></label>
                                            <select class="custom-select mr-sm-2" name="classrooms">

                                            </select>
                                        </div>
                                    </div>

                                    <div class="col">
                                        <div class="form-group">
                                            <label for="section_id">@lang('site.section_name') : </label>
                                            <select class="custom-select mr-sm-2" name="sections">

                                            </select>
                                        </div>
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
