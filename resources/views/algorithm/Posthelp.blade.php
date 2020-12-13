<div class="offcanvas">
	<div id="offcanvas-demo-right" class="offcanvas-pane width-10" style="">
		<div class="offcanvas-head">
			<header>Что это и как с этим работать?</header>
			
		</div>
		<div class="nano has-scrollbar" style="height: 318px;">
            <div class="nano-content" tabindex="0" style="right: -17px;">
                <div class="offcanvas-body">

                <h4>Что такое машина Поста?</h4>
                    <ul class="list-divided">
                        <li>Машина Поста — это абстрактная, но очень простая вычислительная машина.</li>
                        <li>Машина Поста состоит из каретки (считывающей и записывающей головки) и ленты, разбитой на ячейки. Каждая ячейка ленты может быть либо пустой («0»), или содержать метку («1»).</li>
                        <li>Программа состоит из пронумерованных строк. В каждой строке записывается одна из следующих команд:</li>
                        <ol>1. → j – переместить каретку вправо на 1 ячейку и перейти к строке с номером j</ol>
                        <ol>2. ← j – переместить каретку влево на 1 ячейку и перейти к строке с номером j</ol>
                        <ol>3. 1 j – записать в текущую ячейку «1» (поставить метку) и перейти к строке с номером j</ol>
                        <ol>4. 0 j – записать в текущую ячейку «0» (стереть метку) и перейти к строке с номером j</ol>
                        <ol>5. ? i; j – если текущая ячейка содержит «0» (не отмечена), то перейти к строке с номером i, иначе перейти к строке j</ol>
                        <ol>6. ! – конец программы (стоп). В команде «стоп» переход на следующую строку не указывается</ol>
                    </ul>
                <h4>Как этим пользоваться?</h4>
                    <ul class="list-divided">
                        <li>В правой части находится поле редактора, в которое можно ввести условие задачи в свободной форме.</li>
                        <li>Ниже расположено поле для ввода входного слова, которое должна обработать программа. Тут введите последовательность из нулей и единиц. Таким образом будет задана лента. </li>
                        <li>В таблице справа набирается программа. Каждая строка программы нумеруется автоматически.</li>
                        <ol>1. В каждой строке в первом поле из списка выбирается нужная команда.</ol>
                        <ol>2. Во втором вводится номер строки для перехода (если это необходимо). </ol>
                        <ol>3. В третье поле также можно ввести номер строки перехода, это требуется в случае выбора в строке команды «?».</ol>
                        <ol>4. Четвертое может содержать комментарий к каждой строчке программы. </ol>
                        <li>Добавить строки таблицы или очистить их можно с помощью кнопок, расположенных снизу от таблицы. </li>
                        <li>Программа может выполняться сразу до конца(кнопка Запуск) или по шагам (Шаг).</li>
                        <li>Задачи для машины Поста можно сохранять в файлах. Сохраняется условие задачи и программа. Для этого нажмите «Стрелку вниз».</li>
                        <li>Для загрузки сохраненного алгоритма выберите файл и нажмите «Стрелку вверх».</li>
                    </ul>
                </div>
            </div>
            <div class="nano-pane">
                <div class="nano-slider" style="height: 199px; transform: translate(0px, 0px);">
                </div>
            </div>
        </div>
	</div>
</div>