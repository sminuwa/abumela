<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateSenders extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('senders', function (Blueprint $table) {
            $table->unsignedInteger('id')
                ->index('id')
                ->autoIncrement();
            $table->unsignedInteger('mail_id');
            $table->foreign('mail_id')
                ->references('id')
                ->on('mails')
                ->onUpdate('cascade')
                ->onDelete('cascade');
            $table->string('name');
            $table->string('department')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('mails_senders');
    }
}
