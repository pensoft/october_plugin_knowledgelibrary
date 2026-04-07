<?php namespace Pensoft\Knowledgelibrary;

use Pensoft\KnowledgeLibrary\Components\RecordsList;
use System\Classes\PluginBase;

class Plugin extends PluginBase
{
    public function registerComponents(): array
    {
        return [
            RecordsList::class => 'KnowledgeLibraryList'
        ];
    }

    public function registerSettings(): array
    {
        return [];
    }
}