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
        Schema::create('categories_menu_items', function (Blueprint $table) {
            $table->foreignIdFor(MenuItem::class)->constrained();
            $table->foreignIdFor(Category::class)->constrained();
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
