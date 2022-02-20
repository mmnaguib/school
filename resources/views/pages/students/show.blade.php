@extends('layouts.master')
@section('css')
    @toastr_css
@section('title')
    @lang('site.student_details')
@stop
@endsection
@section('page-header')
    <!-- breadcrumb -->
@section('PageTitle')
    @lang('site.student_details')
@stop
<!-- breadcrumb -->
@endsection
@section('content')
    <!-- row -->
    <div class="row">
        <div class="col-md-12 mb-30">
            <div class="card card-statistics h-100">
                <div class="card-body">
                    <div class="card-body">
                        <div class="tab nav-border">
                            <ul class="nav nav-tabs" role="tablist">
                                <li class="nav-item">
                                    <a class="nav-link active show" id="home-02-tab" data-toggle="tab" href="#home-02"
                                       role="tab" aria-controls="home-02"
                                       aria-selected="true">@lang('site.student_details')</a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link" id="profile-02-tab" data-toggle="tab" href="#profile-02"
                                       role="tab" aria-controls="profile-02"
                                       aria-selected="false">@lang('site.attachments')</a>
                                </li>
                            </ul>
                            <div class="tab-content">
                                <div class="tab-pane fade active show" id="home-02" role="tabpanel"
                                     aria-labelledby="home-02-tab">
                                    <table class="table table-striped table-hover" style="text-align:center">
                                        <tbody>
                                        <tr>
                                            <th scope="row">@lang('site.student_name')</th>
                                            <td>{{ $student->name }}</td>
                                            <th scope="row">@lang('site.email')</th>
                                            <td>{{$student->email}}</td>
                                            <th scope="row">@lang('site.gender')</th>
                                            <td>{{$student->genders->name}}</td>
                                            <th scope="row">@lang('site.nationality')</th>
                                            <td>{{$student->nationalities->name}}</td>
                                        </tr>

                                        <tr>
                                            <th scope="row">@lang('site.grade_name')</th>
                                            <td>{{ $student->grades->name }}</td>
                                            <th scope="row">@lang('site.classroom_name')</th>
                                            <td>{{$student->classrooms->classroom_name}}</td>
                                            <th scope="row">@lang('site.section_name')</th>
                                            <td>{{$student->sections->section_name}}</td>
                                            <th scope="row">@lang('site.date_birthday')</th>
                                            <td>{{ $student->birthdate}}</td>
                                        </tr>

                                        <tr>
                                            <th scope="row">@lang('site.parents')</th>
                                            <td>{{ $student->parents->father_name}}</td>
                                            <th scope="row">@lang('site.academic_year')</th>
                                            <td>{{ $student->academic_year }}</td>
                                            <th scope="row"></th>
                                            <td></td>
                                            <th scope="row"></th>
                                            <td></td>
                                        </tr>
                                        </tbody>
                                    </table>
                                </div>

                                <div class="tab-pane fade" id="profile-02" role="tabpanel"
                                    aria-labelledby="profile-02-tab">
                                    <div class="card card-statistics">
                                        <div class="card-body">
                                            <form method="post" action="" enctype="multipart/form-data">
                                                {{ csrf_field() }}
                                                <div class="col-md-3">
                                                    <div class="form-group">
                                                        <label
                                                            for="academic_year">@lang('site.attachments')
                                                            : <span class="text-danger">*</span></label>
                                                        <input type="file" accept="image/*" name="photos[]" multiple required>
                                                        <input type="hidden" name="student_name" value="{{$student->name}}">
                                                        <input type="hidden" name="student_id" value="{{$student->id}}">
                                                    </div>
                                                </div>
                                                <br><br>
                                                <button type="submit" class="button button-border x-small">
                                                    @lang('site.save')
                                                </button>
                                            </form>
                                        </div>
                                        <br>
                                        <table class="table center-aligned-table mb-0 table table-hover"
                                            style="text-align:center">
                                            <thead>
                                            <tr class="table-secondary">
                                                <th scope="col">#</th>
                                                <th scope="col">@lang('site.filename')</th>
                                                <th scope="col">@lang('site.created_at')</th>
                                                <th scope="col">@lang('site.actions')</th>
                                            </tr>
                                            </thead>
                                            <tbody>
                                            @foreach($student->images as $attachment)
                                                <tr style='text-align:center;vertical-align:middle'>
                                                    <td>{{$loop->iteration}}</td>
                                                    <td>{{$attachment->file_name}}</td>
                                                    <td>{{$attachment->created_at->diffForHumans()}}</td>
                                                    <td colspan="2">
                                                        <a class="btn btn-outline-info btn-sm"
                                                        href="{{url('Download_attachment')}}/{{ $attachment->imageable->name }}/{{$attachment->filename}}"
                                                        role="button"><i class="fa fa-download"></i>&nbsp; @lang('site.download')</a>

                                                        <button type="button" class="btn btn-outline-danger btn-sm"
                                                                data-toggle="modal"
                                                                data-target="#Delete_img{{ $attachment->id }}"
                                                                title="{{ trans('Grades_trans.Delete') }}">@lang('site.delete')
                                                        </button>

                                                    </td>
                                                </tr>
                                            @endforeach
                                            </tbody>
                                        </table>
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
