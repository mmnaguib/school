@extends('layouts.master')
@section('css')
    @toastr_css
@section('title')
    @lang('site.new_question')
@stop
@endsection
@section('page-header')
    <!-- breadcrumb -->
@section('PageTitle')
    ا@lang('site.new_question')
@stop
<!-- breadcrumb -->
@endsection
@section('content')
    <!-- row -->
    <div class="row">
        <div class="col-md-12 mb-30">
            <div class="card card-statistics h-100">
                <div class="card-body">

                    @include('partials._errors')
                    <div class="col-xs-12">
                        <div class="col-md-12">
                            <br>
                            <form action="{{ route('questions.update', $question->id) }}" method="post" autocomplete="off">
                                @csrf @method('PUT')
                                <div class="form-row">

                                    <div class="col">
                                        <label for="title">@lang('site.question')</label>
                                        <input type="text" name="title" id="input-name"
                                            class="form-control form-control-alternative" value="{{ $question->title }}">
                                    </div>
                                </div>
                                <br>

                                <div class="form-row">
                                    <div class="col">
                                        <label for="title">@lang('site.answers')</label>
                                        <textarea name="answers" class="form-control" id="exampleFormControlTextarea1"
                                                rows="4">{{ $question->answers }}</textarea>
                                    </div>
                                </div>
                                <br>

                                <div class="form-row">
                                    <div class="col">
                                        <label for="title">@lang('site.right_anwser')</label>
                                        <input type="text" name="right_answer" id="input-name"
                                            class="form-control form-control-alternative" value="{{ $question->right_answer }}">
                                    </div>
                                </div>
                                <br>

                                <div class="form-row">
                                    <div class="col-6">
                                        <div class="form-group">
                                            <label for="Grade_id">@lang('site.quiz_name') : <span
                                                    class="text-danger">*</span></label>
                                            <select class="custom-select mr-sm-2" name="quiz_id">
                                                <option selected disabled>@lang('site.choose')</option>
                                                @foreach($quizes as $quiz)
                                                    <option value="{{ $quiz->id }}" {{$quiz->id == $question->quiz_id ? 'selected':'' }} >{{ $quiz->name }}</option>
                                                @endforeach
                                            </select>
                                        </div>
                                    </div>
                                    <div class="col-6">
                                        <div class="form-group">
                                            <label for="Grade_id">@lang('site.degree') : <span class="text-danger">*</span></label>
                                            <select class="custom-select mr-sm-2" name="score">
                                                <option selected disabled> @lang('site.choose')</option>
                                                <option value="5" {{$question->score == 5 ? 'selected':''}}>5</option>
                                                <option value="10" {{$question->score == 10 ? 'selected':''}}>10</option>
                                                <option value="15" {{$question->score == 15 ? 'selected':''}}>15</option>
                                                <option value="20" {{$question->score == 20 ? 'selected':''}}>20</option>
                                            </select>
                                        </div>
                                    </div>
                                </div>
                                <br>
                                <button class="btn btn-info btn-sm nextBtn btn-lg pull-right" type="submit">@lang('site.edit')</button>
                            </form>
                        </div>
                    </div>
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
