@extends('layouts.master')
@section('css')
@toastr_css
@section('title')
    @lang('site.receipes')
@stop
@endsection
@section('page-header')
<!-- breadcrumb -->
<div class="page-title">
    <div class="row">
        <div class="col-sm-6">
            <h4 class="mb-0"> @lang('site.receipes')</h4>
        </div>
        <div class="col-sm-6">
            <ol class="breadcrumb pt-0 pr-0 float-left float-sm-right ">
                <li class="breadcrumb-item"><a href="#" class="default-color">@lang('site.dashboard')</a></li>
                <li class="breadcrumb-item"><a href="#" class="default-color">@lang('site.students')</a></li>
                <li class="breadcrumb-item active">@lang('site.receipes')</li>
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
                <table id="datatable" class="table table-striped table-bordered p-0">
                    <thead>
                        <tr>
                            <td>@lang('site.student_name')</td>
                            <td>@lang('site.amount')</td>
                            <td>@lang('site.description')</td>
                            <td>@lang('site.grades')</td>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($receipes as $receipe)
                        <tr>
                            <td>{{ $receipe->student->name }}</td>
                            <td>{{ $receipe->debit }}</td>
                            <td>{{ $receipe->description }}</td>
                            <th>
                                <a class="btn btn-info btn-sm" href="{{ route('receipts.edit', $receipe->id) }}"><i class="fa fa-edit"></i> @lang('site.edit')</a>
                                <form method="POST" action="{{ route('receipts.destroy', $receipe->id) }}" style="display: inline-block"> @csrf @method('DELETE')
                                    <button type="submit" class="btn btn-danger btn-sm deleteBtn"><i class="fa fa-trash"></i> @lang('site.delete') </button>
                                </form>
                            </th>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
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
