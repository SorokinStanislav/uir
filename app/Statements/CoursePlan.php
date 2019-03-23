<?php
/**
 * Created by PhpStorm.
 * User: ishun
 * Date: 13.03.2019
 * Time: 17:46
 */

namespace App\Statements;
use Illuminate\Database\Eloquent\Model as Eloquent;

class CoursePlan extends Eloquent
{
    protected $table = 'course_plans';
    public $timestamps = false;
    protected $primaryKey = 'id_course_plan';
    protected $appends = ['section_plans'];

    /** в новое поле section_plans вставляется массив объектов SectionPlane */
    public function getSectionPlansAttribute(){
        $course_plans = SectionPlan::where('id_course_plan', $this->attributes['id_course_plan'])->get();
        foreach ($course_plans as $course_plan) {
            $course_plan->getLecturePlansAttribute();
            $course_plan->getSeminarPlansAttribute();
            $course_plan->getControlWorkPlansAttribute();
        }
        return $course_plans->sortBy('section_num');
    }
}