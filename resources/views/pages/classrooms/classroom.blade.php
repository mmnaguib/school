@extends('layouts.master')
@section('css')
    @toastr_css
@section('title')
    @lang('site.classroom')
@stop
@endsection
@section('page-header')
<!-- breadcrumb -->
<div class="page-title">
    <div class="row">
        <div class="col-sm-6">
            <h4 class="mb-0"> @lang('site.classroom') </h4>
        </div>
        <div class="col-sm-6">
            <ol class="breadcrumb pt-0 pr-0 float-left float-sm-right ">
                <li class="breadcrumb-item"><a href="{{ route('home') }}"
                        class="default-color">@lang('site.dashboard')</a></li>
                <li class="breadcrumb-item active">@lang('site.classroom')</li>
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
                <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#add_classroom">
                    @lang('site.new_classroom')
                </button>
                <button type="button" class="btn btn-danger" id="btn_delete_all">
                    @lang('site.delete_selected_rows')
                </button>
                <table id="datatable" class="table table-striped table-bordered p-0">
                    <thead>
                        <tr>
                            <th><input type="checkbox" name="select_all" id="select_all" onclick="checkAll('box', this)"/></th>
                            <th>#</th>
                            <th>@lang('site.classroom_name')</th>
                            <th>@lang('site.grade_name')</th>
                            <th>@lang('site.actions')</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($classes as $index => $class)
                            <tr>
                                <th><input type="checkbox" class="box" value="{{ $class->id }}"/></th>
                                <td>{{ $index + 1 }}</td>
                                <td>{{ $class->classroom_name }}</td>
                                <td>{{ $class->grade->name }}</td>
                                <td>
                                    <button type="button" class="btn btn-info btn-sm" data-toggle="modal" data-target="#edit_classroom{{ $class->id }}">
                                        <i class="fa fa-edit"></i> @lang('site.edit')
                                    </button>
                                    <form method="POST" action="{{ route('classroom.destroy', $class->id) }}"
                                        style="display: inline-block"> @csrf @method('DELETE')
                                        <button type="submit" class="btn btn-danger btn-sm deleteBtn"><i
                                                class="fa fa-trash"></i> @lang('site.delete')</button>
                                    </form>
                                </td>
                                    <div class="modal fade" id="edit_classroom{{ $class->id }}" tabindex="-1" aria-labelledby="exampleModalLabel"
                                    aria-hidden="true">
                                        <div class="modal-dialog">
                                            <div class="modal-content">
                                                <div class="modal-header">
                                                    <h5 class="modal-title" id="exampleModalLabel">@lang('site.new_classroom')</h5>
                                                    <button type="button" class="btn btn-close" data-dismiss="modal"
                                                        aria-label="Close"><span aria-hidden="true">&times;</span></button>
                                                </div>
                                                <form method="post" action="{{ route('classroom.update', $class->id) }}"> @csrf @method('PUT')
                                                    <div class="modal-body">
                                                        <div class="row">
                                                            @foreach (config('translatable.locales') as $locale)
                                                                <div class="col-md-6">
                                                                    <label class="col-md-12">@lang('site.' .
                                                                        $locale . '.classroom')</label>
                                                                    <input type="text"
                                                                        name="{{ $locale }}_name"
                                                                        class="form-control" value="{{ $class->setLocale($locale)->classroom_name }}"/>
                                                                </div>
                                                            @endforeach
                                                            <div class="col-md-12">
                                                                <label
                                                                    class="col-md-12">@lang('site.grade_name')</label>
                                                                <select name="grades" class="form-control">
                                                                    <option value="" disabled selected>@lang('site.grades')</option>
                                                                    @foreach ($grades as $grade)
                                                                    <option {{ ($class->grade_id == $grade->id) ? 'selected' : '' }} value="{{ $grade->id }}">{{ $grade->name }}
                                                                    </option>
                                                                    @endforeach
                                                                </select>
                                                            </div>
                                                        </div>
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
                <!--Add Modal-->
                <div class="modal fade" id="add_classroom" tabindex="-1" aria-labelledby="exampleModalLabel"
                    aria-hidden="true">
                    <div class="modal-dialog modal-lg">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h5 class="modal-title" id="exampleModalLabel">@lang('site.new_classroom')</h5>
                                <button type="button" class="btn btn-close" data-dismiss="modal"
                                    aria-label="Close"><span aria-hidden="true">&times;</span></button>
                            </div>
                            <form method="post" action="{{ route('classroom.store') }}"> @csrf
                                <div class="repeater-add">
                                    <div data-repeater-list="listclasses">
                                        <div data-repeater-item>
                                            <div class="modal-body">
                                                <div class="repeater">
                                                    <div class="row">
                                                        @foreach (config('translatable.locales') as $locale)
                                                            <div class="col-md-3">
                                                                <label class="col-md-12">@lang('site.' .
                                                                    $locale . '.classroom')</label>
                                                                <input type="text"
                                                                    name="{{ $locale }}_name"
                                                                    class="form-control" />
                                                            </div>
                                                        @endforeach
                                                        <div class="col-md-3">
                                                            <label
                                                                class="col-md-12">@lang('site.grade_name')</label>
                                                            <select name="grades" class="form-control">
                                                                <option value="" disabled selected>@lang('site.grades')</option>
                                                                @foreach ($grades as $grade)
                                                                    <option value="{{ $grade->id }}">
                                                                        {{ $grade->name }}</option>
                                                                @endforeach
                                                            </select>
                                                        </div>
                                                        <div class="col-md-3">
                                                            <label
                                                                class="col-md-12">@lang('site.actions')</label>
                                                            <input class="btn btn-danger btn-block"
                                                                data-repeater-delete type="button"
                                                                value="Delete" />
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="form-group clearfix mb-20">
                                        <input class="button" data-repeater-create type="button"
                                            value="@lang('site.add_more_class')" />
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
    $('.deleteBtn').click(function(e) {
        var that = $(this)
        e.preventDefault();
        var n = new Noty({
            text: "@lang('site.confirm_delete')",
            type: "warning",
            killer: true,
            buttons: [
                Noty.button("@lang('site.yes')", 'btn btn-danger mr-2', function() {
                    that.closest('form').submit();
                }),
                Noty.button("@lang('site.no')", 'btn btn-primary mr-2', function() {
                    n.close();
                })
            ]
        });
        n.show();
    }); //end of delete

    function checkAll(className, ele) {
        var elements = document.getElementsByClassName(className);
        var length = elements.length;
        if(ele.checked){
            for(var i=0;i<length;i++){
                elements[i].checked = true;
            }
        }else{
            for(var i=0;i<length;i++){
                elements[i].checked = false;
            }
        }
    }
</script>
@endsection
