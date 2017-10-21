<?php
/**
 * Created by PhpStorm.
 * User: ssorokin
 * Date: 21.10.2017
 * Time: 15:10
 */

namespace App;
use Illuminate\Database\Eloquent\Model as Eloquent;

/**
 * @method static \Illuminate\Database\Query\Builder|\App\MtForGroup whereId_mt_for_group($value)
 * @method static \Illuminate\Database\Query\Builder|\App\MtForGroup  whereId_group($value)
 * @method static \Illuminate\Database\Query\Builder|\App\MtForGroup  whereAvailability($value)
 */


class MtForGroup extends Eloquent {
    protected $table = 'mt_for_group';
    public $timestamps = false;
}