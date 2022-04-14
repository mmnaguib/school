@extends('layouts.master')
@section('css')
    @toastr_css
@section('title')
    تعديل امتحان
@stop
@endsection
@section('page-header')
    <!-- breadcrumb -->
@section('PageTitle')
تعديل امتحان
@stop
<!-- breadcrumb -->
@endsection
@section('content')
    <!-- row -->
    <div class="row">
        <div class="col-md-12 mb-30">
            <div class="card card-statistics h-100">
                <div class="card-body">

                    @if(session()->has('error'))
                        <div class="alert alert-danger alert-dismissible fade show" role="alert">
                            <strong>{{ session()->get('error') }}</strong>
                            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                    @endif
                    <div class="col-xs-12">
                        <div class="col-md-12">
                            <br>
                            <form action="{{route('exams.update', $exam->id)}}" method="post" autocomplete="off">
                                @csrf @method('PUT')
                                    <div class="row">
                                        @foreach (config('translatable.locales') as $locale)
                                        <div class="col-md-4">
                                            <div class="form-group">
                                                <label>@lang('site.' . $locale . '.exam')</label>
                                                <input type="text" class="form-control" name="{{ $locale }}_exam" id="{{ $locale }}_exam" value="{{ $exam->setLocale($locale)->name }}" />
                                            </div>
                                        </div>
                                        @endforeach
                                        <div class="col-md-4">
                                            <label for="title">الترم</label>
                                            <input type="number" name="term" class="form-control" value="{{ $exam->term }}">
                                        </div>
                                    </div>

                                <div class="form-row">
                                    <div class="form-group col">
                                        <label for="academic_year">{{trans('Students_trans.academic_year')}} : <span class="text-danger">*</span></label>
                                        <select class="custom-select mr-sm-2" name="academic_year">
                                            <option selected disabled>@lang('site.choose')</option>
                                            @php
                                                $current_year = date("Y");
                                            @endphp
                                            @for($year=$current_year; $year<=$current_year +1 ;$year++)
                                                <option value="{{$year}}" {{$year == $exam->academic_year ?'selected':''}}>{{ $year }}</option>
                                            @endfor
                                        </select>
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
    <script>
        $(document).ready(function () {
            $('select[name="Grade_id"]').on('change', function () {
                var Grade_id = $(this).val();
                if (Grade_id) {
                    $.ajax({
                        url: "{{ URL::to('classes') }}/" + Grade_id,
                        type: "GET",
                        dataType: "json",
                        success: function (data) {
                            $('select[name="Class_id"]').empty();
                            $.each(data, function (key, value) {
                                $('select[name="Class_id"]').append('<option value="' + key + '">' + value + '</option>');
                            });
                        },
                    });
                } else {
                    console.log('AJAX load did not work');
                }
            });
        });
    </script>
@endsection
