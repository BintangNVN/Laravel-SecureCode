<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateXssLabCommentsTable extends Migration
{
    public function up()
    {
        Schema::create('xss_lab_comments', function (Blueprint $table) {
            $table->id();
            $table->string('author_name');
            $table->text('content');
            $table->foreignId('ticket_id')->nullable()->constrained('tickets')->cascadeOnDelete();
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('xss_lab_comments');
    }
}