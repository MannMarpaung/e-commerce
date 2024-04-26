<?php

use App\Models\Product;
use App\Models\Transaction;
use App\Models\User;
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('transaction_items', function (Blueprint $table) {
            $table->id();
            $table->foreignidFor(Transaction::class)->references('id')->on('transactions')->onUpdate('cascade')->onDelete('cascade');
            $table->foreignidFor(Product::class)->references('id')->on('products')->onUpdate('cascade')->onDelete('cascade');
            $table->foreignidFor(User::class)->references('id')->on('users')->onUpdate('cascade')->onDelete('cascade');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.4
     */
    public function down(): void
    {
        Schema::dropIfExists('transaction_items');
    }
};
