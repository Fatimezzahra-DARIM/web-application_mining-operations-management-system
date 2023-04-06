<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up(){
    Schema::create('tasks', function (Blueprint $table) {
            $table->id('task_id');
            $table->string('task_name');
            $table->text('task_description');
            $table->unsignedBigInteger('admin_id');
            $table->unsignedBigInteger('geologist_id');
            $table->boolean('status')->default(false);

            $table->foreign('admin_id')->references('id')->on('users')->onDelete('cascade');
            $table->foreign('geologist_id')->references('id')->on('users')->onDelete('cascade');

            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('tasks');
    }
};