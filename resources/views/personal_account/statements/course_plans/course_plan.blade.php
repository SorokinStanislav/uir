@extends('templates.base')
@section('head')
    <title>Учебный план {{$coursePlane->course_plan_name}}</title>
    <!-- BEGIN META -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="keywords" content="your,keywords">
    <meta name="description" content="Short explanation about this website">
    <meta name="csrf-token" content="{{ csrf_token() }}" />
    <!-- END META -->

    <!-- BEGIN STYLESHEETS -->
    <link href='http://fonts.googleapis.com/css?family=Roboto:300italic,400italic,300,400,500,700,900' rel='stylesheet' type='text/css'/>
    {!! HTML::style('css/bootstrap.css') !!}
    {!! HTML::style('css/materialadmin.css') !!}
    {!! HTML::style('css/font-awesome.min.css') !!}
    {!! HTML::style('css/material-design-iconic-font.min.css') !!}
    <!-- END STYLESHEETS -->

    <!-- HTML5 shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!--[if lt IE 9]>
    {!! HTML::script('js/libs/utils/html5shiv.js') !!}
    {!! HTML::script('js/libs/utils/respond.min.js') !!}
    <![endif]-->
@stop
@section('content')
    <div class="container-fluid">
        <div class="row">
            <div class="col-lg-8">
                <section>
                    <div class="section-header">
                        <ol class="breadcrumb">
                            <li>{!! HTML::linkRoute('course_plans', 'Все учебные планы') !!}</li>
                            <li class="active">Учебный план</li>
                        </ol>
                    </div><!--end .section-header -->
                </section>
            </div>
        </div>
    </div>
        <div class ="container-fluid">
            <div class="card card-bordered style-gray course_plan" id="{{ $coursePlan->id_course_plan }}">
                <div class="card-head">
                    <header>{{"Учебный план: ".$coursePlan->course_plan_name}}</header>
                    <div class="tools">
                        <div class="btn-group ">
                            <a class="btn btn-icon-toggle btn-close delete" name="{{ $coursePlan->id_course_plan }}"><i class="md md-close"></i></a>
                        </div>
                    </div>
                </div>
                <div class="card-body style-default-bright">
                    <p class="card-text">
                        {{$coursePlan->course_plan_desc}}
                    </p>
                    <ul>
                        <li>{{ 'Макс балл за раздел "Контрольные мероприятия в семестре":'.$coursePlan->max_controls }}</li>
                        <li>{{ 'Макс балл за раздел "Посещение семинаров":'.$coursePlan->max_seminars }}</li>
                        <li>{{ 'Макс балл за раздел "Работа на семинарах":'.$coursePlan->max_seminars_work }}</li>
                        <li>{{ 'Макс балл за раздел "Посещение лекций":'.$coursePlan->max_lecrures }}</li>
                        <li>{{ 'Макс балл за раздел "Зачет (экзамен)":'.$coursePlan->max_exam }}</li>
                    </ul>
                    <div id="sections">
                        <?php $sectionNumForFindJs = 0 ?>
                        @foreach($coursePlan->section_plans as $sectionPlan)
                                <?php $sectionNumForFindJs++ ?>
                        @include('personal_account.statements.course_plans.sections.view_or_update_section',array('sectionPlan' => $sectionPlan, 'readOnly' => true,
                        'sectionNumForFindJs' => $sectionNumForFindJs))
                        @endforeach
                            {{--Здесь добавляются разделы учебного плана--}}
                    </div>
                    <button type="button" class="ink-reaction btn btn-success" id="addSection">Добавить раздел</button>
                </div>




        </div>

    </div>
@stop
@section('js-down')
    <!-- BEGIN JAVASCRIPT -->
    {!! HTML::script('js/libs/spin.js/spin.min.js') !!}
    {!! HTML::script('js/libs/autosize/jquery.autosize.min.js') !!}
    {!! HTML::script('js/libs/nanoscroller/jquery.nanoscroller.min.js') !!}
    {!! HTML::script('js/core/source/App.js') !!}
    {!! HTML::script('js/core/source/AppNavigation.js') !!}
    {!! HTML::script('js/core/source/AppOffcanvas.js') !!}
    {!! HTML::script('js/core/source/AppCard.js') !!}
    {!! HTML::script('js/core/source/AppForm.js') !!}
    {!! HTML::script('js/core/source/AppNavSearch.js') !!}
    {!! HTML::script('js/core/source/AppVendor.js') !!}
    {!! HTML::script('js/core/demo/Demo.js') !!}
    {!! HTML::script('js/statements/section_course_plans/sections.js') !!}
    {!! HTML::script('js/statements/section_course_plans/lectures_or_seminars_or_controlWork.js') !!}
    <!-- END JAVASCRIPT -->

@stop