@extends('templates.base')
@section('head')
    <title>Теоремы к экзамену</title>

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
    <div class ="row">
        <div class="col-sm-9" >
            <section>
                <div class="section-header">
                    <ol class="breadcrumb">
                        <li>{!! HTML::linkRoute('home', 'Главная') !!}</li>
                        <li>{!! HTML::linkRoute('library_index', 'Библиотека') !!}</li>
                        <li class="active">Теоремы к экзамену</li>
                    </ol>
                </div>
            </section><!--end .section-header -->
        </div>
        <div class="col-sm-3" >
            @if($role == 'Админ')
                {!! HTML::link('library/theorems/create','Добавить теорему',array('class' => 'btn ink-reaction btn-primary','role' => 'button')) !!}
            @endif
        </div>
    </div>

    <div class="card card-tiles style-default-light" style="margin-left:2%; margin-right:2%">
        <article class="style-default-bright">
            <div class="card-body">
                <article style="margin-left:5%; margin-right:5%">

                    <table class="table table-hover">
                        <thead class="thead-dark">
                        <tr>
                            <th scope="col" style="width: 150px"><h4>Название</h4></th>
                            <th scope="col"><h4>Формулировка (надо знать обязательно, кроме раздела «теоремы» может быть проверена в разделе «определения» или «угадайка»)</h4></th>
                            <th scope="col" style="width: 110px">Есть в лекциях</th>
                            <th scope="col" style="width: 110px">Будет на экзамене</th>
                            <th scope="col" style="width: 110px">Без доказательства</th>
                            <th scope="col"></th>
                            <th scope="col"></th>
                        </tr>
                        </thead>
                        <tbody>

                        @foreach ($theorems as $theorem)
                            <tr>
                                <th scope="row"><h4>
                                        @if($theorem->id_lecture == null)
                                            {{$theorem->name}}
                                        @endif
                                        @if($theorem->id_lecture != null)
                                                @if($theorem->name != null)
                                            {!! link_to_route('lecture', $theorem->name, $theorem->linkToLecture)!!}
                                                    @else
                                                    {!! link_to_route('lecture', 'Ссылка на лекцию', $theorem->linkToLecture)!!}
                                                    @endif
                                        @endif
                                    </h4></th>
                                <td>
                                {{$theorem->content}}
                                </td>
                                <td>
                                    @if($theorem->id_lecture != null)
                                        <span class="glyphicon glyphicon-ok" style="color:green;"></span>
                                    @endif
                                </td>
                                <td>
                                    @if($theorem->exam != null)
                                        <span class="glyphicon glyphicon-ok" style="color:green;"></span>
                                    @endif
                                </td>
                                <td>
                                    @if($theorem->doc != null)
                                        <span class="glyphicon glyphicon-ok" style="color:green;"></span>
                                    @endif
                                </td>
                                @if ($role == 'Админ')
                                    <td>

                                        <a type="button" class="btn btn-default btn-lg" href="theorems/{{$theorem->id."/edit"}}">
                                            <span class="glyphicon glyphicon-pencil" style="color:orange;"></span>
                                        </a></td>
                                    <td>
                                        <button type="submit" class="btn btn-default btn-lg deleteTheorem" id="{{ $theorem->id }}" name="delete{{ $theorem->id }}" value="{{ csrf_token() }}" >
                                            <span class="glyphicon glyphicon-remove" style="color:red;"></span>
                                        </button>
                                    </td>
                            </tr>
                        @endif
                        @endforeach
                    </table>



                </article>
            </div>
        </article>
    </div>

@stop

@section('js-down')
    {!! HTML::script('js/library/definition.js') !!}

    {!! HTML::script('js/core/source/App.js') !!}
    {!! HTML::script('js/core/source/AppNavigation.js') !!}
    {!! HTML::script('js/core/source/AppOffcanvas.js') !!}
    {!! HTML::script('js/core/source/AppCard.js') !!}
    {!! HTML::script('js/core/source/AppForm.js') !!}
    {!! HTML::script('js/core/source/AppNavSearch.js') !!}
    {!! HTML::script('js/core/source/AppVendor.js') !!}
    {!! HTML::script('js/core/demo/Demo.js') !!}
@stop

