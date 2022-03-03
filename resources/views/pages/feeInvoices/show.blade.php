@extends('layouts.master')
@section('css')

@section('title')
    empty
@stop
@endsection
@section('page-header')
<!-- breadcrumb -->
<div class="page-title">
    <div class="row">
        <div class="col-sm-6">
            <h4 class="mb-0"> ncvlxcnvxcnvxcv</h4>
        </div>
        <div class="col-sm-6">
            <ol class="breadcrumb pt-0 pr-0 float-left float-sm-right ">
                <li class="breadcrumb-item"><a href="#" class="default-color">Home</a></li>
                <li class="breadcrumb-item active">Page Title</li>
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

                <form method="post" action="{{ route('feesInvoices.store') }}"> @csrf
                    <div class="repeater-add">
                        <div data-repeater-list="listfees">
                            <div data-repeater-item>
                                <div class="modal-body">
                                    <div class="repeater">
                                        <div class="row">
                                            <div class="col-md-2">
                                                <div class="form-group">
                                                    <label>@lang('site.student_name')</label>
                                                    <select name="student_id" class="form-control">
                                                        <option value="{{ $student->id }}">{{ $student->name }}</option>
                                                    </select>
                                                </div>
                                            </div>
                                            <div class="col-md-2">
                                                <div class="form-group">
                                                    <label>@lang('site.fees_type')</label>
                                                    <select name="fee_type" class="form-control">
                                                    <option value="" selected disabled>@lang('site.choose')</option>
                                                        @foreach ($fees as $fee)
                                                            <option value="{{ $fee->id }}">{{ $fee->name }}</option>
                                                        @endforeach
                                                    </select>
                                                </div>
                                            </div>

                                            <div class="col-md-2">
                                                <div class="form-group">
                                                    <label>@lang('site.amount')</label>
                                                    <select name="amount" class="form-control">
                                                        <option value="" selected disabled>@lang('site.choose')</option>
                                                        @foreach ($fees as $fee)
                                                            <option value="{{ $fee->amount }}">{{ $fee->amount }}</option>
                                                        @endforeach
                                                    </select>
                                                </div>
                                            </div>
                                            <div class="col">
                                                <label for="description" class="mr-sm-2">البيان</label>
                                                <div class="box">
                                                    <input type="text" class="form-control" name="description" required>
                                                </div>
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

                        <input type="hidden" value="{{ $student->grade_id }}" name="grade_id"/>
                        <input type="hidden" value="{{ $student->classroom_id }}" name="classroom_id"/>
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
<!-- row closed -->
@endsection
@section('js')
@endsection
