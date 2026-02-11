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
        Schema::create('items', function (Blueprint $table) {
            $table->id();
            $table->string('item_name');
            $table->string('slug')->unique();

            $table->foreignId('room_id')
            ->nullable()->constrained('rooms')
            ->nullOnDelete()->cascadeOnUpdate();

            $table->text('desc');
            $table->string('brand');
            $table->integer('stok');
            $table->date('date_purchase');
            $table->enum('condition', ['good', 'broke', 'maintenance'])
            ->default('good');
            $table->string('image');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('items');
    }
};
