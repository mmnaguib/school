@extends('layouts.master')
@section('css')

@section('title')
    @lang('site.receipt')
@stop
@endsection
@section('page-header')
<!-- breadcrumb -->
<div class="page-title">
    <div class="row">
        <div class="col-sm-6">
            <h4 class="mb-0"> @lang('site.receipt') {{ $student->name }}</h4>
        </div>
        <div class="col-sm-6">
            <ol class="breadcrumb pt-0 pr-0 float-left float-sm-right ">
                <li class="breadcrumb-item"><a href="#" class="default-color">@lang('site.dashboard')</a></li>
                <li class="breadcrumb-item active">@lang('site.receipt') {{ $student->name }}</li>
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
                <form method="POST" action="{{ route('receipts.store') }}"> @csrf

                    <div class="row">
                        <div class="col-md-12">
                            <div class="form-group">
                                <label>@lang('site.amount') :</label>
                                <input type="number" name="amount" class="form-control" />
                            </div>
                        </div>
                        <input type="hidden" name="student_id" value="{{ $student->id }}" />
                        <div class="col-md-12">
                            <div class="form-group">
                                <label>@lang('site.description') :</label>
                                <textarea type="number" name="description" class="form-control" ></textarea>
                            </div>
                        </div>
                        <div class="col-md-12 text-left">
                            <div class="form-group">
                                <button class="btn btn-success" type="submit">@lang('site.add')</button>
                            </div>
                        </div>
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
