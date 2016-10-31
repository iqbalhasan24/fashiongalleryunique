<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateUserUploads extends Migration {

    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up() {
        //Create user uploads Table
        Schema::create('user_uploads', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('user_id')->unsigned();
            $table->string('file_name', 50)->nullable();
            $table->integer('status')->default(0);
            $table->timestamps();
            $table->foreign('user_id')
                    ->references('id')->on('users')
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
        //For delete tables
        Schema::drop('user_uploads');
    }

}
