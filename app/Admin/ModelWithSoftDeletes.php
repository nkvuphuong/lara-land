<?php
/**
 * Created by PhpStorm.
 * User: ADMIN
 * Date: 2/4/2019
 * Time: 7:58 PM
 */

namespace App\Admin;


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