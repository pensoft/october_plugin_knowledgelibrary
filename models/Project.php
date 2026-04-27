<?php namespace Pensoft\Knowledgelibrary\Models;

use Model;

/**
 * Model
 */
class Project extends Model
{
    use \October\Rain\Database\Traits\Validation;

    use \October\Rain\Database\Traits\SoftDelete;

    use \October\Rain\Database\Traits\Sortable;

    protected $casts = [
        'deleted_at' => 'datetime',
    ];


    /**
     * @var string The database table used by the model.
     */
    public $table = 'pensoft_knowledgelibrary_projects';

    /**
     * @var array Validation rules
     */
    public $rules = [
    ];
}