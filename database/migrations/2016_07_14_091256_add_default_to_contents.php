<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddDefaultToContents extends Migration {

    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up() {
        Schema::table('contents', function (Blueprint $table) {
            $table->enum('default', [1, 0])->default(0)->after('downloadable_content');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down() {
        Schema::table('contents', function ($table) {
            $table->dropColumn('default');
        });
    }

}
