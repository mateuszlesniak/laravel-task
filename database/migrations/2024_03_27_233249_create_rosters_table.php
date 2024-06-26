<?php

use App\DutyRoster\Dtr\ActivityEnum;
use App\Models\Location;
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('rosters', function (Blueprint $table) {
            $table->id();
            $table->date('day')->nullable(false);
            $table->enum('activity_code', array_map(function (ActivityEnum $enum) {
                return $enum->value;
            }, ActivityEnum::cases()))->nullable(false);
            $table->unsignedInteger('flight_number')->nullable();
            $table->time('activity_start')->nullable();
            $table->time('activity_end')->nullable();
            $table->time('departure')->nullable(false);
            $table->time('arrival')->nullable(false);
            $table->foreignIdFor(Location::class, 'check_in_location_id')
                ->nullable(false)->constrained('locations');
            $table->foreignIdFor(Location::class, 'check_out_location_id')
                ->nullable(false)->constrained('locations');

            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('rosters');
    }
};
