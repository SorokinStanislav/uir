@extends('algorithm.RAMbase')
@section('addl-info')
    <div class="col-lg-12">
        <article class="margin-bottom-xxl">
            <p class = 'lead'>
                Данный эмулятор предназначен для получения навыков написания алгоритмов, а также для проверки решения задач. Перед работой ВНИМАТЕЛЬНО ознакомьтесь со справкой (кнопка "Помощь")
            </p>
        </article>
    </div>
@stop
@section('addl-blocks')
        <div class="offcanvas">
            <div id="offcanvas-demo-right" class="offcanvas-pane width-10" style="">
            <div class="offcanvas-head">
                <header>Как работать с эмулятором</header>
                <div class="offcanvas-tools">
                    <a class="btn btn-icon-toggle btn-default-light pull-right" data-dismiss="offcanvas">
                        <i class="md md-close"></i>
                    </a>
                </div>
            </div>
            <div class="nano has-scrollbar" style="height: 318px;"><div class="nano-content" tabindex="0" style="right: -17px;"><div class="offcanvas-body">

            <p>
                Введите программный код для RAM в редактор кода, а также исходные данные во входную ленту, после чего можно запустить эмулятор, нажав кнопку "Старт". Текст программы имеет подсветку синтаксиса. Вы можете оставлять комментарии, используя символы “//”. Входная лента должна быть заполнена необходимым количеством натуральных чисел, разделенных через пробел. Также при необходимости можно задать начальные значения регистров.
            </p>
            
            <h4>Команды RAM:</h4>
                <ul class="list-divided">
                    <li>READ – читает значение с входной ленты в R0</li>
                    <li>WRITE – записывает значение из R0 на выходную ленту</li>
                    <li>LOAD i – записывает значение i в R0</li>
                    <li>LOAD [i] – записывает значение Ri в R0</li>
                    <li>LOAD [[i]] – записывает значение из регистра, на который ссылается регистр Ri, в R0</li>
                    <li>STORE [i] – записывает значение из R0 в Ri</li>
                    <li>STORE [[i]] – записывает значение из R0 в регистр, на который ссылается   i-й регистр</li>
                    <li>ADD i  – добавляет к значению в R0 значение i</li>
                    <li>ADD [i] – добавляет к значению в R0 значение из Ri</li>
                    <li>ADD [[i]] – добавляет к значению в R0 значение регистра, на который ссылается Ri</li>
                    <li>SUB i  – вычитает из значения в R0 значение i</li>
                    <li>SUB [i] – вычитает из значения в R0 значение из Ri</li>
                    <li>SUB [[i]] – вычитает из значения в R0 значение регистра, на который ссылается Ri</li>
                    <li>MULT i / [i] / [[i]] – домножает R0 по аналогии</li>
                    <li>DIV i / [i] / [[i]] – делит R0 по аналогии</li>
                    <li>JUMP b – переходим на команду с меткой b</li>
                    <li>JGTZ b – если R0 > 0, то переходим на команду с меткой b</li>
                    <li>JZERO b – если R0 = 0, то переходим на команду с меткой b</li>
                    <li>“name:” – данная команда ставит метку с названием name</li>
                    <li>HALT – завершение программы</li>
                </ul>
            <h4>Режимы эмулятора:</h4>
                <ul class="list-divided">
                    <li>Отладка - выполнение программы по строкам. Для выполнения всех операций выделенной строки нажмите кнопку «След. Операция».</li>
                    <li>Анимация - постепенное выполнение программы. Чтобы остановить исполнение нажмите кнопку «Пауза».</li>
                    <li>Исполнение - мгновенное исполнение программы.</li>
                </ul>
                После завершения исполнения программы в любом из режимов нажмите кнопку "Сброс", чтобы разблокировать текстовый редактор и обнулить значения регистров. Также вы можете сохранять и загружать программный код с помощью соответствующих кнопок.
            </div></div><div class="nano-pane"><div class="nano-slider" style="height: 199px; transform: translate(0px, 0px);"></div></div></div>
            </div>
        </div>
@stop