
<?php
// database/migrations/xxxx_xx_xx_create_events_table.php
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    public function up(): void {
        Schema::create('events', function (Blueprint $table) {
            $table->id();
            $table->string('title');
            $table->text('description');
            $table->enum('event_type', ['concert','conference','sports','workshop']);
            $table->dateTime('start_date');
            $table->dateTime('end_date');
            $table->string('location');
            $table->string('headline_artist')->nullable(); // si concert
            $table->string('sport_type')->nullable();      // si sport
            $table->string('speaker')->nullable();         // si conférence
            $table->string('banner')->nullable();          // image
            $table->timestamps();
        });
    }

    public function down(): void {
        Schema::dropIfExists('events');
    }
};
