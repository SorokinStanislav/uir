<?php
/**
 * Created by PhpStorm.
 * User: ishun
 * Date: 13.03.2019
 * Time: 20:09
 */

namespace App\Statements\Plans;
use Illuminate\Database\Eloquent\Model as Eloquent;

class SectionPlan extends Eloquent {
    protected $table = 'section_plans';
    public $timestamps = false;
    protected $primaryKey = 'id_section_plan';
    protected $appends = ['lecture_plans', 'seminar_plans', 'control_work_plans', 'max_points'];

    /** в новое поле lecture_plans вставляется массив объектов LecturePlan */
    public function getLecturePlansAttribute(){

       return LecturePlan::where('id_section_plan', $this->attributes['id_section_plan'])->get()->sortBy('lecture_plan_num');
    }

    /** в новое поле seminar_plans вставляется массив объектов LecturePlan */
    public function getSeminarPlansAttribute(){

        return SeminarPlan::where('id_section_plan', $this->attributes['id_section_plan'])->get()->sortBy('seminar_plan_num');
    }

    /** в новое поле seminar_plans вставляется массив объектов LecturePlan */
    public function getControlWorkPlansAttribute(){

        return ControlWorkPlan::where('id_section_plan', $this->attributes['id_section_plan'])->get();
    }

    /** в новое поле max_points вставляется сумма всех max_points у контр мероприятий данного раздела */
    public function getMaxPointsAttribute(){
        return ControlWorkPlan::where('id_section_plan', $this->attributes['id_section_plan'])
            ->get()
            ->sum(function ($item) {
                return $item->max_points;
            });
    }
}

