<?php

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
        Schema::create('product_purchases', function (Blueprint $table) {
            $table->integer('id', true);
            $table->integer('fk_users_id')->nullable();
            $table->integer('fk_customers_id')->nullable();
            $table->string('product_name')->nullable();
            $table->integer('product_type')->nullable();
            $table->string('product_id')->nullable();
            $table->integer('price')->nullable();
            $table->string('remarks')->nullable();
            $table->timestampTz('created_at')->default(date("Y-m-d h:i:s"));
            $table->timestampTz('updated_at')->default(date("Y-m-d h:i:s"));
            $table->smallInteger('status')->default(1);
            $table->smallInteger('dels')->default(0);
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('product_purchases');
    }
};
