@extends('templates.base')
@section('head')
    <title>Учебные планы</title>

    <!-- BEGIN META -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="keywords" content="your,keywords">
    <meta name="description" content="Short explanation about this website">
    <!-- END META -->

    <!-- BEGIN STYLESHEETS -->
    {!! HTML::style('css/bootstrap.css') !!}
    {!! HTML::style('css/materialadmin.css') !!}
    {!! HTML::style('css/font-awesome.min.css') !!}
    {!! HTML::style('css/material-design-iconic-font.min.css') !!}
    <!-- END STYLESHEETS -->
@stop
@section('content')
    <!-- BEGIN BLANK SECTION -->
    <div class ="row section-header">
        <div class="col-sm-9" >
        </div>
        <div class="col-sm-3" >
                {!! HTML::link('course_plans/create','Создать учебный план',array('class' => 'btn ink-reaction btn-primary','role' => 'button')) !!}
        </div>
    </div>

    <div class="card card-tiles style-default-light" style="margin-left:2%; margin-right:2%">
        <article class="style-default-bright">
            <div class="card-body">
                <article style="margin-left:5%; margin-right:5%">
                    @foreach ($course_plans as $course_plan)


                    <div class="card card-bordered style-gray ">
                        <div class="card-head">
                            <header>{{"Учебный план: ".$course_plan->course_plan_name}}</header>
                            <div class="tools">
                                <div class="btn-group ">
                                    <a class="btn btn-icon-toggle btn-close delete" name="{{ $course_plan->id_course_plan }}"><i class="md md-close"></i></a>
                                </div>
                            </div>
                        </div>
                        <div class="card-body style-default-bright">
                            <p class="card-text">
                                {{$course_plan->course_plan_desc}}
                            </p>
                            <ul>
                                <li>{{ 'Макс балл за раздел "Контрольные мероприятия в семестре":'.$course_plan->max_controls }}</li>
                                <li>{{ 'Макс балл за раздел "Посещение семинаров":'.$course_plan->max_seminars }}</li>
                                <li>{{ 'Макс балл за раздел "Работа на семинарах":'.$course_plan->max_seminars_work }}</li>
                                <li>{{ 'Макс балл за раздел "Посещение лекций":'.$course_plan->max_lecrures }}</li>
                                <li>{{ 'Макс балл за раздел "Зачет (экзамен)":'.$course_plan->max_exam }}</li>
                            </ul>
                            {!! HTML::link('course_plan/'.$course_plan->id_course_plan,'Подробнее',
                            array('class' => 'ink-reaction btn btn-primary','role' => 'button')) !!}
                        </div>
                    </div>

                    @endforeach


                </article>
            </div>
        </article>
    </div>

@stop

@section('js-down')
    {!! HTML::script('js/core/source/App.js') !!}
    {!! HTML::script('js/core/source/AppNavigation.js') !!}
    {!! HTML::script('js/core/source/AppOffcanvas.js') !!}
    {!! HTML::script('js/core/source/AppCard.js') !!}
    {!! HTML::script('js/core/source/AppForm.js') !!}
    {!! HTML::script('js/core/source/AppNavSearch.js') !!}
    {!! HTML::script('js/core/source/AppVendor.js') !!}
    {!! HTML::script('js/core/demo/Demo.js') !!}
    {!! HTML::script('js/library/definition.js') !!}
@stop

