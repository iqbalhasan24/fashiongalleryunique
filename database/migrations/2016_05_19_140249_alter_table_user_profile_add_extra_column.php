<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AlterTableUserProfileAddExtraColumn extends Migration {

    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up() {
        Schema::table('user_profile', function (Blueprint $table) {
            $table->longText('company_name')->after('avatar');
            $table->longText('urls')->after('company_name');
            $table->longText('logos')->after('urls');
            $table->longText('copay_statement', '255')->after('logos');
            $table->longText('monikers')->after('copay_statement');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down() {
        Schema::table('user_profile', function ($table) {
            $table->dropColumn('company_name');
            $table->dropColumn('urls');
            $table->dropColumn('logos');
            $table->dropColumn('copay_statement');
            $table->dropColumn('monikers');
        });
    }

}
