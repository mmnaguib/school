@extends('layouts.master')
@section('css')
    @toastr_css
@section('title')
    @lang('site.sections')
@stop
@endsection
@section('page-header')
<!-- breadcrumb -->
@section('PageTitle')
    @lang('site.sections')
@stop
<!-- breadcrumb -->
@endsection
@section('content')
<!-- row -->
<div class="row">
    <div class="col-md-12 mb-30">
        <div class="card card-statistics h-100">
            <div class="card-body">
                <a class="button x-small" href="#" data-toggle="modal" data-target="#add_section">
                    @lang('site.new_section')</a>
            </div>

            @include('partials._errors')
            <div class="card card-statistics h-100">
                <div class="card-body">
                    <div class="accordion gray plus-icon round">

                        @foreach ($Grades as $Grade)
                            <div class="acd-group">
                                <a href="#" class="acd-heading">{{ $Grade->name }}</a>
                                <div class="acd-des">

                                    <div class="row">
                                        <div class="col-xl-12 mb-30">
                                            <div class="card card-statistics h-100">
                                                <div class="card-body">
                                                    <div class="d-block d-md-flex justify-content-between">
                                                        <div class="d-block">
                                                        </div>
                                                    </div>
                                                    <div class="table-responsive mt-15">
                                                        <table class="table center-aligned-table mb-0">
                                                            <thead>
                                                                <tr class="text-dark">
                                                                    <th>#</th>
                                                                    <th>@lang('site.section_name')</th>
                                                                    <th>@lang('site.classroom_name')</th>
                                                                    <th>@lang('site.status')</th>
                                                                    <th>@lang('site.actions')</th>
                                                                </tr>
                                                            </thead>
                                                            <tbody>
                                                                <?php $i = 0; ?>
                                                                @foreach ($Grade->Sections as $list_Sections)
                                                                    <tr>
                                                                        <?php $i++; ?>
                                                                        <td>{{ $i }}</td>
                                                                        <td>{{ $list_Sections->section_name }}</td>
                                                                        <td>{{ $list_Sections->My_classs->classroom_name }}</td>
                                                                        <td>
                                                                            @if ($list_Sections->status === 1)
                                                                                <label
                                                                                    class="badge badge-success">@lang('site.Status_Section_yes')</label>
                                                                            @else
                                                                                <label
                                                                                    class="badge badge-danger">@lang('site.Status_Section_No')</label>
                                                                            @endif

                                                                        </td>
                                                                        <td>

                                                                            <a href="#"
                                                                                class="btn btn-outline-info btn-sm"
                                                                                data-toggle="modal"
                                                                                data-target="#edit{{ $list_Sections->id }}"><i class="fa fa-edit"></i> @lang('site.edit')</a>
                                                                                <form method="POST" action="{{ route('sections.destroy', $list_Sections->id) }}" style="display: inline-block"> @csrf @method('DELETE')
                                                                                    <button type="submit" class="btn btn-danger btn-sm deleteBtn"><i class="fa fa-trash"></i> @lang('site.delete')</button>
                                                                                </form>
                                                                        </td>
                                                                    </tr>


                                                                    <!--تعديل قسم جديد -->
                                                                    <div class="modal fade"
                                                                        id="edit{{ $list_Sections->id }}"
                                                                        tabindex="-1" role="dialog"
                                                                        aria-labelledby="exampleModalLabel"
                                                                        aria-hidden="true">
                                                                        <div class="modal-dialog" role="document">
                                                                            <div class="modal-content">
                                                                                <div class="modal-header">
                                                                                    <h5 class="modal-title"
                                                                                        style="font-family: 'Cairo', sans-serif;"
                                                                                        id="exampleModalLabel">
                                                                                        @lang('site.edit_section')
                                                                                    </h5>
                                                                                    <button type="button"
                                                                                        class="close"
                                                                                        data-dismiss="modal"
                                                                                        aria-label="Close">
                                                                                        <span
                                                                                            aria-hidden="true">&times;</span>
                                                                                    </button>
                                                                                </div>
                                                                                <div class="modal-body">

                                                                                    <form
                                                                                        action="{{ route('sections.update', $list_Sections->id) }}"
                                                                                        method="POST">
                                                                                        {{ method_field('patch') }}
                                                                                        {{ csrf_field() }}
                                                                                        <div class="row">
                                                                                            @foreach (config('translatable.locales') as $locale)
                                                                                            <div class="col">
                                                                                                <input type="text" name="{{ $locale }}_name" class="form-control"
                                                                                                    placeholder="@lang('site.' . $locale . '.section')"
                                                                                                    value="{{ $list_Sections->setLocale($locale)->section_name }}">
                                                                                            </div>
                                                                                            @endforeach

                                                                                        </div>
                                                                                        <br>


                                                                                        <div class="col">
                                                                                            <label for="inputName"
                                                                                                class="control-label">@lang('site.grade_name')</label>
                                                                                            <select name="Grade_id"
                                                                                                class="custom-select"
                                                                                                onclick="console.log($(this).val())">
                                                                                                <!--placeholder-->
                                                                                                <option
                                                                                                    value="{{ $Grade->id }}">
                                                                                                    {{ $Grade->name }}
                                                                                                </option>
                                                                                                @foreach ($list_Grades as $list_Grade)
                                                                                                    <option
                                                                                                        value="{{ $list_Grade->id }}">
                                                                                                        {{ $list_Grade->name }}
                                                                                                    </option>
                                                                                                @endforeach
                                                                                            </select>
                                                                                        </div>
                                                                                        <br>

                                                                                        <div class="col">
                                                                                            <label for="inputName"
                                                                                                class="control-label">@lang('site.classroom_name')</label>
                                                                                            <select name="Class_id"
                                                                                                class="custom-select">
                                                                                                <option
                                                                                                    value="{{ $list_Sections->My_classs->id }}">
                                                                                                    {{ $list_Sections->My_classs->classroom_name }}
                                                                                                </option>
                                                                                            </select>
                                                                                        </div>
                                                                                        <div class="col">
                                                                                            <label for="inputName" class="control-label">@lang('site.teachers')</label>
                                                                                            <select name="teacher_id[]" class="custom-select" multiple>
                                                                                                @foreach ($list_Sections->teachers as $teacher)
                                                                                                    <option selected value="{{ $teacher['id'] }}">{{ $teacher['name'] }}</option>
                                                                                                @endforeach
                                                                                                @foreach ($teachers as $teacher)
                                                                                                    <option value="{{ $teacher->id }}">{{ $teacher->name }}</option>
                                                                                                @endforeach
                                                                                            </select>
                                                                                        </div>
                                                                                        <br>

                                                                                        <div class="col">
                                                                                            <div class="form-check">

                                                                                                @if ($list_Sections->status === 1)
                                                                                                    <input
                                                                                                        type="checkbox"
                                                                                                        checked
                                                                                                        class="form-check-input"
                                                                                                        name="status"
                                                                                                        id="exampleCheck1">
                                                                                                @else
                                                                                                    <input
                                                                                                        type="checkbox"
                                                                                                        class="form-check-input"
                                                                                                        name="status"
                                                                                                        id="exampleCheck1">
                                                                                                @endif
                                                                                                <label
                                                                                                    class="form-check-label"
                                                                                                    for="exampleCheck1">@lang('site.status')</label>
                                                                                            </div>
                                                                                        </div>


                                                                                </div>
                                                                                <div class="modal-footer">
                                                                                    <button type="button"
                                                                                        class="btn btn-secondary"
                                                                                        data-dismiss="modal">@lang('site.close')</button>
                                                                                    <button type="submit"
                                                                                        class="btn btn-info">@lang('site.edit') </button>
                                                                                </div>
                                                                                </form>
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                @endforeach
                                                            </tbody>
                                                        </table>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                        @endforeach
                    </div>
                </div>
            </div>

            <!--اضافة قسم جديد -->
            <div class="modal fade" id="add_section" tabindex="-1" role="dialog"
                aria-labelledby="exampleModalLabel" aria-hidden="true">
                <div class="modal-dialog" role="document">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title" style="font-family: 'Cairo', sans-serif;" id="exampleModalLabel">
                                @lang('site.new_section')</h5>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                        <div class="modal-body">

                            <form action="{{ route('sections.store') }}" method="POST">
                                {{ csrf_field() }}
                                <div class="row">
                                    @foreach (config('translatable.locales') as $locale)
                                    <div class="col">
                                        <input type="text" name="{{ $locale }}_name" class="form-control"
                                            placeholder="@lang('site.' . $locale . '.section')">
                                    </div>
                                    @endforeach
                                </div>
                                <br>


                                <div class="col">
                                    <label for="inputName"
                                        class="control-label">@lang('site.grade_name')</label>
                                    <select name="Grade_id" class="custom-select"
                                        onchange="console.log($(this).val())">
                                        <!--placeholder-->
                                        <option value="" selected disabled>@lang('site.grades')
                                        </option>
                                        @foreach ($list_Grades as $list_Grade)
                                            <option value="{{ $list_Grade->id }}"> {{ $list_Grade->name }}
                                            </option>
                                        @endforeach
                                    </select>
                                </div>
                                <br>

                                <div class="col">
                                    <label for="inputName"
                                        class="control-label">@lang('site.classroom_name')</label>
                                    <select name="Class_id" class="custom-select">

                                    </select>
                                </div>

                                <div class="col">
                                    <label for="inputName" class="control-label">@lang('site.teachers')</label>
                                    <select name="teacher_id[]" class="custom-select" multiple>
                                        @foreach ($teachers as $teacher)
                                            <option value="{{ $teacher->id }}">{{ $teacher->name }}</option>
                                        @endforeach
                                    </select>
                                </div>

                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary"
                                data-dismiss="modal">@lang('site.close')</button>
                            <button type="submit"
                                class="btn btn-success">@lang('site.save')</button>
                        </div>
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
    $(document).ready(function() {
        $('select[name="Grade_id"]').on('change', function() {
            var Grade_id = $(this).val();
            if (Grade_id) {
                $.ajax({
                    url: "{{ URL::to('classes') }}/" + Grade_id,
                    type: "GET",
                    dataType: "json",
                    success: function(data) {
                        $('select[name="Class_id"]').empty();
                        $.each(data, function(key, value) {
                            $('select[name="Class_id"]').append('<option value="' +
                                key + '">' + value + '</option>');
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
