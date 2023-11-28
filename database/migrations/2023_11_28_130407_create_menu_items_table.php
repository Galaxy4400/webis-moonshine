<?php

use App\Models\Menu;
use App\Models\MenuItem;
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
		Schema::create('menu_items', function (Blueprint $table) {
			$table->id();
			$table->foreignIdFor(Menu::class)->nullable()->constrained()->nullOnDelete()->cascadeOnUpdate();
			$table->foreignIdFor(MenuItem::class, 'parent_id')->nullable()->constrained('menu_items')->nullOnDelete()->cascadeOnUpdate();
			$table->string('title');
			$table->string('link')->nullable();
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
		Schema::dropIfExists('menu_items');
	}
};
