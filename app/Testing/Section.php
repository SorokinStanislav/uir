<?php
/**
 * Created by PhpStorm.
 * User: Станислав
 * Date: 28.04.16
 * Time: 17:30
 */

namespace App\Testing;
use Illuminate\Database\Eloquent\Model as Eloquent;

/**
 * @method static \Illuminate\Database\Query\Builder|\App\Testing\Section  whereSection_code($value)
 * @method static \Illuminate\Database\Query\Builder|\App\Testing\Section  whereSection_name($value)
 *
 */

class Section extends Eloquent {
    protected $table = 'sections';
    public $timestamps = false;
    protected $fillable = [];
} 