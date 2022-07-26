<?php


use App\Models\MenuItem;
use App\Models\Offer;
use App\Models\Order;
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
        Schema::create('menu_item_order', function (Blueprint $table) {
            $table->id();
            $table->foreignIdFor(User::class)->constrained();
            $table->foreignIdFor(MenuItem::class)->constrained();
            $table->foreignIdFor(Order::class)->constrained()->nullable();

            $table->enum('status', ['pending', 'ordered', 'accepted', 'rejected', 'delivered'])->default('pending');
            $table->integer('quantity');
            $table->integer('before_discount');
            $table->integer('after_discount');
            $table->integer('total_price');
            $table->integer('discount');
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
        Schema::dropIfExists('menu_item_order');
    }
};
