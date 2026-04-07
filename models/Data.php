<?php namespace Pensoft\Knowledgelibrary\Models;

use Model;

/**
 * Model
 */
class Data extends Model
{
    use \October\Rain\Database\Traits\Validation;

    use \October\Rain\Database\Traits\SoftDelete;

    protected $casts = [
        'deleted_at' => 'datetime',
    ];


    /**
     * @var string The database table used by the model.
     */
    public $table = 'pensoft_knowledgelibrary_data';

    /**
     * @var array Validation rules
     */
    public $rules = [
    ];

    public $attachOne = [
        'cover' => \System\Models\File::class,
        'file' => \System\Models\File::class,
    ];

    public $attachMany = [
        'file_langs' => \System\Models\File::class,
    ];

    public $belongsTo = [
        'format' => \Pensoft\Knowledgelibrary\Models\Format::class,
        'project' => \Pensoft\Knowledgelibrary\Models\Project::class,
    ];

    public function scopeSearchTerms($query, $searchTerms)
    {
        if (!empty($searchTerms) && is_array($searchTerms)) {
            foreach ($searchTerms as $term) {
                $query->orWhere('title', 'ILIKE', "%{$term}%");
                $query->orWhere('authors', 'ILIKE', "%{$term}%");
                $query->orWhere('volume', 'ILIKE', "%{$term}%");
                $query->orWhere('journal', 'ILIKE', "%{$term}%");
                $query->orWhere('doi', 'ILIKE', "%{$term}%");
                $query->orWhere('status', 'ILIKE', "%{$term}%");
                $query->orWhere('place', 'ILIKE', "%{$term}%");
                $query->orWhere('source', 'ILIKE', "%{$term}%");
                $query->orWhere('web_page', 'ILIKE', "%{$term}%");
            }
        }
        return $query;
    }

    public function getPrettyAuthorsAttribute()
    {

        $pMaxCount = 3;
        if($this->authors != ''){
            $this->authors = str_replace(',', ', ', $this->authors);
            $lData = explode(', ', $this->authors, $pMaxCount);
            $lAllData = explode(', ', $this->authors);
            if($lAllData > $pMaxCount){
                $lDiff = (int)count($lAllData) - (int)count($lData);
                $lDataStr = '';
                foreach ($lData as $k => $lStr){
                    if($k < ($pMaxCount - 1) ){
                        $lDataStr .= $lStr.", ";
                    }
                }
                $lMore = '';
                if($lDiff > 0){
                    $lMore = '<span class="view_more hide-' . $this->id . '"> +' .($lDiff + 1 ). ' more</span> <span class="toogle-' . $this->id . '" style="display: none">' . $lData[$pMaxCount - 1] . '</span> <a href="javascript: void(0);" class="view_more_authors" onclick="expand(this, \'' . $this->id . '\');">View all</a>';
                }

                return $lDataStr . $lMore .' <br>';
            }else{
                return $this->authors;
            }

        }
    }
}