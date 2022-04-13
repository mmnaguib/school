@extends('layouts.master')
@section('css')

@section('title')
    @lang('site.processFee')
@stop
@endsection
@section('page-header')
<!-- breadcrumb -->
<div class="page-title">
    <div class="row">
        <div class="col-sm-6">
            <h4 class="mb-0"> @lang('site.processFee') {{ $processFee->student->name }}</h4>
        </div>
        <div class="col-sm-6">
            <ol class="breadcrumb pt-0 pr-0 float-left float-sm-right ">
                <li class="breadcrumb-item"><a href="#" class="default-color">Home</a></li>
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
                @include('partials._errors')
                <form method="POST" action="{{ route('processesFee.update', $processFee->id) }}"> @csrf @method('PUT')
                    <div class="row">
                        <div class="col-md-12">
                            <label>@lang('site.amount') <span class="text-danger">*</span></label>
                            <input type="text" name="debit" class="form-control" value="{{ $processFee->amount }}"/>
                            <input type="hidden" name="student_id" value="{{ $processFee->student->id }}" class="form-control"/>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-12">
                            <label>@lang('site.description')</label>
                            <textarea name="description" rows="3" class="form-control" >{{ $processFee->description }}</textarea>
                        </div>
                    </div>
                    <button type="submit" class="btn btn-success">@lang('site.edit')</button>
                </form>
            </div>
        </div>
    </div>
</div>
<!-- row closed -->
@endsection
@section('js')

@endsection
