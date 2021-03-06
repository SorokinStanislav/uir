﻿<!DOCTYPE html>
<html lang="en">
<head>
    <title>Лекция 4</title>

    <!-- BEGIN META -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="keywords" content="your,keywords">
    <meta name="description" content="Short explanation about this website">
    <!-- END META -->

    <!-- BEGIN STYLESHEETS -->
    {!! HTML::style('css/bootstrap.css') !!}
    {!! HTML::style('css/full.css') !!}
    {!! HTML::style('css/materialadmin.css') !!}
    {!! HTML::style('css/material-design-iconic-font.min.css') !!}
    {!! HTML::style('css/materialadmin_demo.css') !!}
    {!! HTML::script('js/jquery.js') !!}


</head>
<body>
<section>

<nav class="navbar navbar-fixed-top style-primary">
    <div class="container">
        <div id="navbar" class="collapse navbar-collapse">
            <ul class="nav navbar-nav">
                <li><a href="{{URL::route('home')}}" class="btn">Главная</a></li>
                <li><a href="{{URL::route('tests')}}" class="btn">Система тестирования</a></li>
                <li><a href="{{URL::route('library_index')}}" class="btn">Библиотека</a></li>
                <li><a href="{{URL::route('in_process')}}" class="btn">Машины Тьюринга</a></li>
                <li><a href="{{URL::route('in_process')}}" class="btn">Алгоритмы маркова</a></li>
            </ul>
            <ul class="nav navbar-nav navbar-right">
                <li><a href="{{URL::route('logout')}}" class="btn">Выйти</a></li>
            </ul>
        </div>
    </div>
</nav>
<!-- BEGIN CONTENT-->
<div id="content">

<!-- BEGIN BLANK SECTION -->
<section>
    <div class="section-header">
        <ol class="breadcrumb">
            <li>{!! HTML::linkRoute('home', 'Главная') !!}</li>
            <li>{!! HTML::linkRoute('library_index', 'Библиотека') !!}</li>
            <li class="active">Лекция 4. Понятие алгоритмической разрешимости.</li>
        </ol>
    </div><!--end .section-header -->
    <div class="section-body">
    </div><!--end .section-body -->
</section>
<div class="card card-tiles style-default-light" style="margin-left:2%; margin-right:2%">
<article class="style-default-bright">
<div class="card-body">
<article style="margin-left:10%; margin-right:10%; text-align: justify">
			

<h3><span style="font-size:13px; line-height:1.2em">Алгоритмически неразрешимые задачи</span></h3>
    <a name="1.5"></a>
<p>После того, как Тьюрингом была предложена столь удобная формальная модель алгоритма, возник вопрос о границах ее применимости. Если любой алгоритм можно преобразить в машину Тьюринга, то возникает вопрос о том, для любой ли задачи, вообще говоря, существует алгоритм решения.</p>

<p>Далее будут рассмотрены примеры алгоритмически неразрешимых проблем и доказательст&shy;ва их неразрешимости. Вначале отметим, что доказательствам невозможности, приводимым в те&shy;ории алгоритмов, присуща та же математическая строгость, что и доказательствам невозможнос&shy;ти, проводимым в других областях математики.</p>

<p>Существуют два метода доказательства неразрешимости.</p>

<p>Первый, <strong><em>прямой метод</em>,</strong> состоит в том, что исходя из предположения о разрешимости дан&shy;ной проблемы, путем набора логических преобразований (переходов) мы приходим к противоре&shy;чию с доказанными ранее утверждениями либо с элементарной логикой (со здравым смыслом).</p>

<p>Второй, <strong><em>косвенный метод</em></strong> (называемый ещё <strong><em>методом сведения</em></strong>) состоит в следующем. По&shy;казывается, что разрешимость исследуемой проблемы влечёт разрешимость проблемы, о которой уже известно, что она неразрешима. Метод сведения часто бывает более удобным, чем прямой ме&shy;тод.</p>

<p>Первый метод используется вообще достаточно широко в доказательстве теорем различного типа. В общем виде он называется <a href="http://ru.wikipedia.org/w/index.php?title=Reductio_ad_absurdum&amp;redirect=no" title="Reductio ad absurdum">reductio ad absurdum</a> - <em>доказательство<strong> &laquo;от противного&raquo;</strong></em>. Это один из самых часто используемых методов <a href="http://ru.wikipedia.org/wiki/%D0%9C%D0%B0%D1%82%D0%B5%D0%BC%D0%B0%D1%82%D0%B8%D1%87%D0%B5%D1%81%D0%BA%D0%BE%D0%B5_%D0%B4%D0%BE%D0%BA%D0%B0%D0%B7%D0%B0%D1%82%D0%B5%D0%BB%D1%8C%D1%81%D1%82%D0%B2%D0%BE" title="Математическое доказательство">доказательства</a> утверждений. Доказательство утверждения <em>A</em> проводится следующим образом. Сначала принимают предположение, что утверждение <em>A</em> неверно, а затем доказывают, что при таком предположении было бы верно некоторое утверждение <em>B</em>, которое заведомо неверно. Полученное противоречие показывает, что исходное предположение было неверным, и поэтому верно утверждение &laquo;отрицание отрицания А&raquo;, которое по <em><a href="http://ru.wikipedia.org/wiki/%D0%97%D0%B0%D0%BA%D0%BE%D0%BD_%D0%B4%D0%B2%D0%BE%D0%B9%D0%BD%D0%BE%D0%B3%D0%BE_%D0%BE%D1%82%D1%80%D0%B8%D1%86%D0%B0%D0%BD%D0%B8%D1%8F" title="Закон двойного отрицания">закону двойного отрицания</a></em> равносильно утверждению A.</p>

