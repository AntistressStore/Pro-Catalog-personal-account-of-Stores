<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('price_lists', function (Blueprint $table) {
            $table->id();
            $table->foreignId('online_shop_id')->nullable()->constrained('online_shops', 'id');
            $table->string('name')->nullable();
            $table->string('description')->nullable();
            $table->string('url');
            $table->string('login')->nullable();
            $table->string('password')->nullable();
            $table->string('img')->nullable();
            $table->string('classservice')->nullable();
            $table->integer('active')->nullable();
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
        Schema::dropIfExists('price_lists');
    }
};
