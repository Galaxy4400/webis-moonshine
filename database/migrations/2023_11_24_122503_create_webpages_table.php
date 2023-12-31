<?php

use App\Models\Webpage;
use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

return new class extends Migration
{
	/**
	 * Run the migrations.
	 */
	public function up(): void
	{
		Schema::create('webpages', function (Blueprint $table) {
			$table->id();
			$table->foreignIdFor(Webpage::class, 'parent_id')->nullable()->constrained('webpages')->nullOnDelete()->cascadeOnUpdate();
			$table->string('title');
			$table->string('slug')->unique();
			$table->text('body')->nullable();
			$table->integer('sorting')->default(0);
			$table->unsignedInteger('_lft');
			$table->unsignedInteger('_rgt');
			$table->timestamps();
		});
	}

	/**
	 * Reverse the migrations.
	 */
	public function down(): void
	{
		Schema::dropIfExists('webpages');
	}
};
