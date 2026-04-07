<?php namespace Pensoft\Knowledgelibrary\Updates;

use Illuminate\Database\Schema\Blueprint;
use Schema;
use October\Rain\Database\Updates\Migration;

class BuilderTableCreatePensoftKnowledgelibraryProjects extends Migration
{
    public function up(): void
    {
        Schema::create('pensoft_knowledgelibrary_projects', function(Blueprint $table)
        {
            $table->engine = 'InnoDB';
            $table->increments('id')->unsigned();
            $table->timestamp('created_at')->nullable();
            $table->timestamp('updated_at')->nullable();
            $table->timestamp('deleted_at')->nullable();
            $table->string('title');
            $table->integer('sort_order');
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('pensoft_knowledgelibrary_projects');
    }
}