<p><span style="line-height:1.6em">Кроме этого, во многих доказательствах применяется так называемая</span><strong style="line-height:1.6em"><em> апагогия</em></strong><span style="line-height:1.6em"> (греч. лат. deductio) - логический прием, которым доказывается несостоятельность какого-нибудь мнения таким образом, что или в нем самом, или же в необходимо из него вытекающих следствиях, мы открываем </span><em style="line-height:1.6em"><a href="http://ru.wikipedia.org/wiki/%D0%9F%D1%80%D0%BE%D1%82%D0%B8%D0%B2%D0%BE%D1%80%D0%B5%D1%87%D0%B8%D0%B5" title="Противоречие">противоречие</a></em><span style="line-height:1.6em">. Поэтому апагогическое доказательство является доказательством косвенным: здесь доказывающий обращается сперва к противоположному положению, чтобы показать его несостоятельность, и затем по </span><em style="line-height:1.6em"><a href="http://ru.wikipedia.org/wiki/%D0%97%D0%B0%D0%BA%D0%BE%D0%BD_%D0%B8%D1%81%D0%BA%D0%BB%D1%8E%D1%87%D0%B5%D0%BD%D0%B8%D1%8F_%D1%82%D1%80%D0%B5%D1%82%D1%8C%D0%B5%D0%B3%D0%BE" title="Закон исключения третьего">закону исключения третьего</a></em><span style="line-height:1.6em"> делает вывод о справедливости того, что требовалось доказать. Этот род доказательства называется также приведением к нелепости: deductio ad absurdum. Существенной его принадлежностью является довод, что третье не существует: tertium non datur, т. е., что кроме мнения, справедливость которого должно доказать, и второго, ему противоположного, которое служит исходным пунктом доказательства, никакой третий факт не допускается. Поэтому косвенное доказательство исходит из факта, противоречащего положению, справедливость которого требуется доказать.</span></p>

<p><strong style="line-height:1.6em">Задача об остановке произвольной машины Тьюринга при произвольном входном слове</strong></p>

<p><strong><u>Теорема&nbsp;</u></strong><strong style="line-height:1.6em">&nbsp;Задача об остановке произвольной машины Тьюринга на произвольном входном слове алгоритмически неразрешима.</strong></p>

<p><span style="line-height:1.6em">Иными словами, нельзя придумать универсальный алгоритм, в результате выполнения которого будет получен однозначный ответ: &nbsp;&ldquo;да&rdquo;-&nbsp; если произвольная машина </span><strong style="line-height:1.6em"><em>Т</em></strong><span style="line-height:1.6em"> остановится на ленте с произвольным входным словом&nbsp; t и&nbsp; &ldquo;нет&rdquo; &ndash; если </span><strong style="line-height:1.6em"><em>Т</em></strong><span style="line-height:1.6em"> не остановится на ленте t. &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp;&nbsp;</span></p>

<p><strong style="line-height:1.6em"><u>Доказательство</u></strong></p>

<p>Докажем теорему от противного. Предположим, что задача об остановке произвольной машины <strong><em>Т</em></strong> при обработке произвольного слова t&nbsp; алгоритмически разрешима. Это означает, что существует алгоритм решения, а значит и существует реализующая его&nbsp; машина Тьюринга &nbsp;<strong><em>Д</em></strong>.</p>

<p>&nbsp;&nbsp; Построим машину <strong><em>Д</em></strong>, на ленте которой записано кодовое описание машины <strong><em>Т</em></strong> и кодовое описание входного слова t (рис.1.7).</p>

<center>{!! HTML::image('img/library/Pic/4.1.jpg') !!}</center>

<p><center><span style="line-height:1.6em">Рис. 1.7. Начальное состояние ленты машины</span><strong style="line-height:1.6em"><em> Д</em></strong><span style="line-height:1.6em">.</span></center></p>

<p><strong><em>Д</em></strong> обрабатывает&nbsp; эти два слова и пишет &ldquo;да&rdquo;, если <strong><em>Т</em></strong> останавливается при обработке t, и &ldquo;нет&ldquo; если этого не происходит. Если этот алгоритм работает для любого случая (любого входного слова t), то должен работать и для частного случая. В качестве начального слова, в том числе, можно выбрать описание машины, т.е. возьмем&nbsp;&nbsp;&nbsp; dt = dT.</p>

