<?php namespace Pensoft\Knowledgelibrary\Updates;

use Illuminate\Database\Schema\Blueprint;
use Schema;
use October\Rain\Database\Updates\Migration;

class BuilderTableUpdatePensoftKnowledgelibraryFormats extends Migration
{
    public function up(): void
    {
        Schema::table('pensoft_knowledgelibrary_formats', function(Blueprint $table)
        {
            $table->integer('sort_order');
        });
    }

    public function down(): void
    {
        Schema::table('pensoft_knowledgelibrary_formats', function(Blueprint $table)
        {
            $table->dropColumn('sort_order');
        });
    }
}