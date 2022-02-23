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
                                            <form method="post" action="{{ route('uploadAttachment') }}" enctype="multipart/form-data">
                                                @csrf
                                                <div class="row">
                                                    <div class="col-md-2">
                                                        <div class="form-group">
                                                            <label>@lang('site.attachments'): <span class="text-danger">*</span></label>
                                                            <input type="file" accept="image/*" name="photos[]" multiple required>
                                                            <input type="hidden" name="student_name" value="{{$student->name}}">
                                                            <input type="hidden" name="student_id" value="{{$student->id}}">
                                                        </div>
                                                    </div>
                                                    <div class="col-md-3">
                                                        <label style="visibility: hidden;display: block">.</label>
                                                        <button type="submit" class="btn btn-sm btn-outline-success" style="width: 120px">
                                                            @lang('site.save')
                                                        </button>
                                                    </div>
                                                </div>
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
                                                        href="{{url('download_attachment')}}/{{ $attachment->imageable->setLocale('ar')->name }}/{{$attachment->file_name}}"
                                                        role="button"><i class="fa fa-download"></i>&nbsp; @lang('site.download')</a>

                                                        <button type="button" class="btn btn-sm  btn-outline-primary" data-toggle="modal" data-target="#show_{{ $attachment->id }}">
                                                        @lang('site.show_image')
                                                        </button>


                                                        <form method="POST" action="{{ route('delete_attachment', $attachment->id)}}" style="display: inline-block"> @csrf
                                                            <button type="submit" class="btn btn-outline-danger btn-sm deleteBtn"><i class="fa fa-trash"></i> @lang('site.delete')</button>
                                                            <input type="hidden" value="{{ $attachment->imageable->name }}" name="student_name" />
                                                            <input type="hidden" value="{{ $attachment->imageable->id }}"   name="student_id" />
                                                            <input type="hidden" value="{{ $attachment->file_name }}"   name="file_name" />
                                                        </form>
<!-- Modal -->
                                                        <div class="modal fade" id="show_{{ $attachment->id }}" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                                            <div class="modal-dialog" role="document">
                                                            <div class="modal-content">
                                                                <div class="modal-header">
                                                                <h5 class="modal-title" id="exampleModalLabel"> @lang('site.images') {{ $attachment->imageable->name }}</h5>
                                                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                                    <span aria-hidden="true">&times;</span>
                                                                </button>
                                                                </div>
                                                                <div class="modal-body">
                                                                    <img src="{{ URL::asset('images/students/'. $attachment->imageable->setLocale('ar')->name .'/' . $attachment->file_name) }}" class="img-thumbnail" width="80%"/>
                                                                    <img src="{{ URL::asset('images/students/'. $attachment->imageable->setLocale('en')->name .'/' . $attachment->file_name) }}" class="img-thumbnail" width="80%"/>

                                                                </div>
                                                            </div>
                                                            </div>
                                                        </div>
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
