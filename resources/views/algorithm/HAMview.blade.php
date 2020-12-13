@extends('algorithm.HAMbase')

@section('addl-info-ham')
    <div class="col-lg-12">
        <article class="margin-bottom-xxl">
            <p class = 'lead'>
                Данный эмулятор предназначен для получения навыков написания алгоритмов,
                а также для проверки решения задач. Перед работой ВНИМАТЕЛЬНО ознакомьтесь
                со справкой (кнопка "Помощь")
            </p>
        </article>
    </div>
@stop

@section('task-ham')
    <div class="card-body">
        <div class="col-lg-12">
            <div class="form" role="form">
                <div class="form-group floating-label">
                    <textarea name="task_text" class="form-control" rows="3" placeholder="Для Вашего удобства здесь можно написать условие задачи"></textarea>
                    <label style="top:-15px">Условие задачи: </label> 
                </div>
            </div>
        </div>
    </div>
@stop

@section('help-ham')
    <a class="btn btn-raised ink-reaction btn-primary" href="#offcanvas-demo-right" data-toggle="offcanvas">
        <i class="md md-help"></i>
    </a>
@stop

@section('addl-blocks-ham')
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
			Введите в соответствующие поля входное слово, алфавит, а также сам текст программы(правую и левую части).
		</p>
		
		<h4>Инструкция:</h4>
			<ul class="list-divided">
				<li>Введите в соответствующие поля входное слово, а также сам текст программы (правую и левую части).</li>
				<!-- <li>Все введенные символы отделяйте друг от друга точками. Но симол с нижними индексами считается как один. Пример: а<sub>0</sub>.a -> a.a.a</li>
				 -->
				<li>В качестве маркеров не используйте символы "+", "*", "-", так как программа не сможет их корректно считать. Рекомендуем использовать символы из панели Спецсимволов (например, "#"), символы английского алфавита и цифры.</li>
				<li>Для того чтобы записать строку, по которой алгоритм должен стереть символы, в используйте символ "_". Например, запись "11 -> _ " будет эквивалентна "11 ->   ". Если должна быть выполнена замена, например, 11 -> 2, то символ _ не требуется. </li>
				<li>Для того чтобы записать команду с точкой останова, используйте английскую букву "H". Например, 11 -> 11H. Если необходимо записать команду со удалением маркера (например, #) и остановкой работы алгоритма, то запись команды должна быть следующая: # -> _H</li>
				<li>Для перемещения строк нужно, удерживая курсором нужный элемент списка за стрелку, перетащить его на желаемую позицию.</li>
				<li>Для добавления строки нажмите кнопку "+".</li>
				<!-- <li>Для добавления нижнего индекса нужно набрать в поле ввода конструкцию вида _{цифры}. Пример: S_{00} преобразуется в S<sub>00</sub>. </li> -->
				<li>Очитстить все строки можно с помощью соответствующей кнопки. </li>
				<li>Специальный символ можно добавить, кликнув на него, находясь на нужной позиции поля ввода. </li>

			</ul>
		</div></div><div class="nano-pane"><div class="nano-slider" style="height: 199px; transform: translate(0px, 0px);"></div></div></div>
	</div>
</div>
@stop
