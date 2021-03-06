@extends('templates.base')
@section('head')
<title>Библиотека</title>
<!-- BEGIN META -->
<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<meta name="keywords" content="your,keywords">
<meta name="description" content="Short explanation about this website">
<!-- END META -->

<!-- BEGIN STYLESHEETS -->
<link href='http://fonts.googleapis.com/css?family=Roboto:300italic,400italic,300,400,500,700,900' rel='stylesheet' type='text/css'/>
{!! HTML::style('css/bootstrap.css') !!}
{!! HTML::style('css/materialadmin.css') !!}
{!! HTML::style('css/font-awesome.min.css') !!}
{!! HTML::style('css/material-design-iconic-font.min.css') !!}
<!-- END STYLESHEETS -->

@stop


@section('content')

<!-- BEGIN BLANK SECTION -->
<section>
    <div class="section-header">
        <ol class="breadcrumb">
            <li class="active">Библиотека</li>
        </ol>
    </div><!--end .section-header -->
</section>


<div class="card"> <center>
        <div class="card-body">
            <div class="row">
                <div class="btn-group">
                    <button type="button" class="btn ink-reaction btn-flat dropdown-toggle" data-toggle="dropdown">
                        лекции <i class="fa fa-caret-down text-default-light"></i>
                    </button>
                    <ul class="dropdown-menu animation-expand" >
                        <li>{!! HTML::link('download/saveall/part1.rar', '1 раздел') !!}</li>
                        <li>{!! HTML::link('download/saveall/part2.rar', '2 раздел') !!}</li>
                        <li>{!! HTML::link('download/saveall/part3.rar', '3 раздел') !!}</li>
                        <li>{!! HTML::link('download/saveall/part4.rar', '4 раздел') !!}</li>
                        <li class="divider"></li>
                        <li>{!! HTML::link('download/saveall/TeoriaAlgoritmov.rar', 'Скачать всё') !!}</li>
                    </ul>
                </div>
                <a>&nbsp;&nbsp;&nbsp;</a>
                <div class="btn-group">
                    <button type="button" class="btn ink-reaction btn-flat dropdown-toggle" data-toggle="dropdown">
                        Книги по ТА <i class="fa fa-caret-down text-default-light"></i>
                    </button>
                    <ul class="dropdown-menu animation-expand" >
                        <li>{!! HTML::linkRoute('books', 'Бронирование печатных изданий') !!}</li>
                        <li>{!! HTML::linkRoute('ebooks', 'Электронные книги') !!}</li>
                    </ul>
                </div>
                <a>&nbsp;&nbsp;&nbsp;</a>
                <div class="btn-group">
                    <button type="button" class="btn ink-reaction btn-flat dropdown-toggle" data-toggle="dropdown">
                        Определения и теоремы<i class="fa fa-caret-down text-default-light"></i>
                    </button>
                    <ul class="dropdown-menu animation-expand" >
                        <li>{!! HTML::linkRoute('library_definitions', 'Определения') !!}</li>
                        <li>{!! HTML::linkRoute('library_theorems', 'Теоремы') !!}</li>
                        <li class="divider"></li>
                        <li>{!! HTML::link('download/SpisokOT.rar', 'Скачать всё') !!}</li>
                    </ul>
                </div>


                <a>&nbsp;&nbsp;&nbsp;</a>

                <div class="btn-group">
                    <button type="button" class="btn ink-reaction btn-flat">
                        {!! HTML::link('library/educationalMaterials', 'Научные материалы') !!}
                    </button>
                </div>
                <a>&nbsp;&nbsp;&nbsp;</a>
                <div class="btn-group">
                    <button type="button" class="btn ink-reaction btn-flat dropdown-toggle" >
                        {!! HTML::linkRoute('library_persons', 'Персоналии') !!}
                    </button>

                </div>

                <a>&nbsp;&nbsp;&nbsp;</a>
                <div class="btn-group">
                    <button type="button" class="btn ink-reaction btn-flat dropdown-toggle" >
                        {!! HTML::linkRoute('library_extras', 'Дополнительно') !!}
                    </button>
                </div>





            </div>

        </div></center>

