@extends('frontend.layout.master')
@section('title')
الرئيسية | {{$setting->name}}
@endsection
@section('css')

@endsection
@section('content')
    <div class="container">
        <div class="row">
            <form class="multisteps_form" id="wizard" method="POST" action="{{ route('form') }}">
                @csrf
                <!------------------------- Step-1 ----------------------------->
                @foreach($quizs as $quiz)
                    <div class="col-lg-7">
                        <div class="row">
{{--                            <div class="col-lg-12">--}}
{{--                                <input type="text" class="form-control bg-white rounded-pill position-relative" placeholder="Your Name" name="name" required>--}}
{{--                            </div>--}}
                        </div>
                        <div class="multisteps_form_panel">
                            <div class="question_title pb-4">
                                <h1 class="bg-white rounded-pill position-relative">{{$quiz->name}}</h1>
                                <!-- Step-Progress-bar area -->
                                <div class="step_progress_bar position-absolute">
                                    <div class="step position-relative" style="background-color: #f8d5b3;"></div>
                                    <div class="step position-relative" style="background-color: #ffe090;"></div>
                                    <div class="step position-relative" style="background-color: #f2c7db;"></div>
                                </div>
                            </div>
                            <div class="form_items">

                                <ul class="ms-5 p-0 list-unstyled">
                                    @if($quiz->type->type == 2)
                                    <li>
                                        <label for="opt_1[{{$quiz->id}}]" class="step_1 rounded-pill position-relative animate__animated animate__fadeInRight animate_50ms">
                                            <input type="radio" id="opt_1[{{$quiz->id}}]" name="name[{{$quiz->id}}]" value="{{ $quiz->name }} / نعم">
                                            <span class="text-white">A</span>
                                            نعم
                                            <span class="pinkLady"></span>
                                        </label>
                                    </li>
                                    <li>
                                        <label for="opt_2[{{$quiz->id}}]" class="step_1 rounded-pill position-relative animate__animated animate__fadeInRight animate_100ms">
                                            <input type="radio" id="opt_2[{{$quiz->id}}]" name="name[{{$quiz->id}}]" value="{{ $quiz->name }} / لاء">
                                            <span class="text-white">B</span>
                                            لا
                                            <span class="salomie"></span>
                                        </label>
                                    </li>
                                    <li>
                                        <label for="opt_3[{{$quiz->id}}]" class="active step_1 rounded-pill position-relative animate__animated animate__fadeInRight animate_150ms">
                                            <input type="radio" id="opt_3[{{$quiz->id}}]" name="name[{{$quiz->id}}]" value="{{ $quiz->name }} / اخري">
                                            <span class="text-white">C</span>
                                           أخرى
                                            <span class="wePeep"></span>
                                        </label>
                                    </li>
                                    @else
                                        <li>
                                            <label for="opt_3[{{$quiz->id}}]" class="active step_1 rounded-pill position-relative animate__animated animate__fadeInRight animate_150ms">
                                                <input type="text" id="opt_3[{{$quiz->id}}]" name="name[{{$quiz->id}}]" value="{{ $quiz->name }} / اخري">


                                            </label>
                                        </li>

                                    @endif





                                    @if ($loop->last)
                                    <div class="row" style="margin-left: -120px;margin-top: 18px;">
                                        <div class="col-lg-6 col-sm-12 offset-sm-1 mb-3">
                                            <input type="text" class="form-control" placeholder="اترك اسمك من فضلك" name="text" required>

                                        </div>
                                    </div>
                                    @endif
                                </ul>


                            </div>
                        </div>
                    </div>
                @endforeach
                <!------------------------- Step-2 ----------------------------->

                <!---------- Form Button ---------->
                <div class="form_btn position-absolute">
                    <button type="button" class="f_btn prev_btn text-white rounded-pill text-uppercase" id="prevBtn" onclick="nextPrev(-1)"><span><i class="fas fa-arrow-left"></i></span> السؤال السابق</button>
                    <button type="button" class="f_btn nextBtn text-white rounded-pill text-uppercase" id="nextBtn" onclick="nextPrev(1), move()">السؤال التالي</button>
                </div>
            </form>
        </div>
    </div>

@endsection
@section('js')

@endsection
