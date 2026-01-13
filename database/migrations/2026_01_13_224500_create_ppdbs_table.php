<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('ppdbs', function (Blueprint $col) {
            $col->id();
            $col->string('academic_year');
            $col->longText('requirements');
            $col->longText('schedule');
            $col->string('brochure');
            $col->string('guide');
            $col->boolean('is_active')->default(true);
            $col->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('ppdbs');
    }
};
