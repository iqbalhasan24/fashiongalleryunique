<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AlterTagsTable extends Migration {

    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up() {
        Schema::table('tags', function (Blueprint $table) {
            $table->string('thumbnail')->default('default-tag-icon.png')->nullable()->after('tag_name');
            $table->integer('orderby')->default(0)->nullable()->after('thumbnail');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down() {
        Schema::table('tags', function ($table) {
            $table->dropColumn('thumbnail');
            $table->dropColumn('orderby');
        });
    }

}
