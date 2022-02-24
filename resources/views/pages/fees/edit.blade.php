@extends('layouts.master')
@section('css')

@section('title')
    @lang('site.edit_fee')
@stop
@endsection
@section('page-header')
<!-- breadcrumb -->
<div class="page-title">
    <div class="row">
        <div class="col-sm-6">
            <h4 class="mb-0"> @lang('site.edit_fee')</h4>
        </div>
        <div class="col-sm-6">
            <ol class="breadcrumb pt-0 pr-0 float-left float-sm-right ">
                <li class="breadcrumb-item"><a href="#" class="default-color">@lang('site.dashboard')</a></li>
                <li class="breadcrumb-item"><a href="#" class="default-color">@lang('site.accountants')</a></li>
                <li class="breadcrumb-item active">@lang('site.edit_fee')</li>
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
                <form method="POST" action="{{ route('fees.update', $fee->id) }}" > @csrf @method('PUT')
                <div class="row">
                    @foreach(config('translatable.locales') as $locale)
                        <div class="col-md-4">
                            <div class="form-group">
                                <label>@lang('site.' .$locale. '.fees')</label>
                                <input type="text" name="{{ $locale}}_fees" class="form-control" value="{{ $fee->setlocale($locale)->name }}" />
                            </div>
                        </div>
                    @endforeach
                    <div class="col-md-4">
                        <div class="form-group">
                            <label>@lang('site.amount')</label>
                            <input type="text" name="fee_amount" class="form-control" value="{{ $fee->amount }}"/>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-4">
                        <div class="form-group">
                            <label>@lang('site.grades')</label>
                            <select name="grades" class="form-control">
                                <option value="{{ $fee->grade_id }}"> {{ $fee->grades->name }}</option>
                                @foreach ($grades as $grade)
                                    <option value="{{ $grade->id }}">{{ $grade->name }}</option>
                                @endforeach
                            </select>
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="form-group">
                            <label>@lang('site.classroom')</label>
                            <select name="classrooms" class="form-control">
                            <option selected value="{{ $fee->classroom_id }}"> {{ $fee->classrooms->classroom_name }}</option>

                            </select>
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="form-group">
                            <label>@lang('site.academic_year')</label>
                            <select name="academic_year" class="form-control">
                                <option value="{{ $fee->academic_year }}"> {{ $fee->academic_year }}</option>
                                @php
                                    $current_year = date("Y");
                                @endphp
                                @for($year=$current_year; $year<=$current_year +1 ;$year++)
                                    <option value="{{ $year}}">{{ $year }}</option>
                                @endfor
                            </select>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-12">
                        <div class="form-group">
                            <label>@lang('site.notes')</label>
                            <textarea name="notes" class="form-control">{{ $fee->notes }}</textarea>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-12">
                        <button type="submit" class="btn btn-primary">@lang('site.save')</button>
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
