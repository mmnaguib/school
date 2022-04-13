@extends('layouts.master')
@section('css')
@toastr_css
@section('title')
    @lang('site.processFee')
@stop
@endsection
@section('page-header')
<!-- breadcrumb -->
<div class="page-title">
    <div class="row">
        <div class="col-sm-6">
            <h4 class="mb-0"> @lang('site.processFee')</h4>
        </div>
        <div class="col-sm-6">
            <ol class="breadcrumb pt-0 pr-0 float-left float-sm-right ">
                <li class="breadcrumb-item"><a href="#" class="default-color">@lang('site.dashboard')</a></li>
                <li class="breadcrumb-item"><a href="#" class="default-color">@lang('site.students')</a></li>
                <li class="breadcrumb-item active">@lang('site.processFee')</li>
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
                            <td>@lang('site.actions')</td>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($process_fees as $process_fee)
                        <tr>
                            <td>{{ $process_fee->student->name}}</td>
                            <td>{{ $process_fee->amount }}</td>
                            <td>{{ $process_fee->description }}</td>
                            <th>
                                <a class="btn btn-info btn-sm" href="{{ route('processesFee.edit', $process_fee->id) }}"><i class="fa fa-edit"></i> @lang('site.edit')</a>
                                <form method="POST" action="{{ route('processesFee.destroy', $process_fee->id) }}" style="display: inline-block"> @csrf @method('DELETE')
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
