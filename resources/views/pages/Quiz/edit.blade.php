@extends('layouts.master')
@section('css')
    @toastr_css
@section('title')
    تعديل اختبار {{$quiz->name}}
@stop
@endsection
@section('page-header')
    <!-- breadcrumb -->
@section('PageTitle')
    تعديل اختبار {{$quiz->name}}
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
                            <form action="{{route('quizes.update', $quiz->id)}}" method="post">
                                @csrf
                                @method('PUT')
                                <div class="row">
                                    @foreach(config('translatable.locales') as $locale)
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label>@lang('site.' .$locale. '.quiz')</label>
                                                <input type="text" name="{{ $locale}}_quiz" class="form-control" value="{{ $quiz->setLocale($locale)->name }}"/>
                                            </div>
                                        </div>
                                    @endforeach
                                </div>
                                <br>

                                <div class="form-row">

                                    <div class="col">
                                        <div class="form-group">
                                            <label for="Grade_id">المادة الدراسية : <span class="text-danger">*</span></label>
                                            <select class="custom-select mr-sm-2" name="subject_id">
                                                @foreach($subjects as $subject)
                                                    <option value="{{ $subject->id }}" {{$subject->id == $quiz->subject_id ? "selected":""}}>{{ $subject->name }}</option>
                                                @endforeach
                                            </select>
                                        </div>
                                    </div>

                                    <div class="col">
                                        <div class="form-group">
                                            <label for="Grade_id">اسم المعلم : <span class="text-danger">*</span></label>
                                            <select class="custom-select mr-sm-2" name="teacher_id">
                                                @foreach($teachers as $teacher)
                                                    <option  value="{{ $teacher->id }}" {{$teacher->id == $quiz->teacher_id ? "selected":""}}>{{ $teacher->name }}</option>
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
                                                @foreach($grades as $grade)
                                                    <option  value="{{ $grade->id }}" {{$grade->id == $quiz->grade_id ? "selected":""}}>{{ $grade->name }}</option>
                                                @endforeach
                                            </select>
                                        </div>
                                    </div>

                                    <div class="col">
                                        <div class="form-group">
                                            <label for="Classroom_id">@lang('site.classroom_name') : <span class="text-danger">*</span></label>
                                            <select class="custom-select mr-sm-2" name="classrooms">
                                                <option value="{{$quiz->classroom_id}}">{{$quiz->classroom->classroom_name}}</option>                                            </select>
                                        </div>
                                    </div>

                                    <div class="col">
                                        <div class="form-group">
                                            <label for="section_id">@lang('site.section_name') </label>
                                            <select class="custom-select mr-sm-2" name="sections">
                                                <option value="{{$quiz->section_id}}">{{$quiz->section->section_name}}</option>
                                            </select>
                                        </div>
                                    </div>
                                </div><br>
                                <button class="btn btn-success btn-sm nextBtn btn-lg pull-right" type="submit">تاكيد البيانات</button>
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
