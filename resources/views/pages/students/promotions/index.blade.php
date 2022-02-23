@extends('layouts.master')
@section('css')

@section('title')
    @lang('site.promotions_management')
@stop
@endsection
@section('page-header')
<!-- breadcrumb -->
<div class="page-title">
    <div class="row">
        <div class="col-sm-6">
            <h4 class="mb-0"> @lang('site.promotions_management')</h4>
        </div>
        <div class="col-sm-6">
            <ol class="breadcrumb pt-0 pr-0 float-left float-sm-right ">
                <li class="breadcrumb-item"><a href="#" class="default-color">@lang('site.dashboard')</a></li>
                <li class="breadcrumb-item"><a href="#" class="default-color">@lang('site.promotions')</a></li>
                <li class="breadcrumb-item active">@lang('site.promotions_management')</li>
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
                <form method="POST" action="{{ route('promotions.destroy', 'test') }}" style="display: inline-block"> @csrf @method('DELETE')
                    <input type="hidden" name="page_id" value="1" />
                    @if(count($promotions) > 0)<button type="submit" class="btn btn-danger btn-sm deleteBtn"><i class="fa fa-trash"></i> @lang('site.back_all')</button>@endif
                </form>
                <a href="{{ route('promotions.create') }}" class="btn btn-primary btn-sm">@lang('site.promotions')</a>
                <table id="datatable" class="table table-striped table-bordered p-0">
                    <thead>
                        <tr>
                            <td>@lang('site.student_name')</td>

                            <td>@lang('site.grade_from')</td>
                            <td>@lang('site.classroom_from')</td>
                            <td>@lang('site.section_from')</td>

                            <td>@lang('site.grade_to')</td>
                            <td>@lang('site.classroom_to')</td>
                            <td>@lang('site.section_to')</td>

                            <td>@lang('site.actions')</td>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($promotions as $promotion)
                            <tr>
                                <th>{{ $promotion->students->name }}</th>
                                <th>{{ $promotion->gradesFrom->name }}</th>
                                <th>{{ $promotion->classroomsFrom->classroom_name }}</th>
                                <th>{{ $promotion->sectionsFrom->section_name }}</th>
                                <th>{{ $promotion->gradesTo->name }}</th>
                                <th>{{ $promotion->classroomsTo->classroom_name }}</th>
                                <th>{{ $promotion->sectionsTo->section_name }}</th>
                                <th>
                                    <form method="POST" action="{{ route('promotions.destroy', $promotion->id) }}" style="display: inline-block"> @csrf @method('DELETE')
                                        <input type="hidden" name="id" value="{{ $promotion->id }}" />
                                        <button type="submit" class="btn btn-danger btn-sm deleteBtn">  @lang('site.student_back')</button>
                                    </form>
                                    <a class="btn btn-info btn-sm" href="{{ route('students.edit', $promotion->id) }}">  @lang('site.student_graduation')</a>
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

@endsection