<p>Построим машину <strong><em>Е</em></strong>, которая будет на своей ленте иметь описание произвольной машины <strong><em>Т</em></strong>. Работа машины <strong><em>Е</em></strong> состоит в том, что она копирует описание dT , а затем работает как <strong><em>Д</em></strong>. Если существует <strong><em>Д</em></strong>, то существует <strong><em>Е</em></strong>.</p>

<p>Построим машину&nbsp; <strong><em>F</em></strong>. <strong><em>F</em></strong> работает как&nbsp; <strong><em>E</em></strong>, но отличие состоит в том, что, если после работы на входном слове&nbsp; dT&nbsp;&nbsp; машина <strong><em>Е</em></strong> останавливается с ответом&nbsp; &ldquo;да&rdquo; (что означает что машина <strong><em>Т</em></strong> останавливается), то машина <strong><em>F</em></strong> не останавливается, а продолжает бесконечное движение вправо без изменения знаков на ленте. Если же вдруг машина <strong><em>Е </em></strong>останавливается с ответом &laquo;нет&raquo; (это означает, что машина <strong><em>Т</em></strong> не останавливается), то <strong><em>F</em></strong> просто останавливается.</p>

<p>Если данный алгоритм работает для произвольной машины <strong><em>Т</em></strong>, то и для конкретной тоже будет работать. Положим <strong><em>Т</em></strong>=<strong><em>F</em></strong>. Таким образом, на ленте машины <strong><em>F</em></strong> оказывается описание самой машины <strong><em>F</em></strong>. В результате получим, что машина <strong><em>F</em></strong> анализирует саму себя (<strong><em>F</em></strong> &ndash; самоанализирующая машина).</p>

<p>Получаем, что <strong><em>F</em></strong> не останавливается в том случае, если <strong><em>Е</em></strong> остановится с ответом &ldquo;да&rdquo;, а это означает, что машина&nbsp; <strong><em>Т</em></strong> остановится. Поскольку <strong><em>Т</em></strong>=<strong><em>F</em></strong>, имеем ситуацию: <strong><em>F</em></strong> остановится, если <strong><em>F</em></strong>&nbsp; не остановится, и <strong><em>F</em></strong> не остановится, если <strong><em>F</em></strong> остановится, что явно противоречит здравому смыслу. Такой машины существовать не может.</p>

<p>Поскольку все рассуждения были логически обоснованы, полученное противоречие означает, что ошибка в изначальном предположении о существовании машины <strong><em>Д</em></strong> (в данном доказательстве используется прямой метод). Отсюда напрямую следует, что задача об остановке произвольной машины <strong><em>Т</em></strong> на произвольном слове t алгоритмически неразрешима, <strong>Q.E.D.</strong></p>

<p><strong>Задача об остановке произвольной машины Тьюринга на пустой ленте</strong></p>

<p>Если бы имелся алгоритм (а значит и соответствующая &nbsp;машина &nbsp;Тьюринга) для решения проблемы остановки произвольной машины при обработке произвольного слова, то эта машина могла бы решить и проблему остановки на пустой ленте как частный случай. Но неразрешимость проблемы остановки при анализе произвольного слова&nbsp; непосредственно не означает неразрешимости проблемы остановки на пустой ленте, потому как последняя задача может оказаться более простой, так как ее сфера применения явно уже.</p>

<p>Однако мы можем показать, что эти задачи эквиваленты, в том случае, если для каждой пары машина-лента (<strong><em>T</em></strong>-<em>t</em>) докажем наличие соответствующей &nbsp;машины <strong><em>M<sub>T</sub></em></strong><sub><em>t</em></sub> , работающей на чистой ленте.</p>

<p><strong><u>Теорема</u></strong></p>

<p><strong>Задача об остановке произвольной машины Тьюринга на пустой ленте алгоритмически неразрешима.</strong></p>

<p style="margin-left:27.0pt"><strong><u>Доказательство</u></strong></p>

<p>Для каждой пары машина-лента (<strong><em>T</em></strong>-<em>t</em>) докажем наличие соответствующей задачи остановки на пустой ленте для некоторой другой машины, предположим <strong><em>M<sub>T</sub></em></strong><sub><em>t</em></sub>. Машина <strong><em>M<sub>Tt</sub></em></strong>&nbsp; строится непосредственно по описанию <strong><em>T</em></strong> и t, если диаграмму состояний <strong><em>Т</em></strong> дополнить последовательностью новых состояний.</p>

<p>Предположим, что для пары <strong><em>T</em></strong>, t в некоторый момент времени лента выглядит таким образом (рис.1.8):</p>

<center>{!! HTML::image('img/library/Pic/4.2.jpg') !!}</center>

<p><center><span style="line-height:1.6em">Рис 1.8. Лента машины </span><strong style="line-height:1.6em"><em>Т</em></strong><span style="line-height:1.6em"> в выбранной момент времени.</span></center></p>

