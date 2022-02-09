@extends('layouts.master')
@section('css')
@toastr_css
@section('title')
    @lang('site.sections')
@stop
@endsection
@section('page-header')
<!-- breadcrumb -->
<div class="page-title">
    <div class="row">
        <div class="col-sm-6">
            <h4 class="mb-0"> @lang('site.sections')</h4>
        </div>
        <div class="col-sm-6">
            <ol class="breadcrumb pt-0 pr-0 float-left float-sm-right ">
                <li class="breadcrumb-item"><a href="#" class="default-color">Home</a></li>
                <li class="breadcrumb-item active">@lang('site.sections')</li>
            </ol>
        </div>
    </div>
</div>
<!-- breadcrumb -->
@endsection
@section('content')
<!-- row -->
<div class="row">
    @include('partials._errors')
    <div class="col-md-12 mb-30">
        <div class="card card-statistics h-100">
            <div class="card-body">
                <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#add_section">
                @lang('site.new_section')
                </button>
                {{ dd($grades) }}
                <div class="accordion gray plus-icon round">
                    @foreach ($grades as $grade_list)
                    <div class="acd-group">
                        <a href="#" class="acd-heading">{{ $grade_list->name }}</a>
                        <div class="acd-des">
                            <table id="datatable" class="table table-striped table-bordered p-0">
                                <thead>
                                    <tr>
                                        <th>#</th>
                                        <th>@lang('site.section_name')</th>
                                        <th>@lang('site.classroom_name')</th>
                                        <th>@lang('site.actions')</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($grades as $index => $section)
                                    <tr>
                                        <td>{{ $index + 1 }}</td>
                                        <td></td>
                                        <td></td>
                                        <td>
                                            <button type="button" class="btn btn-info btn-sm" data-toggle="modal" data-target="#edit_section{{ $section->id }}">
                                                <i class="fa fa-edit"></i> @lang('site.edit')
                                            </button>
                                            <form method="POST" action="{{ route('sections.destroy', $section->id) }}"
                                                style="display: inline-block"> @csrf @method('DELETE')
                                                <button type="submit" class="btn btn-danger btn-sm deleteBtn"><i
                                                        class="fa fa-trash"></i> @lang('site.delete')</button>
                                            </form>
                                        </td>
                                        <div class="modal fade" id="edit_section{{ $section->id }}" tabindex="-1" aria-labelledby="exampleModalLabel"
                                        aria-hidden="true">
                                            <div class="modal-dialog">
                                                <div class="modal-content">
                                                    <div class="modal-header">
                                                        <h5 class="modal-title" id="exampleModalLabel">@lang('site.new_classroom')</h5>
                                                        <button type="button" class="btn btn-close" data-dismiss="modal"
                                                            aria-label="Close"><span aria-hidden="true">&times;</span></button>
                                                    </div>
                                                    <form method="post" action="{{ route('sections.update', $section->id) }}"> @csrf @method('PUT')
                                                        <div class="modal-body">
                                                        </div>
                                                        <div class="modal-footer">
                                                            <button type="button" class="btn btn-sm btn-secondary"
                                                                data-dismiss="modal">@lang('site.close')</button>
                                                            <button type="submit" class="btn btn-sm btn-info">@lang('site.edit')</button>
                                                        </div>
                                                    </form>
                                                </div>
                                            </div>
                                        </div>
                                    </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>
                    @endforeach
                </div>
                <div class="modal fade" id="add_section" tabindex="-1" aria-labelledby="exampleModalLabel"
                    aria-hidden="true">
                    <div class="modal-dialog">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h5 class="modal-title" id="exampleModalLabel">@lang('site.new_section')</h5>
                                <button type="button" class="btn btn-close" data-dismiss="modal"
                                    aria-label="Close"><span aria-hidden="true">&times;</span></button>
                            </div>
                            <form method="post" action="{{ route('sections.store') }}"> @csrf
                                <div class="modal-body">
                                    <div class="row">
                                        @foreach (config('translatable.locales') as $locale)
                                            <div class="col-md-6">
                                                <label class="col-md-12">@lang('site.' .
                                                    $locale . '.section')</label>
                                                <input type="text"
                                                    name="{{ $locale }}_name"
                                                    class="form-control" />
                                            </div>
                                        @endforeach
                                        <div class="col-md-12">
                                            <label
                                                class="col-md-12">@lang('site.grade_name')</label>
                                            <select name="grades" class="form-control custom-select" onchange="$(this).val()">
                                                <option value="" disabled selected>@lang('site.grades')</option>
                                                @foreach ($grades as $grade)
                                                    <option value="{{ $grade->id }}">
                                                        {{ $grade->name }}</option>
                                                @endforeach
                                            </select>
                                        </div>
                                        <div class="col-md-12">
                                            <label
                                                class="col-md-12">@lang('site.classroom_name')</label>
                                            <select name="classrooms" class="form-control custom-select">
                                                <option></option>
                                            </select>
                                        </div>
                                    </div>
                                </div>
                                <div class="modal-footer">
                                    <button type="button" class="btn btn-sm btn-secondary"
                                        data-dismiss="modal">@lang('site.close')</button>
                                    <button type="submit" class="btn btn-sm btn-success">@lang('site.save')</button>
                                </div>
                            </form>
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

<script>
    $(document).ready(function() {
        $('select[name="grades"]').on('change', function () {
            var grade_id = $(this).val();
            if(grade_id){
                $.ajax({
                    url: "{{ URL::to('classes') }}/" + grade_id,
                    type: "GET",
                    dataType: "json",
                    success: function(data) {
                        $('select[name="classrooms"]').empty();
                        $.each(data, function(key, value){
                            $('select[name="classrooms"]').append('<option value="' + key + '">'+value+'</option>')
                        })
                    },
                    error: function() {
                        console.log('error ya nerm');
                    }
                });
            }else{
                console.log('erroe');
            }
        })
    })
</script>
@endsection
