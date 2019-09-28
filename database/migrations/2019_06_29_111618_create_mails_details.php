<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateMailsDetails extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('mails_details', function (Blueprint $table) {
            $table->unsignedInteger('id')
                ->autoIncrement();
            $table->unsignedInteger('mail_id');
            $table->foreign('mail_id')
                ->references('id')
                ->on('mails') //mails tables
                ->onUpdate('cascade') //cascade on update
                ->onDelete('cascade'); //cascade on delete
            $table->string('comment');
            $table->string('receiver');
            $table->string('received_from')->nullable();
            $table->string('forwarded_to')->nullable();
            $table->unsignedInteger('sender_id');
            /*$table->foreign('sender_id')
                ->references('sender_id')
                ->on('senders') //mails tables
                ->onUpdate('cascade') //cascade on update
                ->onDelete('cascade'); *///cascade on delete*/
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
        Schema::dropIfExists('mails_details');
    }
}
