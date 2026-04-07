<?php namespace Pensoft\KnowledgeLibrary\Components;

use Carbon\Carbon;
use Cms\Classes\ComponentBase;
use Pensoft\Knowledgelibrary\Models\Data;

/**
 * RecordsList Component
 */
class RecordsList extends ComponentBase
{
    public function componentDetails(): array
    {
        return [
            'name' => 'RecordsList Component',
            'description' => 'No description provided yet...'
        ];
    }

    public function defineProperties(): array
    {
        return [];
    }

    public function onSearchRecords(): array
    {
        $searchTerms = post('searchTerms');
        $sortFormat = post('sortFormat');
        $sortProject = post('sortProject');
        $dateFrom = post('dateFrom');
        $dateTo = post('dateTo');
        $this->page['records'] = $this->searchRecords($searchTerms, $sortFormat, $sortProject, $dateFrom, $dateTo);
        return ['#recordsContainer' => $this->renderPartial('library_records')];
    }

    protected function searchRecords(
        $searchTerms = '',
        $sortFormat = 0,
        $sortProject = 0,
        $dateFrom = '',
        $dateTo = ''
    ) {
        $searchTerms = is_string($searchTerms) ? json_decode($searchTerms, true) : (array)$searchTerms;
        $result = Data::searchTerms($searchTerms);
        if($sortFormat){
            $result->where('format_id', "{$sortFormat}");
        }
        if($sortProject){
            $result->where('project_id', "{$sortProject}");
        }
        if($dateFrom){
            $result->where('date', '>=', Carbon::parse($dateFrom));
        }
        if($dateTo){
            $result->where('date', '<=', Carbon::parse($dateTo));
        }

        $result->orderBy('date', 'desc')->orderBy('title', 'asc');

        return $result->get();
    }
}