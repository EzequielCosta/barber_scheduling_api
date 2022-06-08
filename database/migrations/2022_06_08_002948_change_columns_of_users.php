<?php

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
    public function up(): void
    {
        Schema::table("users", function ( Blueprint $table){
            $table->string("customer")->nullable()->change();
            $table->string("administrator")->nullable()->change();
            $table->string("employee")->nullable()->change();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down(): void
    {
        Schema::table("users", function (Blueprint $table){
            $table->string("customer")->change();
            $table->string("administrator")->change();
            $table->string("employee")->change();
        });

    }
};
