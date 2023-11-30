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
        Schema::create('orders_pengambil', function (Blueprint $table) {
            $table->id(); // This will automatically create an auto-incrementing primary key 'id'
            $table->decimal('kg_sampah', 8, 2);
            $table->string('jam');
            $table->string('status');
            $table->string('jns_smph');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('order_pengambil');
    }
};
