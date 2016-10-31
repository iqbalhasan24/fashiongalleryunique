<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AlterContentImages extends Migration {

    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up() {
        //
        Schema::table('content_images', function (Blueprint $table) {
            $table->integer('media_category_id')->default(0)->unsigned()->after('user_id');
            // foreign keys
            $table->foreign('media_category_id')
                    ->references('id')->on('media_categories')
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
        //
        Schema::table('content_images', function ($table) {
            $table->dropColumn('media_category_id');
        });
    }

}
