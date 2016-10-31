<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AlterContents extends Migration {

    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up() {
        //
        Schema::table('contents', function (Blueprint $table) {
            $table->string('thumbnail')->nullable()->after('content_title');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down() {
        //
        Schema::table('contents', function ($table) {
            $table->dropColumn('thumbnail');
        });
    }

}