<p><span style="line-height:1.6em">Новая машина M</span><sub style="line-height:1.6em">Tt</sub><span style="line-height:1.6em"> начинает работу на пустой ленте и работает по следующей программе:</span></p>

<p>S<sub>1</sub> &lambda; &rarr; r<sub>1 </sub>R S<sub>2</sub></p>

<p>S<sub>2</sub> &lambda; &rarr; r<sub>2 </sub>R S<sub>3</sub></p>

<p>&hellip;</p>

<p>S<sub>m</sub> &lambda; &rarr; r<sub>m </sub>R S<sub>m+1</sub></p>

<p>S<sub>m+1</sub> &lambda; &rarr; x R S<sub>m+2</sub></p>

<p>S<sub>m+2</sub> &lambda; &rarr; r<sub>m+2 </sub>R S<sub>m+3</sub></p>

<p><sub>&hellip;</sub></p>

<p>S<sub>n</sub> &lambda; &rarr; r<sub>n </sub>L S<sub>х</sub></p>

<p>S<sub>х</sub> r<sub>n-1</sub> &rarr; r<sub>n-1 L S</sub><sub>х</sub></p>

<p>S<sub>х</sub> r<sub>n-2</sub> &rarr; r<sub>n-2 L S</sub><sub>х</sub></p>

<p><sub>&hellip;</sub></p>

<p>S<sub>х</sub> r<sub>m+2</sub> &rarr; r<sub>m+2</sub> &nbsp;L S<sub>х</sub></p>

<p>S<sub>х</sub> х &rarr; r<sub>m+1</sub> &nbsp;L S<sub>0</sub></p>

<p style="margin-left:27.0pt">S<sub>0</sub> r<sub>m</sub> &rarr; далее работа аналогично машине <strong><em>Т</em></strong> на ленте t, &nbsp;</p>

<p>где:</p>

<p style="margin-left:27.0pt">x &ndash; некоторая буква, в других случаях не встречающаяся на входной ленте t;</p>

<p>S<sub>1, &hellip;, </sub>S<sub>n</sub>, S<sub>х</sub> &ndash; новые состояния машины <strong><em>M<sub>Tt</sub></em></strong><strong><em>,</em></strong> которых не было в машине <strong><em>Т.</em></strong></p>

<p>Т.о. машина <strong><em>M<sub>Tt</sub></em></strong> &nbsp;при запуске на пустой ленте эквивалента машине <strong><em>Т</em></strong>, работающей на ленте t, так как, по сути, машина <strong><em>M<sub>Tt</sub></em></strong> просто печатает копию ленты t на своей ленте, затем выбирает нужную позицию и после этого становится полностью идентичной машине <strong><em>Т</em></strong>. Значит &nbsp;<strong><em>M<sub>Tt</sub></em></strong> &nbsp;и <strong><em>Т</em></strong>&nbsp; - эквивалентные машины.</p>

<p>Предположим, что задача об остановке машины&nbsp; на чистой ленте алгоритмически разрешима, значит ее можно решить и применительно к машине <strong><em>M<sub>T</sub></em></strong><sub>t</sub>, начинающей работу на чистой ленте. Соответственно, такая задача решается и для машины <strong><em>Т</em></strong> на ленте t, что есть противоречие с доказанным в Теореме 1.5.(1) утверждением о том,&nbsp; что для&nbsp; произвольной машины <strong><em>Т</em></strong> задача остановки при обработке произвольного слова t алгоритмически неразрешима.&nbsp; Отсюда следует, что задача об остановке машины&nbsp; на чистой ленте алгоритмически неразрешима, <strong>Q.E.D.</strong></p>

<p><span style="line-height:1.6em">В данном доказательстве используется косвенный метод, называемый методом сведения.</span></p>

<p>Ранее была доказана неразрешимость проблемы останова для произвольных пар (<strong><em>Т</em></strong>, t). Только что показано, что каждой паре&nbsp; (<strong><em>Т</em></strong>, t) соответствует легко конструируемая машина <strong><em>M<sub>Tt</sub></em></strong>, которая останавливается на пустой ленте тогда и только тогда, когда имеет место останов пары (<strong><em>Т</em></strong>, t).</p>

<p>Способность решать частные проблемы останова (<strong><em>Т</em></strong>, пустая лента), которая включает все ситуации <strong><em>(</em></strong><strong><em>M<sub>Tt</sub></em></strong><strong><em>,</em></strong> пустая лента), предоставила бы возможность решить все проблемы останова для произвольных пар (<strong><em>Т</em></strong>, t). Можно сказать, что значительно&nbsp; более трудная проблема для пар (<strong><em>Т</em></strong>, t) <strong><em>свелась</em></strong> к значительно более простой проблеме для пар (<strong><em>Т</em></strong>, пустая лента).</p>

