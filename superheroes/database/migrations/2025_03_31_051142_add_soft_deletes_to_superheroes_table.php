<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up()
    {
        Schema::table('superheroes', function (Blueprint $table) {
            $table->softDeletes(); // Añade columna deleted_at
        });
    }

    public function down()
    {
        Schema::table('superheroes', function (Blueprint $table) {
            $table->dropSoftDeletes();
        });
    }
};
