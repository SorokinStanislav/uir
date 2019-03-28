//возвращает представление для добавление раздела
$(document).on('click', '#addSection', function () {
    var lastSectionId = $('.section').filter( ':last' ).attr('id');
    var countSections;
    if($.isEmptyObject(lastSectionId)) {
        countSections = 0;
    } else {
        countSections = parseInt(lastSectionId.match(/\d+/));
    }
    var currentCount = countSections + 1;
    var idCoursePlan = parseInt($(".course_plan").attr('id').match(/\d+/));
    $.ajax({
        cache: false,
        type: 'GET',
        url:   '/course_plan/get_add_section',
        data: { currentCount: currentCount, idCoursePlan: idCoursePlan },
        success: function(data){
            $('#sections').append(data);
        }
    });
});

//Сохранение добаленного раздела
$(document).on('submit', '#form_add_section', function (event) {
    event.preventDefault();
   // var idCoursePlan = $('.course_plan').attr('id');
    var idCoursePlan = parseInt($(".course_plan").attr('id').match(/\d+/));
    $.ajax({
        type: 'POST',
        url:   '/course_plan/'+idCoursePlan+'/section',
        data:  $(this).serialize(),
        success: function(data){
            var currentSection = $('#section'+data.section_num_for_find_js);
            if($.isEmptyObject(data.error)){
                currentSection.replaceWith(data.view);
            }else{
                //добавление в html сообщений об ошибках
                var divError = currentSection.find('.print-error-msg').filter( ':first' );
                divError.find("ul").html('');
                divError.css('display','block');
                $.each( data.error, function( key, value ) {
                    divError.find("ul").append('<li>'+value+'</li>');
                });
            }
        }
    });

});

//Изменяет view_or_update_section для редактирования раздела
$(document).on('click', '.activateEditSection', function () {
    //сркрытие иконки редактировать
    $(this).hide();
    var SectionNum = parseInt($(this).closest('.section').find('header').filter( ':first' ).html());
    var htmlInsertHeader = '<div class="row">\n' +
        '                <div class="col-lg-4 col-md-4">\n' +
        '                    <label for="section_num">Номер раздела:</label>\n' +
        '                </div>\n' +
        '                <div class="col-lg-4 col-md-4">\n' +
        '                <input type="text" name="section_num" value="'+SectionNum+'" class="form-control" ' +
        'required style="background-color: white">' +
        '                </div>\n' +
        '            </div>';
    //вставляем поле с section_num
    $(this).parent().parent().siblings("header").html(htmlInsertHeader);

    //выключение readonly для полей
    var currentSection = $(this).closest('.section');
    currentSection.find('input[name="section_plan_name"]').filter( ':first' ).removeAttr("readonly");
    currentSection.find('input[name="section_plan_desc"]').filter( ':first' ).removeAttr("readonly");
    currentSection.find('#is_exam').filter( ':first' ).prop( "disabled", false );
    //вставка кнопки "Обновить информ. о разделе"
    var htmlUpdateBatton = '<button type="submit" class="ink-reaction btn btn-success" id="updateSection">Обновить информ. о разделе</button>';
    currentSection.find('.update_button_section').filter( ':first' ).html(htmlUpdateBatton);
});

//Обновление добаленного раздела
$(document).on('submit', '#form_update_section', function (event) {
    event.preventDefault();
    $.ajax({
        type: 'PATCH',
        url:   '/course_plan/section/update',
        data:  $(this).serialize(),
        success: function(data){
            if($.isEmptyObject(data.error)){
                var htmlInsertHeader = data.real_section_num +' Раздел';
                var currentSection = $('#section'+data.section_num_for_find_js);
                //вставляем поле с section_num
                var currentHeader = $('#section'+data.section_num_for_find_js).find("header").filter( ':first' );
                currentHeader.html(htmlInsertHeader);
                //выключение readonly для полей
                currentSection.find('input[name="section_plan_name"]').filter( ':first' ).attr('readonly', true);
                currentSection.find('input[name="section_plan_desc"]').filter( ':first' ).attr('readonly', true);
                currentSection.find('#is_exam').filter( ':first' ).prop( "disabled", true);
                //удаление кнопки "Обновить доп. инфор о разделе"
                currentSection.find('.update_button_section').filter( ':first' ).empty();
                // удаление сообщений об ошибках
                var currentErrorDiv = currentSection.find('.print-error-msg').filter( ':first' );
                currentErrorDiv.find("ul").html('');
                currentErrorDiv.css('display','none');
                //отображение иконки редактировать
                currentSection.find('.activateEditSection').filter( ':first' ).show();
            }else{
                //добавление в html сообщений об ошибках
                var divError = $('#section'+data.section_num_for_find_js).find('.print-error-msg').filter( ':first' );
                divError.find("ul").html('');
                divError.css('display','block');
                $.each( data.error, function( key, value ) {
                    divError.find("ul").append('<li>'+value+'</li>');
                });
            }
        }
    });

});

//Удаление раздела
$(document).on('click', '.deleteSection', function () {
    if (confirm("Удалить данный раздел ?")) {
        var currentSection = $(this).closest('.section');
        var sectionNumForFindJs = parseInt(currentSection.attr('id').match(/\d+/));
        var idSectionPlan  = currentSection.find('input[name="id_section_plan"]').filter( ':first' ).val();
        if($.isEmptyObject(idSectionPlan)) {

            $('#section'+sectionNumForFindJs).remove();

        } else {

            var token = $('meta[name="csrf-token"]').attr('content');
            $.ajax({
                type: 'DELETE',
                url:   '/course_plan/section/delete',
                data:  { "section_num_for_find_js": sectionNumForFindJs,
                    "id_section_plan": idSectionPlan,
                    "_token": token},
                success: function(data){
                    $('#section'+data).remove();
                }
            });

        }
    }

});