</div>

@if($role == 'Админ')
<div class="row" style="margin-bottom: 10px">
    <div class="col-sm-2" >
        {!! HTML::link('library/lecture/create','Добавить лекцию',array('class' => 'btn ink-reaction btn-primary','role' => 'button')) !!}
    </div>
    <div class="col-sm-10" >
    </div>

</div>
@endif

<div id="accordion">

    <div class="row">
        <div class="col-sm-3" >
            <div class="card" style="padding-left: 20px">
            <nav class="navmenu  navmenu-fixed-left">
                <a class="navmenu-brand" href="#"><h4>Лекции</h4></a>
                <ul class="nav navmenu-nav">
                    <li class="active"><a href="#1_section" id="1_section_link" data-toggle="collapse"
                                          >
                            <h4>Раздел 1: Формальные описания алгоритмов</h4></a></li>
                    <li><a href="#2_section" id="2_section_link" data-toggle="collapse">
                                <h4>Раздел 2: Числовые множества и арифметические вычисления</h4></a></li>
                    <li><a href="#3_section" id="3_section_link" data-toggle="collapse" ><h4>Раздел 3: Рекурсивные функции</h4></a></li>
                    <li><a href="#4_section" id="4_section_link" data-toggle="collapse"
                           ><h4>Раздел 4: Сложность вычислений</h4></a></li>
                </ul>
            </nav>
            </div>
        </div>
        <div class="col-sm-9">
            <div class="card" style="padding-left: 50px">
                <div class="card-body">
                    <div class="collapse in" id="1_section" >
                    <table class="table table-striped table-dark">
                        <tbody>
                        @foreach ($lectures as $lecture)
                            @if($lecture->id_section == 1)
                        <tr>
                            <th scope="row"><h4>
                                    @if($lecture->lecture_text == null)
                                       Лекция {{$lecture->lecture_number.': '.$lecture->lecture_name}}
                                        @endif
                                        @if($lecture->lecture_text != null)
                                            {!! HTML::linkRoute('lecture', 'Лекция '.$lecture->lecture_number.': '.$lecture->lecture_name, array('index' => $lecture->lecture_number)) !!}
                                        @endif
                                </h4></th>
                            <td>
                                @if ($lecture->ppt_path == null)
                                {!! HTML::link("library/persons/".$lecture->id_lecture."/downloadPpt", 'скачать ppt', array('class' => 'btn btn-warning', 'disabled')) !!}
                                @else
                                {!! HTML::link("library/persons/".$lecture->id_lecture."/downloadPpt", 'скачать ppt', array('class' => 'btn btn-warning')) !!}
                                @endif
                            </td>
                            <td>
                                @if ($lecture->doc_path == null)
                                    {!! HTML::link("library/persons/".$lecture->id_lecture."/downloadDoc", 'скачать doc', array('class' => 'btn btn-info', 'disabled')) !!}
                                @else
                                    {!! HTML::link("library/persons/".$lecture->id_lecture."/downloadDoc", 'скачать doc', array('class' => 'btn btn-info')) !!}
                                @endif

                            </td>
                            @if ($role == 'Админ')
                            <td>

                                <a type="button" class="btn btn-default btn-lg" href="library/lecture/{{$lecture->id_lecture."/edit"}}">
                                    <span class="glyphicon glyphicon-pencil" style="color:orange;"></span>
                                </a></td>
                            <td>
                                <button type="submit" class="btn btn-default btn-lg deleteLecture" id="{{ $lecture->id_lecture }}" name="delete{{ $lecture->id_lecture }}" value="{{ csrf_token() }}" >
                                    <span class="glyphicon glyphicon-remove" style="color:red;"></span>
                                </button>
                                </td>
                            @endif
                        </tr>
                            @endif
                        @endforeach
                    </table>
                    </div>


                    <div class="collapse" id="2_section" >
                        <table class="table table-striped table-dark">
                            <tbody>
                            @foreach ($lectures as $lecture)
                                @if($lecture->id_section == 2)
                                    <tr>
                                        <th scope="row"><h4>
                                                @if($lecture->lecture_text == null)
                                                    Лекция {{$lecture->lecture_number.': '.$lecture->lecture_name}}
                                                @endif
                                                @if($lecture->lecture_text != null)
                                                        {!! HTML::linkRoute('lecture', 'Лекция '.$lecture->lecture_number.': '.$lecture->lecture_name, array('index' => $lecture->lecture_number)) !!}
                                                @endif
                                            </h4></th>
                                        <td>
                                            @if ($lecture->ppt_path == null)
                                                {!! HTML::link("library/persons/".$lecture->id_lecture."/downloadPpt", 'скачать ppt', array('class' => 'btn btn-warning', 'disabled')) !!}
                                            @else
                                                {!! HTML::link("library/persons/".$lecture->id_lecture."/downloadPpt", 'скачать ppt', array('class' => 'btn btn-warning')) !!}
                                            @endif
                                        </td>
                                        <td>
                                            @if ($lecture->doc_path == null)
                                                {!! HTML::link("library/persons/".$lecture->id_lecture."/downloadDoc", 'скачать doc', array('class' => 'btn btn-info', 'disabled')) !!}
                                            @else
                                                {!! HTML::link("library/persons/".$lecture->id_lecture."/downloadDoc", 'скачать doc', array('class' => 'btn btn-info')) !!}
                                            @endif
                                        </td>

                                        @if ($role == 'Админ')
                                            <td>
                                                <a type="button" class="btn btn-default btn-lg" href="library/lecture/{{$lecture->id_lecture."/edit"}}">
                                                    <span class="glyphicon glyphicon-pencil" style="color:orange;"></span>
                                                </a></td>
                                            <td>
                                                <button type="submit" class="btn btn-default btn-lg deleteLecture" id="{{ $lecture->id_lecture }}" name="delete{{ $lecture->id_lecture }}" value="{{ csrf_token() }}" >
                                                    <span class="glyphicon glyphicon-remove" style="color:red;"></span>
                                                </button>
                                            </td>
                                        @endif
                                    </tr>
                            @endif
                            @endforeach
                        </table>
                    </div>

                    <div class="collapse" id="3_section" >
                        <table class="table table-striped table-dark">
                            <tbody>
                            @foreach ($lectures as $lecture)
                                @if($lecture->id_section == 3)
                                    <tr>
                                        <th scope="row"><h4>
                                                @if($lecture->lecture_text == null)
                                                    Лекция {{$lecture->lecture_number.': '.$lecture->lecture_name}}
                                                @endif
                                                @if($lecture->lecture_text != null)
                                                        {!! HTML::linkRoute('lecture', 'Лекция '.$lecture->lecture_number.': '.$lecture->lecture_name, array('index' => $lecture->lecture_number)) !!}
                                                @endif
                                            </h4></th>
                                        <td>
                                            @if ($lecture->ppt_path == null)
                                                {!! HTML::link("library/persons/".$lecture->id_lecture."/downloadPpt", 'скачать ppt', array('class' => 'btn btn-warning', 'disabled')) !!}
                                            @else
                                                {!! HTML::link("library/persons/".$lecture->id_lecture."/downloadPpt", 'скачать ppt', array('class' => 'btn btn-warning')) !!}
                                            @endif
                                        </td>
                                        <td>
                                            @if ($lecture->doc_path == null)
                                                {!! HTML::link("library/persons/".$lecture->id_lecture."/downloadDoc", 'скачать doc', array('class' => 'btn btn-info', 'disabled')) !!}
                                            @else
                                                {!! HTML::link("library/persons/".$lecture->id_lecture."/downloadDoc", 'скачать doc', array('class' => 'btn btn-info')) !!}
                                            @endif
                                        </td>
                                        @if ($role == 'Админ')
                                            <td>
                                                <a type="button" class="btn btn-default btn-lg" href="library/lecture/{{$lecture->id_lecture."/edit"}}">
                                                    <span class="glyphicon glyphicon-pencil" style="color:orange;"></span>
                                                </a></td>
                                            <td>
                                                <button type="submit" class="btn btn-default btn-lg deleteLecture" id="{{ $lecture->id_lecture }}" name="delete{{ $lecture->id_lecture }}" value="{{ csrf_token() }}" >
                                                    <span class="glyphicon glyphicon-remove" style="color:red;"></span>
                                                </button>
                                            </td>
                                        @endif
                                    </tr>
                            @endif
                            @endforeach
                        </table>
                    </div>

                    <div class="collapse" id="4_section" >
                        <table class="table table-striped table-dark">
                            <tbody>
                            @foreach ($lectures as $lecture)
                                @if($lecture->id_section == 4)
                                    <tr>
                                        <th scope="row"><h4>
                                                @if($lecture->lecture_text == null)
                                                    Лекция {{$lecture->lecture_number.': '.$lecture->lecture_name}}
                                                @endif
                                                @if($lecture->lecture_text != null)
                                                        {!! HTML::linkRoute('lecture', 'Лекция '.$lecture->lecture_number.': '.$lecture->lecture_name, array('index' => $lecture->lecture_number)) !!}
                                                @endif
                                            </h4></th>
                                        <td>
                                            @if ($lecture->ppt_path == null)
                                                {!! HTML::link("library/persons/".$lecture->id_lecture."/downloadPpt", 'скачать ppt', array('class' => 'btn btn-warning', 'disabled')) !!}
                                            @else
                                                {!! HTML::link("library/persons/".$lecture->id_lecture."/downloadPpt", 'скачать ppt', array('class' => 'btn btn-warning')) !!}
                                            @endif
                                        </td>
                                        <td>
                                            @if ($lecture->doc_path == null)
                                                {!! HTML::link("library/persons/".$lecture->id_lecture."/downloadDoc", 'скачать doc', array('class' => 'btn btn-info', 'disabled')) !!}
                                            @else
                                                {!! HTML::link("library/persons/".$lecture->id_lecture."/downloadDoc", 'скачать doc', array('class' => 'btn btn-info')) !!}
                                            @endif
                                        </td>
                                        @if ($role == 'Админ')
                                            <td>
                                                <a type="button" class="btn btn-default btn-lg" href="library/lecture/{{$lecture->id_lecture."/edit"}}">
                                                    <span class="glyphicon glyphicon-pencil" style="color:orange;"></span>
                                                </a></td>
                                            <td>
                                                <button type="submit" class="btn btn-default btn-lg deleteLecture" id="{{ $lecture->id_lecture }}" name="delete{{ $lecture->id_lecture }}" value="{{ csrf_token() }}" >
                                                    <span class="glyphicon glyphicon-remove" style="color:red;"></span>
                                                </button>
                                            </td>
                                        @endif
                                    </tr>
                            @endif
                            @endforeach
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div><!--end .row -->

</div>

@stop

@section('js-down')
    {!! HTML::script('js/library/lectureIndex.js') !!}

    {!! HTML::script('js/core/source/App.js') !!}
    {!! HTML::script('js/core/source/AppNavigation.js') !!}
    {!! HTML::script('js/core/source/AppOffcanvas.js') !!}
    {!! HTML::script('js/core/source/AppCard.js') !!}
    {!! HTML::script('js/core/source/AppForm.js') !!}
    {!! HTML::script('js/core/source/AppNavSearch.js') !!}
    {!! HTML::script('js/core/source/AppVendor.js') !!}
    {!! HTML::script('js/core/demo/Demo.js') !!}
@stop
