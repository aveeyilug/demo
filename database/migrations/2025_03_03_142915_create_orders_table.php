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
        Schema::create('orders', function (Blueprint $table) {
            $table->id();
            $table->string('address');
            $table->string('phone');
            $table->date('date');
            $table->time('time');
            $table->enum('status', ['в работе', 'выполнено', 'отменено'])->default('в работе');
            $table->foreignId('service_id')->nullable()->constrained()->cascadeOnDelete();
            $table->text('other_service')->nullable();
            $table->enum('payment', ['cash', 'card'])->default('card');
            $table->foreignId('user_id')->constrained()->cascadeOnDelete();
            $table->string('comment')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('orders');
    }
};
