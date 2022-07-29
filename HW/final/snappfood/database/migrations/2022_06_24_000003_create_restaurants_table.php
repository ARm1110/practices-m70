<?php

use App\Models\Category;
use App\Models\City;
use App\Models\User;
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
        Schema::create('restaurants', function (Blueprint $table) {
            $table->id();
            $table->string('restaurant_name');
            $table->string('description')->nullable();
            $table->string('phone_number');
            $table->time('opening_hours');
            $table->time('closing_hours');
            $table->string('latitude');
            $table->string('longitude');
            $table->boolean('is_active')->default(false);
            $table->boolean('is_verified')->default(false);
            $table->foreignIdFor(City::class)->constrained();
            $table->foreignIdFor(User::class)->constrained();
            $table->foreignIdFor(Category::class)->constrained();
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
        Schema::dropIfExists('restaurants');
    }
};
