@extends('layouts.master')
@section('css')

@section('title')
@lang('site.grades')
@stop
@endsection
@section('page-header')
<!-- breadcrumb -->
<div class="page-title">
    <div class="row">
        <div class="col-sm-6">
            <h4 class="mb-0"> @lang('site.grades')</h4>
        </div>
        <div class="col-sm-6">
            <ol class="breadcrumb pt-0 pr-0 float-left float-sm-right ">
                <li class="breadcrumb-item"><a href="#" class="default-color">@lang('site.dashboard')</a></li>
                <li class="breadcrumb-item">@lang('site.grades')</li>
                <li class="breadcrumb-item active">@lang('site.edit')</li>

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
                <form method="POST" action="{{ route('grades.update', $grade->id) }}">@csrf @method('PUT')
                   <div class="row">
                        @foreach (config('translatable.locales') as $locale)
                        <div class="col-md-6">
                            <div class="form-group">
                                <label>@lang('site.' . $locale . '.grade')</label>
                                <input type="text" class="form-control" name="{{ $locale }}_name" id="{{ $locale }}_name" value="{{ $grade->setLocale($locale)->name }}" />
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label>@lang('site.' . $locale . '.notes')</label>
                                <textarea name="{{ $locale }}_notes" class="form-control" id="notes" cols="5" rows="1">{{ $grade->setLocale($locale)->notes }}</textarea>
                            </div>
                        </div>
                        @endforeach
                    </div>
                    <div class="form-group">
                        <button type="submit" class="btn btn-primary">@lang('site.edit')</button>
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
