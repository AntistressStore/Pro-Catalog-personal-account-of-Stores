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
        Schema::create('online_shops', function (Blueprint $table) {
            $table->id();
            $table->foreignId('user_id')->nullable()->constrained('users', 'id');
            $table->string('legal_name');
            $table->string('legal_name_indoc')->nullable();
            $table->string('legal_address');
            $table->string('postal_address')->nullable();
            $table->string('legal_type');
            $table->string('ogrn');
            $table->string('url');

            $table->string('name');
            $table->string('phone');
            $table->string('address');
            $table->string('city');
            $table->string('im_url');

            $table->boolean('is_courier_delivery')->nullable();
            $table->boolean('is_pickup')->nullable();

            $table->string('plastic_cards')->nullable();

            $table->boolean('is_cash')->nullable();
            $table->boolean('is_cashless')->nullable();
            $table->boolean('is_individuals')->nullable();
            $table->boolean('is_legal_entities')->nullable();
            $table->boolean('is_trading_floor')->nullable();
            $table->boolean('is_credit')->nullable();

            $table->string('weekdays_worktime')->nullable();
            $table->string('weekends_worktime')->nullable();
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
        Schema::dropIfExists('online_shops');
    }
};
