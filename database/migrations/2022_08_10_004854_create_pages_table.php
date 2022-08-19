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
    public function up()
    {
        Schema::create('pages', function (Blueprint $table) {
            $table->id();
            $table->string('template');
            $table->string('slug');
            $table->string('title');
            $table->longText('about')->nullable();
            $table->boolean('status')->default(0);
            $table->boolean('lock_docs')->default(0);
            $table->string('cover');
            $table->string('source')->nullable();
            $table->string('document_en_url')->nullable();
            $table->string('document_es_url')->nullable();
            $table->string('alt_phone')->nullable();
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
        Schema::dropIfExists('pages');
    }
};
