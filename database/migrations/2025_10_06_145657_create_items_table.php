<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    public function up()
    {
        Schema::create('items', function (Blueprint $table) {
            $table->id();
            $table->foreignId('user_id')->constrained()->onDelete('cascade'); 
            $table->string('type'); 
            $table->string('name')->nullable();
            $table->text('description')->nullable();
            $table->date('date_reported')->nullable();
            $table->string('location')->nullable();
            $table->string('status')->default('open');
            $table->string('photo_path')->nullable();
            $table->string('reporter_name')->nullable();
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('items');
    }
};
