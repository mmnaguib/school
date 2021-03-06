@extends('layouts.master')
@section('css')
@toastr_css
@section('title')
@lang('site.grades')
@stop
@endsection
@section('page-header')
<!-- breadcrumb -->
<div class="page-title">
    <div class="row">
        <div class="col-sm-6">
            <h4 class="mb-0"> @lang('site.students')</h4>
        </div>
        <div class="col-sm-6">
            <ol class="breadcrumb pt-0 pr-0 float-left float-sm-right ">
                <li class="breadcrumb-item"><a href="{{ route('home') }}" class="default-color">@lang('site.dashboard')</a></li>
                <li class="breadcrumb-item active">@lang('site.students')</li>
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
                <a href="{{ route('students.create') }}" class="btn btn-primary btn-sm">@lang('site.add_student')</a>
                <table id="datatable" class="table table-striped table-bordered p-0">
                    <thead>
                        <tr>
                            <td>@lang('site.student_name')</td>
                            <td>@lang('site.email')</td>
                            <td>@lang('site.grades')</td>
                            <td>@lang('site.classroom_name')</td>
                            <td>@lang('site.section_name')</td>
                            <td>@lang('site.date_birthday')</td>
                            <td>@lang('site.gender')</td>
                            <td>@lang('site.actions')</td>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($students as $student)
                            <tr>
                                <th>{{ $student->name }} {{ $student->parents->father_name }}</th>
                                <th>{{ $student->email }}</th>
                                <th>{{ $student->grades->name }}</th>
                                <th>{{ $student->classrooms->classroom_name }}</th>
                                <th>{{ $student->sections->section_name }}</th>
                                <th>{{ $student->birthdate }}</th>
                                <th>{{ $student->genders->name }}</th>
                                <th>
                                    <div class="btn-group">
                                        <button type="button" class="btn btn-primary dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                        @lang('site.actions')
                                        </button>
                                        <div class="dropdown-menu" style="padding: 10px">
                                            <a class="btn btn-block btn-info btn-sm" href="{{ route('students.show', $student->id) }}"><i class="fa fa-eye"></i> @lang('site.show')</a>
                                            <a class="btn btn-block btn-primary btn-sm" href="{{ route('students.edit', $student->id) }}"><i class="fa fa-edit"></i> @lang('site.edit')</a>
                                            <a class="btn btn-block btn-info btn-sm" href="{{ route('feesInvoices.show', $student->id) }}"><i class="fa fa-edit"></i> @lang('site.fee_invoice')</a>
                                            <a class="btn btn-block btn-primary btn-sm" href="{{ route('receipts.show', $student->id) }}"><i class="fa fa-file-text"></i> @lang('site.receipt')</a>
                                            <a class="btn btn-block btn-danger btn-sm" href="{{ route('processesFee.show', $student->id) }}"><i class="fa fa-file-text"></i> @lang('site.processFee')</a>
                                            <a class="btn btn-block btn-primary btn-sm" href="{{ route('payment_students.show', $student->id) }}"><i class="fa fa-file-text"></i> @lang('site.payment')</a>
                                            <form method="POST" action="{{ route('students.destroy', $student->id) }}" style="display: block;margin-top: 0.5rem"> @csrf @method('DELETE')
                                                <button type="submit" class="btn btn-block btn-danger btn-sm deleteBtn"><i class="fa fa-trash"></i> @lang('site.delete')</button>
                                            </form>

                                        </div>
                                    </div>
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
