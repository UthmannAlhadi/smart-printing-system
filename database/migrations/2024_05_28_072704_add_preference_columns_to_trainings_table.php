<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::table('trainings', function (Blueprint $table) {
            $table->string('printing_color_option')->default('1'); // or default as you prefer
            $table->string('layout_option')->default('portrait');  // or default as you prefer
            $table->integer('copies')->default(1);                 // or default as you prefer
            $table->string('order_id')->nullable();
            $table->string('payment_status')->default('pending'); // Default status
            $table->decimal('total_price', 10, 2)->nullable();
            $table->timestamp('time')->nullable();
            $table->string('payment_method')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('trainings', function (Blueprint $table) {
            $table->dropColumn('printing_color_option');
            $table->dropColumn('layout_option');
            $table->dropColumn('copies');
            $table->dropColumn('order_id');
            $table->dropColumn('payment_status');
            $table->dropColumn('total_price');
            $table->dropColumn('time');
            $table->dropColumn('payment_method');
        });
    }
};