<p>Сводимость &ndash; достаточно тонкое и важное понятие в теории вычислимости. Оказывается, можно определить бесконечную иерархию проблем неразрешимости возрастающей сложности, ни одна из которых не сводится к предшествующей. Было даже показано, что существуют пары неразрешимых проблем, ни одна из которых не сводится к другой.</p>

<p><strong style="line-height:1.6em">Задача об остановке конкретной универсальной машины на произвольной ленте специального типа</strong></p>

<p><strong style="line-height:1.6em"><u>Теорема (без доказательства)</u></strong></p>

<p><strong>Задача об остановке конкретной универсальной машины &nbsp;на произвольной ленте специального типа алгоритмически неразрешима. </strong></p>

<p><span style="line-height:1.6em">Помещение описания машины </span><strong style="line-height:1.6em"><em>Т</em></strong><span style="line-height:1.6em">&nbsp; и ленты t на ленте универсальной машины </span><strong style="line-height:1.6em"><em>U</em></strong><span style="line-height:1.6em"> и запуск последней дает некоторое упрощение проблемы останова. В случае когда </span><strong style="line-height:1.6em"><em>Т</em></strong><span style="line-height:1.6em"> на ленте t остановится, логично утверждать что остановится и машина </span><strong style="line-height:1.6em"><em>U</em></strong><span style="line-height:1.6em">. Соответственно, если </span><strong style="line-height:1.6em"><em>Т</em></strong><span style="line-height:1.6em"> на ленте t никогда не остановится, логично утверждать что никогда не становится и машина </span><strong style="line-height:1.6em"><em>U</em></strong><span style="line-height:1.6em">. Т.о. общая проблема с произвольной машиной и произвольной лентой легко сводится к проблеме </span><em style="line-height:1.6em">конкретной</em><span style="line-height:1.6em"> универсальной машины </span><strong style="line-height:1.6em"><em>U</em></strong><span style="line-height:1.6em"> с лентой вида (рис.1.9):</span></p>

<center>{!! HTML::image('img/library/Pic/4.3.jpg') !!}</center>

<p><center>Рис. 1.9. Лента универсальной машины </span><strong style="line-height:1.6em"><em>U</em></strong><span style="line-height:1.6em">.</span></center></p>

<p>На первый взгляд утверждение кажется спорным на основе обычных познаний в комбинаторике. Если предположить, что процесс вычислений в конечном итоге завершится, то с математической точки зрения можно найти верхнюю границу времени, затраченного на вычисления. Такая граница безусловно существует, потому что машина <strong><em>Т</em></strong> имеет известное число n состояний, ее алфавит состоит из известного числа m символов, а лента t содержит известное число q непустых ячеек. Т.о. в природе существует только конечное число вычислений, связанных со значениями (n,m,q), и, следовательно, только конечное число вычислений, кончающихся остановом. Тогда f(n,m,q)&nbsp; - точная длина самого длинного процесса вычисления из этого конечного множества.</p>

<p>&nbsp;&nbsp; Осталось всего лишь заставить машину <strong><em>U</em></strong> вычислять эту верхнюю границу, т.е.&nbsp; функцию f(n,m,q), значение которой равно количеству тактов, за которые машина должна перейти к заключительному состоянию и остановиться, если ей вообще судьба когда - нибудь остановиться. При этом машина <strong><em>U</em></strong> (а точнее, ее более продвинутая модификация), может начать имитацию поведения машины <strong><em>Т</em></strong> с лентой t и вести счет числа циклов. Если вычисление не завершилось за время f(n,m,q), то <strong><em>U</em></strong> может смело останавливаться и сообщать что вычисления на машине <strong><em>Т</em></strong> никогда не закончатся.</p>

<p>При всей логичности такого хода решения проблемы оказывается, что не существует машины, которая может вычислить верхнюю границу функции f(n,m,q), при всем при том, что сама эта граница <em>существует</em>. Эту печальную ситуацию не улучшает даже тот очевидный факт, что нам вовсе не обязательно точно знать вид функции&nbsp; f(n,m,q) &ndash; достаточно использовать любую функцию с достаточно большими значениями g(n,m,q), такую, что&nbsp; g(n,m,q) &ge; f(n,m,q). Это первый звонок в направлении довольно печальной ситуации, с которой мы столкнемся позднее: оказывается, что нет <em>вычислимых</em> функций, которые могут расти столь быстро (подробнее о вычислимых функциях рассказано в Главе 2). А раз так &ndash; то нет и соответствующих машин Тьюринга.</p>

<p><strong>Задачи о печатании символов</strong></p>

<p><strong><u>Теорема. </u></strong><strong>Задача о печатании данного символа на чистой ленте точно один раз алгоритмически неразрешима.</strong></p>

<p style="margin-left:45.0pt"><strong><u>Доказательство</u></strong></p>

