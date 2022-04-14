@extends('layouts.master')
@section('css')
    @toastr_css
@endsection
@section('title')
    @lang('site.attendance')
@stop
@section('content')
<!-- row -->
<div class="row">
    <div class="col-md-12 mb-30">
        <div class="card card-statistics h-100">
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
                                                                            <a href="{{ route('attendance.show', $list_Sections->id) }}" class="btn btn-sm btn-warning">@lang('site.students')</a>
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
                        @endforeach
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
