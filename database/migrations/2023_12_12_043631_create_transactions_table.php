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
        Schema::create('transactions', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('user_id');
            $table->foreign("user_id")->references('id')->on('users');
            $table->timestamp('productions_date')->useCurrent();
            $table->float("a1_deb")->default(0);
            $table->float("a1_amount")->default(0);
            $table->float("a2_deb")->default(0);
            $table->float("a2_amount")->default(0);
            $table->float("a3_deb")->default(0);
            $table->float("a3_amount")->default(0);
            $table->float("a4_deb")->default(0);
            $table->float("a4_amount")->default(0);
            $table->float("a5_deb")->default(0);
            $table->float("a5_amount")->default(0);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('transactions');
    }
};