<p>Без ограничения общности, возьмем знак &laquo;0&raquo;. Итак, машина Тьюринга <strong><em>Т</em></strong> работает на чистой ленте. Преобразуем ее в новую машину Тьюринга <strong><em>D</em></strong>.&nbsp; Если <strong><em>Т</em></strong> не содержит в своем алфавите знака &laquo;0&raquo;, то <strong><em>D</em></strong> просто совпадает с <strong><em>T</em></strong>. Если <strong><em>T</em></strong> имеет этот знак в своем алфавите, то в алфавите машины <strong><em>D</em></strong> знак &laquo;0&raquo; будет заменен любым знаком, ранее не входящим в алфавит машины. Очевидно, что <strong><em>D</em></strong> остановится тогда, когда остановится <strong><em>Т</em></strong>.</p>

<p>Построим машину <strong><em>Е</em></strong>, которая работает как&nbsp; <strong><em>D</em></strong> вплоть до ее остановки. После этого машина <strong><em>Е</em></strong> печатает &laquo;0&raquo; и тоже останавливается.</p>

<p>Т.о. получим, что символ &laquo;0&raquo; печатается точно один раз в том случае, если произвольная машина <strong><em>Т</em></strong> останавливается на чистой ленте. Значит, задача о печатании ровно одного нуля равносильна задаче об остановке машины на чистой ленте. Поскольку задача останова алгоритмически неразрешима, то и задача о печатании символа точно один раз тоже неразрешима, <strong>Q.E.D.</strong></p>

<p><strong><u>Теорема. </u></strong><strong>Задача о печатании данного символа на чистой ленте бесконечно много&nbsp; раз алгоритмически неразрешима.</strong></p>

<p style="margin-left:45.0pt"><strong><u>Доказательство</u></strong></p>

<p>Без ограничения общности, возьмем знак &laquo;0&raquo;. Итак, машина Тьюринга <strong><em>Т</em></strong> работает на чистой ленте. Преобразуем ее в новую машину Тьюринга <strong><em>D</em></strong>.&nbsp; Если <strong><em>Т </em></strong>не содержит в своем алфавите знака &laquo;0&raquo;, то <strong><em>D</em></strong> просто совпадает с <strong><em>T</em></strong>. Если <strong><em>T</em></strong> имеет этот знак в своем алфавите, то в алфавите машины <strong><em>D</em></strong> знак &laquo;0&raquo; будет заменен любым знаком, ранее не входящим в алфавит машины. Очевидно, что <strong><em>D</em></strong> остановится тогда, когда остановится <strong><em>Т</em></strong>.</p>

<p>Построим машину <strong><em>Е</em></strong>, которая работает как&nbsp; <strong><em>D</em></strong> вплоть до ее остановки. После этого машина <strong><em>Е</em></strong> переходит в состояние А и печатает &laquo;0&raquo; бесконечно много раз (Al&nbsp; &rarr;&nbsp; 0RA).</p>

<p>Т.о. получим, что символ &laquo;0&raquo; печатается бесконечно много раз в том случае, если произвольная машина <strong><em>Т</em></strong> останавливается на чистой ленте. Значит, задача о печатании бесконечно большого числа нулей равносильна задаче об остановке машины на чистой ленте. Поскольку задача останова алгоритмически неразрешима, то и задача о печатании символа бесконечно много&nbsp; раз тоже не разрешима,<strong> Q.E.D.</strong></p>

<p><strong style="line-height:1.6em"><u>Теорема. </u></strong><strong style="line-height:1.6em">Задача о печатании данного символа на чистой ленте хотя бы один&nbsp; раз алгоритмически неразрешима.</strong></p>

<p style="margin-left:45.0pt"><strong><u>Доказательство</u></strong></p>

<p>Без ограничения общности, возьмем знак &laquo;0&raquo;. Итак, машина Тьюринга <strong><em>Т</em></strong> &nbsp;работает на чистой ленте. Построим машину <strong><em>Е</em></strong>, которая работает как&nbsp; <strong><em>Т</em></strong> вплоть до ее остановки. После чего машина<em> <strong>Е</strong></em> печатает &laquo;0&raquo; и останавливается. В итоге будет напечатан хотя бы один символ &laquo;0&raquo; (возможно и больше, если ранее&nbsp; машиной <strong><em>Т</em> </strong>такой символ уже печатался).</p>

<p>Т.о. получим, что символ &laquo;0&raquo; печатается хотя бы один раз в том случае, если произвольная машина <strong><em>Т</em></strong> останавливается на чистой ленте. Значит, эта задача&nbsp; равносильна задаче об остановке машины на чистой ленте. Поскольку эта задача согласно теореме 1.5.(2) алгоритмически неразрешима, то и задача о печатании символа хотя бы один&nbsp; раз тоже неразрешима, <strong>Q.E.D.</strong></p>

<p>&nbsp;<strong>Обобщение проблемы алгоритмической неразрешимости</strong></p>

<p>Доказанные ранее теоремы об алгоритмической неразрешимости имеют общие черты. Для обобщения введем новые определения.</p>

