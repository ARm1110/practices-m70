<?php

use App\Models\Category;
use App\Models\MenuItem;
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
use Prophecy\Call\Call;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('in_offer', function (Blueprint $table) {
            $table->increments('id');
            $table->foreignIdFor(MenuItem::class)->constrained();
            $table->foreignIdFor(Category::class)->constrained();
            // $table->foreign('menu_id')->references('id')->on('menu_items');
            // $table->foreign('category_id')->references('id')->on('ategories');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('in_offer', function (Blueprint $table) {
            Schema::dropIfExists('in_offer');
        });
    }
};
