<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AlterTempletesTable extends Migration {

    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up() {
        //
        Schema::table('templates', function (Blueprint $table) {
            $table->enum('status', ['Approved', 'Pending'])->default('Pending')->after('template_name');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down() {
        //
        Schema::table('templates', function ($table) {
            $table->dropColumn('status');
        });
    }

}
