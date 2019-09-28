<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateMailsDocuments extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('mails_documents', function (Blueprint $table) {
            $table->unsignedInteger('id')
                ->autoIncrement();
            $table->string('name');
            $table->unsignedInteger('mail_id'); //foreign key
            $table->foreign('mail_id')
                ->references('id')
                ->on('mails')
                ->onUpdate('cascade')
                ->onDelete('cascade');
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
        Schema::dropIfExists('mails_documents');
    }
}
