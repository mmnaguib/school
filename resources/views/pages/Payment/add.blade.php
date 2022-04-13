@extends('layouts.master')
@section('css')

@section('title')
    @lang('site.payment')
@stop
@endsection
@section('page-header')
<!-- breadcrumb -->
<div class="page-title">
    <div class="row">
        <div class="col-sm-6">
            <h4 class="mb-0"> @lang('site.payment') {{ $student->name }}</h4>
        </div>
        <div class="col-sm-6">
            <ol class="breadcrumb pt-0 pr-0 float-left float-sm-right ">
                <li class="breadcrumb-item"><a href="#" class="default-color">Home</a></li>
                <li class="breadcrumb-item active">@lang('site.payment')</li>
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
                @include('partials._errors')
                <form method="POST" action="{{ route('payment_students.store') }}"> @csrf
                    <div class="row">
                        <div class="col-md-6">
                            <label>@lang('site.amount') <span class="text-danger">*</span></label>
                            <input type="text" name="debit" class="form-control"/>
                            <input type="hidden" name="student_id" value="{{ $student->id }}" class="form-control"/>
                        </div>
                        <div class="col-md-6">
                            <label>@lang('site.student_balance')</label>
                            <input type="text" name="final_balance" class="form-control" readonly
                            value="{{ $student->studentAccount->sum('debit') - $student->studentAccount->sum('credit') }}"/>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-12">
                            <label>@lang('site.description')</label>
                            <textarea name="description" rows="3" class="form-control" ></textarea>
                        </div>
                    </div>
                    <button type="submit" class="btn btn-success">@lang('site.add')</button>
                </form>
            </div>
        </div>
    </div>
</div>
<!-- row closed -->
@endsection
@section('js')

@endsection
