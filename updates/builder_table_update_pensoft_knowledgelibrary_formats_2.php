<?php namespace Pensoft\Knowledgelibrary\Updates;

use Illuminate\Database\Schema\Blueprint;
use Schema;
use October\Rain\Database\Updates\Migration;

class BuilderTableUpdatePensoftKnowledgelibraryFormats2 extends Migration
{
    public function up(): void
    {
        Schema::table('pensoft_knowledgelibrary_formats', function(Blueprint $table)
        {
            $table->integer('sort_order')->default(1)->change();
        });
    }

    public function down(): void
    {
        Schema::table('pensoft_knowledgelibrary_formats', function(Blueprint $table)
        {
            $table->integer('sort_order')->default(null)->change();
        });
    }
}