<div class="card card-bordered style-info lecture" id="{{$id_new_section_item_js}}"  data-type-card="lecture">
    <form  class="form_store_sem_lec_wc">
        <div class="card-head">
            <header>

                        {!! Form::label('lecture_plan_num' , 'Номер лекции:') !!}
                        {!! Form::text('lecture_plan_num',$section_item_num,['class' => 'form-control','placeholder' => 'Номер лекции',
                    'required' => 'required', 'style' => 'background-color: white']) !!}

            </header>
            <div class="tools">
                <div class="btn-group ">
                    <a class="btn btn-icon-toggle delete_lec_sem_cw"><i class="md md-close"></i></a>
                </div>
            </div>
        </div>
        <div class="card-body style-default-bright">

            {{ csrf_field() }}
            <h5 class="card-title">{!! Form::label('lecture_plan_name' , 'Название лекции:') !!}
                {!! Form::text('lecture_plan_name',null,['class' => 'form-control','placeholder' => 'Введите название лекции',
                'required' => 'required']) !!}</h5>
            <p class="card-text">{!! Form::label('lecture_plan_desc' , 'Описание лекции:') !!}
                {!! Form::text('lecture_plan_desc',null,['class' => 'form-control','placeholder' => 'Введите описание лекции']) !!}
            </p>


            {{--Вывод ошибок валидации--}}
            <div class="alert alert-danger print-error-msg" style="display:none">
                <ul></ul>
            </div>

            <button type="button" class="ink-reaction btn btn-info store_lec_sem_cw" data-btn-type-card="lecture">Сохранить</button>

        </div>
    </form>

</div>