<p style="margin-left:36.0pt"><em>Две машины Тьюринга, имеющие один и тот же внешний алфавит, будем называть<strong><a name="4"> взаимозаменяемыми</a></strong>, если, каково бы ни было слово в их общем алфавите, не содержащее пустого символа, они либо перерабатывают его в одно и то же слово, либо обе к нему не&shy;применимы.</em></p>

<p style="margin-left:36.0pt"><em>Свойство машин Тьюринга называется <strong><a name="invariant">инвариантным</a>,</strong> если любые две взаимозаменяемые машины либо обе обладают этим свойством, либо обе не обладают.</em></p>

<p style="margin-left:36.0pt">&nbsp;<em>Свойство машин Тьюринга называется <strong><a name="netrivial">нетривиальным</a>,</strong> если существуют как ма&shy;шины, обладающие этим свойством, так и не обладающие им.</em></p>

<p><strong style="line-height:1.6em"><u>Теорема Райса (без доказательства)</u></strong></p>

<p><strong style="line-height:1.6em">Ни для какого нетривиального инвариантного свойства машин Тьюринга не существует алгоритма, позволяющего для любой машины Тьюринга узнать, обладает ли она этим свойством.</strong></p>

<p>К таким ситуациям относится и факт, доказанный в рамках предыдущей лекции. Свойство машины останавливаться инвариантное и нетривиальное, и поэтому узнать обладает ли произвольная машина этим свойством невозможно. Теорема о невозможности опознавания факта остановки произвольной машины является центральной в череде доказательств неразрешимости, поэтому для более наглядного понимания этой фундаментальной проблемы приведем пример, взятый у самого Алана Тьюринга.</p>

<p>Требуется составить программу U, которая бы по любому подаваемому ей на вход файлу X, содержащему текст программы (например, на каком-нибудь языке программирования), определяла бы, остановится ли когда-нибудь программа из файла Х в процессе своей работы, получив на вход известные данные, или &quot;зациклится&quot;. Если программа Х зациклится, то программа U должна показать на экране фотографию юноши, иначе &mdash; девушки, после чего закончить свою работу. Кстати, такого рода &quot;проверяющая на зацикливаемость&quot; программа U была бы, очевидно, довольно полезна для проверки создаваемых компьютерных программ. Оказывается, написать эту &quot;проверяющую программу&quot; U невозможно в принципе, даже если допустить, что компьютер, на котором выполняется U, имеет сколь угодно большую память и может работать неограниченно&nbsp; долгое время. Если бы такая программа U была написана, то ее можно было бы легко переделать так, чтобы вместо команды вывода изображения девушки на экран она бы зацикливалась (вставить для этого, скажем, &quot;вечный цикл&quot;). Пусть эта переделанная программа называется U2. Что будет делать программа U2, если ей на вход подать текст программы U2 (текст себя самой)? Если она зацикливается, то она должна показать фотографию юноши и остановиться, т.е. не зациклиться. Но если она не зацикливается, это значит, что она должна зациклиться (поскольку вывод девушки в программе U был заменен на &quot;вечный цикл&quot;). Тем самым программа U2 оказывается в безвыходном положении, несовместимом с допущением возможности ее существования.</p>

<p><strong style="line-height:1.6em">Задача об остановке конкретной машины на конкретной ленте</strong></p>

<p>Продолжая уменьшать неопределенность при решении проблемы останова, сформулируем проблему еще более конкретно. Является ли задача останова конкретной машины Т<sub>0</sub> при конкретном входном слове t<sub>0</sub> алгоритмически разрешимой?</p>

<p>Если дана пара (Т<sub>0</sub> t<sub>0</sub>), то может оказаться что никому и никогда не удастся выяснить, остановится ли машина Т<sub>0 </sub>на входном слове t<sub>0</sub>. Самое удивительное, что хотя может быть неизвестен способ решения этой задачи, но точно <em>исключена</em> ситуация, чтобы кому-то удалось <em>доказать</em> что не существует способа ее решения.</p>

<p><strong style="line-height:1.6em"><u>Теорема</u></strong></p>

<p><strong style="line-height:1.6em">Невозможно доказать алгоритмическую неразрешимость задачи об остановке конкретной машины Т<sub>0 </sub>на конкретном входящем слове </strong><strong style="line-height:1.6em">t</strong><strong style="line-height:1.6em"><sub>0.</sub></strong></p>

<p style="margin-left:45.0pt"><strong><u>Доказательство</u></strong></p>

