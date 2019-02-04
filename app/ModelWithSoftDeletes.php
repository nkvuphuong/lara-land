<?php
/**
 * Created by PhpStorm.
 * User: PhuongNKV
 * Date: 12/2/2018
 * Time: 5:40 PM
 */

namespace App;


use Illuminate\Database\Eloquent\SoftDeletes;

class ModelWithSoftDeletes extends Model
{
    use SoftDeletes;

    /**
     * The attributes that should be mutated to dates.
     *
     * @var array
     */
    protected $dates = ['deleted_at'];
}