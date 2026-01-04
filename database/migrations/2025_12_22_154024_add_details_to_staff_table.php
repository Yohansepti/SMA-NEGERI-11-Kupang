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
        Schema::table('staff', function (Blueprint $table) {
            if (!Schema::hasColumn('staff', 'nuptk')) {
                $table->string('nuptk')->nullable()->after('name');
            }
            if (!Schema::hasColumn('staff', 'gender')) {
                $table->char('gender', 1)->nullable()->after('name'); // defaulting nullable if order is issue, but after() helps
            }
            if (!Schema::hasColumn('staff', 'birth_place')) {
                $table->string('birth_place')->nullable()->after('gender');
            }
            if (!Schema::hasColumn('staff', 'birth_date')) {
                $table->date('birth_date')->nullable()->after('birth_place');
            }
            if (!Schema::hasColumn('staff', 'nip')) {
                $table->string('nip')->nullable()->after('birth_date');
            }
            if (!Schema::hasColumn('staff', 'ptk_type')) {
                $table->string('ptk_type')->nullable()->after('nip');
            }
            
            // Drop old role column if strictly replacing, or keep it. 
            // Given the new requirement for "Jenis PTK", I'll replace 'role' with 'ptk_type'.
             // $table->dropColumn('role'); 
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('staff', function (Blueprint $table) {
            $table->string('role')->after('name');
            $table->dropColumn(['nuptk', 'gender', 'birth_place', 'birth_date', 'nip', 'ptk_type']);
        });
    }
};
