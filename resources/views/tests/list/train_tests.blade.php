@extends('templates.base')
@section('head')
<title>Список тестов</title>
{!! HTML::style('css/tests_list.css') !!}
{!! HTML::style('css/student_account.css') !!}}
@stop
@section('background')
full-tests
@stop

@section('content')
    <div class="section-body">
        <div class="col-md-12 col-sm-12 card style-gray text-center">
            <h2 class="text-default-bright">Тренировочные тесты</h2>
        </div>
            <div class="col-lg-offset-1 col-md-10 col-sm-10">
                <div class="card style-default-light">
                    <div class="card-body test-list">
                        @if (count($tr_tests) == 0)
                            <h3 class="none-tests">На данный момент не доступен ни один тренировочный тест</h3>
                        @else
                        @foreach ($tr_tests as $test)
                            <a href="{{ route('question_showtest', $test['id_test']) }}">
                                <div class="col-md-12 col-sm-12 card test-list text-lg dropdown" style="background-color: #d4fad6;">
                                    <button class="dropbtn">{{$test['test_name']}}</button>
                                    <div class="dropdown-content" >
                                        Перейти к прохождению
                                        <a>Максимально возможный балл: {{ $test['max_points'] }} из {{ $test['total'] }}</a>
                                        <a>Количество вопросов: {{ $test['amount'] }}</a>
                                        <a>Время на прохождение: {{ $test['test_time'] }} минут </a>
                                        <a>Попыток сделано: {{ $test['attempts'] }}  </a>
                                    </div>
                                </div>
                            </a>
                        @endforeach
                        @endif
                    </div>
                </div>
            </div>
        </div>

    <div class="col-lg-offset-1 col-md-10 col-sm-10">
        <br><br><br><br><br><br><br><br><br><br><br>
    </div>
@stop
