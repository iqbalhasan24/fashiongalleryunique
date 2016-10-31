<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateSnippetsTable extends Migration {

    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up() {
        Schema::dropIfExists('snippets');
        Schema::create('snippets', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('tag_id')->unsigned();
            $table->string('campaign_id');
            $table->enum('verticles', ['health_system', 'health_plan', 'employer'])->default('health_system');
            $table->string('thumbnail')->nullable();
            $table->longText('description');
            $table->timestamps();

            // foreign keys
            $table->foreign('tag_id')
                    ->references('id')->on('tags')
                    ->onUpdate('cascade')
                    ->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down() {
        Schema::dropIfExists('snippets');
    }

}
