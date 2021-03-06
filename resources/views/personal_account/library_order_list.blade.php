@extends('templates.base')
@section('head')
    <title>Список заказов</title>
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
<!-- BEGIN HEADER-->


<div id="base">


          <section>
            <div class="section-header">
                <ol class="breadcrumb">
                    <li class="active">Список заказов</li>
                </ol>
            </div>
            </section>
            <div class="section-body contain-lg-12">

                <div class="row">


                    <div class="card">
                        <div class="card-body">
                            <form action="{{URL::route('order_list_delete')}}" method="POST">
                                <input type="hidden" name="_token" value="{{ csrf_token() }}" />
                                <table class="spc table no-margin table-hover" border="0" cellpadding="0" cellspacing="0">
                                    <tbody align ="center">
                                    <tr style="padding:20px; margin-top:20px">
                                        <td class="thd" onclick="sort(this)"  title="Нажмите на заголовок, чтобы отсортировать колонку">
                                            <h4>#</h4>
                                        </td>
                                        <td  class="thd" onclick="sort(this)" title="Нажмите на заголовок, чтобы отсортировать колонку">
                                            <h4>ФИО студента</h4>
                                        </td>
                                        <td class="thd" onclick="sort(this)"  title="Нажмите на заголовок, чтобы отсортировать колонку">
                                            <h4>Автор книги</h4>
                                        </td>
                                        <td class="thd" onclick="sort(this)"  title="Нажмите на заголовок, чтобы отсортировать колонку">
                                            <h4>Название книги</h4>
                                        </td>
                                        <td class="thd" onclick="sort(this)" title="Нажмите на заголовок, чтобы отсортировать колонку">
                                            <h4>ГГГГ-ММ-ДД</h4>
                                        </td>
                                        <td class="thd" onclick="sort(this)" title="Нажмите на заголовок, чтобы отсортировать колонку">
                                            <h4>Статус</h4>
                                        </td>
                                        <td>
                                            <h4>Изменить статус</h4>
                                        </td>
                                        <td >
                                            <h4>Выбрать</h4>
                                        </td>
                                    </tr>
                                    <?php $index = 0;
                                    $r_c = count($result);
                                    while($index < $r_c) {
                                    $row = $result[$index++];
                                    ?>
                                    <tr style="padding:20px; margin-top:20px">
                                        <td >
                                            <p><?php echo $index; ?></p>
                                        </td>
                                        <td >
                                            <p><?php echo $row["student_id"]; ?></p>
                                        </td>
                                        <td >
                                            <p><?php echo $row["author"]; ?></p>
                                        </td>
                                        <td >
                                            <p><?php echo $row["title"]; ?></p>
                                        </td>
                                        <td >
                                            <p><?php echo $row["date"]; ?></p>
                                        </td>
                                        <td >
                                            <p><?php
                                                if ($row["status"]==0)
                                                    echo 'В библиотеке';
                                                else echo 'На руках'; ?></p>
                                        </td>
                                        <td> <p><?php
                                               if ($row["status"]==0)
                                               echo HTML::linkRoute('edit_order_status0', '✎', array("order_id" => $row['id']));
                                               else echo HTML::linkRoute('edit_order_status1', '✎', array("order_id" => $row['id']));
                                                ?>
                                            </p>
                                        </td>
                                        <td style="width:15px">
                                            <input type="checkbox"  name="return[]" value="<?php echo $row["id"];
                                            ?>" />
                                        </td>
                                    </tr>
                                    <?php  } ?>
                                    </tbody>
                                </table>
                                <br><center>
                                <input type="submit" class="btn ink-reaction btn-primary" value="Удалить из списка">
                                    </center>
                             </form>

                        </div><!--end .card -->
                    </div><!--end .col -->

                </div><!--end .row -->
            </div><!--end .section-body -->


  <!--end #content-->


</div><!--end .offcanvas-->

</div><!--end #base-->
<!-- END BASE -->
    @stop
@section('js-down')
    {!! HTML::script('js/library/sort.js') !!}
@stop