<p>Предположим противное. Пусть доказано, что не существует способа определить, остановится машина Т<sub>0</sub> на ленте t<sub>0 </sub>или нет. Пусть тем или иным образом построили реальный прототип или обычный программный эмулятор данной машины. Если это прототип, то у нас есть достаточный запас ленты для медленной, но по существу, неограниченной ее подачи (например, небольшая бумажная фабрика). Тогда возможны лишь два случая: либо машина Т<sub>0</sub> остановится, либо нет. В первом случае проводимый эксперимент закончится однозначным выводом об остановке машины, что явно противоречило бы предположению о том, что доказана неразрешимость данной проблемы. Значит остается единственная возможность сохранить непротиворечивость утверждения &ndash; а именно признать, что машина Т<sub>0</sub> никогда не остановится. Т.о. доказательство того, что не существует способа определить, остановится машина Т<sub>0</sub> на ленте t<sub>0 </sub>или нет, автоматом означает доказательство того, что этой остановки никогда не произойдет. Следовательно, ответ на вопрос все-таки существует, что есть явное противоречие с принятым предположением, <strong>Q.E.D.</strong></p>

<p><span style="line-height:1.6em">Итак, появился принципиально другой тип проблемы. С одной стороны доказать неразрешимость этой проблемы нельзя, при всем при том, что дать эффективный алгоритм решения тоже не представляется невозможным.</span></p>

<p><strong style="line-height:1.6em"><em>Глоссарий учебного элемента</em></strong></p>

<ul style="list-style-type:circle">
	<li><u>Теорема </u>&nbsp;Задача об остановке произвольной машины Тьюринга на произвольном входном слове алгоритмически неразрешима.</li>
	<li><u>Теорема </u>&nbsp;Задача об остановке произвольной машины Тьюринга на пустой ленте алгоритмически неразрешима.</li>
	<li><u>Теорема (без доказательства)</u> Задача об остановке конкретной универсальной машины&nbsp; на произвольной ленте специального типа алгоритмически неразрешима.</li>
	<li><u>Теорема </u>&nbsp;Задача о печатании данного символа на чистой ленте точно один раз алгоритмически неразрешима.</li>
	<li><u>Теорема </u>&nbsp;Задача о печатании данного символа на чистой ленте бесконечно много&nbsp; раз алгоритмически неразрешима.</li>
	<li><u>Теорема </u>Задача о печатании данного символа на чистой ленте хотя бы один&nbsp; раз алгоритмически неразрешима.</li>
	<li>Две ма&shy;ши&shy;ны Тью&shy;рин&shy;га, име&shy;ющие один и тот же внешний ал&shy;фа&shy;вит, бу&shy;дем на&shy;зы&shy;вать взаимозаменяемыми, если, ка&shy;ко&shy;во бы ни бы&shy;ло сло&shy;во в их об&shy;щем ал&shy;фа&shy;ви&shy;те, не содер&shy;жа&shy;щее пус&shy;то&shy;го сим&shy;во&shy;ла, они ли&shy;бо пе&shy;ре&shy;ра&shy;ба&shy;ты&shy;ва&shy;ют его в од&shy;но и то же сло&shy;во, ли&shy;бо обе к не&shy;му не&shy;при&shy;ме&shy;ни&shy;мы.</li>
	<li>Свойст&shy;во ма&shy;шин Тью&shy;рин&shy;га на&shy;зы&shy;ва&shy;ет&shy;ся инвариантным, ес&shy;ли лю&shy;бые две взаимозаменяемые ма&shy;ши&shy;ны ли&shy;бо обе об&shy;ла&shy;да&shy;ют этим свой&shy;ст&shy;вом, ли&shy;бо обе не об&shy;ла&shy;да&shy;ют.</li>
	<li>Свой&shy;ст&shy;во ма&shy;шин Тью&shy;рин&shy;га на&shy;зы&shy;ва&shy;ет&shy;ся нетривиальным, ес&shy;ли су&shy;ще&shy;ст&shy;ву&shy;ют как ма&shy;ши&shy;ны, обладающие этим свой&shy;ст&shy;вом, так и не об&shy;ла&shy;дающие им.</li>
	<li><u>Теорема Райса (без доказательства) </u>Ни для ка&shy;ко&shy;го не&shy;три&shy;ви&shy;аль&shy;но&shy;го ин&shy;ва&shy;ри&shy;ант&shy;но&shy;го свой&shy;ст&shy;ва ма&shy;шин Тью&shy;рин&shy;га не су&shy;ще&shy;ст&shy;ву&shy;ет алгоритма, по&shy;зво&shy;ля&shy;юще&shy;го для лю&shy;бой ма&shy;ши&shy;ны Тьюрин&shy;га уз&shy;нать, об&shy;ла&shy;да&shy;ет ли она этим свой&shy;ст&shy;вом.</li>
	<li><u>Теорема</u> Невозможно доказать алгоритмическую неразрешимость задачи об остановке конкретной машины Т<sub>0 </sub>на конкретном входящем слове t<sub>0</sub>.</li>
</ul>

			</article></article>	</div></div>

<!-- BEGIN JAVASCRIPT -->
{!! HTML::script('js/libs/jquery/jquery-1.11.2.min.js') !!}
{!! HTML::script('js/libs/jquery/jquery-migrate-1.2.1.min.js') !!}
{!! HTML::script('js/libs/bootstrap/bootstrap.min.js') !!}
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
<!-- END JAVASCRIPT -->
</section>
</body>
</html>