@extends('layouts.master')
@section('css')
@toastr_css
@section('title')
    @lang('site.fee_invoice')
@stop
@endsection
@section('page-header')
<!-- breadcrumb -->
<div class="page-title">
    <div class="row">
        <div class="col-sm-6">
            <h4 class="mb-0"> @lang('site.fee_invoice')</h4>
        </div>
        <div class="col-sm-6">
            <ol class="breadcrumb pt-0 pr-0 float-left float-sm-right ">
                <li class="breadcrumb-item"><a href="#" class="default-color">@lang('site.dashboard')</a></li>
                <li class="breadcrumb-item"><a href="#" class="default-color">@lang('site.fee_invoice')</a></li>
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
            <div class="card-body"><table id="datatable" class="table table-striped table-bordered p-0">
                <thead>
                    <tr>
                        <td>@lang('site.student_name')</td>
                        <td>@lang('site.grades')</td>
                        <td>@lang('site.classroom_name')</td>
                        <td>@lang('site.fees_type')</td>
                        <td>@lang('site.description')</td>
                        <td>@lang('site.amount')</td>
                        <td>@lang('site.actions')</td>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($feeInvoices as $feeInvoice)
                        <tr>
                            <th>{{ $feeInvoice->students->name }}</th>
                            <th>{{ $feeInvoice->grades->name }}</th>
                            <th>{{ $feeInvoice->classrooms->classroom_name }}</th>
                            <th>{{ $feeInvoice->fees->name }}</th>
                            <th>{{ $feeInvoice->description }}</th>
                            <th>{{ $feeInvoice->amount }} جنيه مصري</th>
                            <th>
                                <a class="btn btn-info btn-sm" href="{{ route('feesInvoices.edit', $feeInvoice->id) }}"><i class="fa fa-edit"></i> @lang('site.edit')</a>
                                <form method="POST" action="{{ route('feesInvoices.destroy', $feeInvoice->id) }}" style="display: inline-block"> @csrf @method('DELETE')
                                    <button type="submit" class="btn btn-danger btn-sm deleteBtn"><i class="fa fa-trash"></i> @lang('site.delete')</button>
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
