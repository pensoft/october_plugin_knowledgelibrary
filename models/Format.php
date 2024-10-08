<?php namespace Pensoft\Knowledgelibrary\Models;

use Model;

/**
 * Model
 */
class Format extends Model
{
    use \October\Rain\Database\Traits\Validation;

    use \October\Rain\Database\Traits\SoftDelete;

    use \October\Rain\Database\Traits\Sortable;

    protected $dates = ['deleted_at'];


    /**
     * @var string The database table used by the model.
     */
    public $table = 'pensoft_knowledgelibrary_formats';

    /**
     * @var array Validation rules
     */
    public $rules = [
    ];
}
