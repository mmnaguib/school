@extends('layouts.master')
@section('css')

@section('title')
    @lang('site.edit_fee_invoice')
@stop
@endsection
@section('page-header')
<!-- breadcrumb -->
<div class="page-title">
    <div class="row">
        <div class="col-sm-6">
            <h4 class="mb-0"> @lang('site.edit_fee_invoice')</h4>
        </div>
        <div class="col-sm-6">
            <ol class="breadcrumb pt-0 pr-0 float-left float-sm-right ">
                <li class="breadcrumb-item"><a href="#" class="default-color">@lang('site.dashboard')</a></li>
                <li class="breadcrumb-item"><a href="#" class="default-color">@lang('site.fee_invoice')</a></li>
                <li class="breadcrumb-item active">@lang('site.edit_fee_invoice')</li>
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

                <form method="post" action="{{ route('feesInvoices.update', $fee_invoice->id) }}"> @csrf @method('PUT')
                        <div class="modal-body">
                                <div class="row">
                                    <div class="col-md-3">
                                        <div class="form-group">
                                            <label>@lang('site.student_name')</label>
                                            <input value="{{ $fee_invoice->students->name }}" type="text" readonly class="form-control"/>
                                        </div>
                                    </div>
                                    <div class="col-md-3">
                                        <div class="form-group">
                                            <label>@lang('site.fees_type')</label>
                                            <select name="fee_type" class="form-control">
                                                <option selected value="{{ $fee_invoice->fees->id }}">{{ $fee_invoice->fees->name }}</option>
                                                @foreach ($fees as $fee)
                                                    <option value="{{ $fee->id }}">{{ $fee->name }}</option>
                                                @endforeach
                                            </select>
                                        </div>
                                    </div>

                                    <div class="col-md-3">
                                        <div class="form-group">
                                            <label>@lang('site.amount')</label>
                                            <input value="{{ $fee_invoice->amount }}" type="text" name="amount" class="form-control"/>
                                        </div>
                                    </div>
                                    <div class="col-md-3">
                                        <label for="description" class="mr-sm-2">البيان</label>
                                        <div class="box">
                                            <input value="{{ $fee_invoice->description }}" type="text" name="description" class="form-control"/>
                                        </div>
                                    </div>
                                </div>
                                <button type="submit" class="btn btn-sm btn-info">@lang('site.edit')</button>
                        </div>

                        <input type="hidden" value="{{ $fee_invoice->students->grade_id }}" name="grade_id"/>
                        <input type="hidden" value="{{ $fee_invoice->students->classroom_id }}" name="classroom_id"/>
                </form>
            </div>
        </div>
    </div>
</div>
<!-- row closed -->
@endsection
@section('js')
@endsection
