<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
use Illuminate\Support\Facades\DB;

return new class extends Migration {
    public function up(): void
    {
        // SQLite no permite modificar índices con Schema directamente
        DB::statement('DROP INDEX IF EXISTS employees_identification_unique');

        DB::statement('
            CREATE UNIQUE INDEX employees_identification_deleted_at_unique
            ON employees (identification, deleted_at)
        ');
    }

    public function down(): void
    {
        DB::statement('DROP INDEX IF EXISTS employees_identification_deleted_at_unique');

        DB::statement('
            CREATE UNIQUE INDEX employees_identification_unique
            ON employees (identification)
        ');
    }
};
